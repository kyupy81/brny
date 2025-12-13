<#
  setup-dev.ps1
  Script PowerShell pour initialiser le projet Laravel en local (Windows / Laragon)

  Ce que fait le script (en ordre) :
  - Se positionne dans le dossier du script
  - Vérifie php, composer, npm
  - Copie .env.example → .env si nécessaire et génère APP_KEY
  - Installe la dépendance Spatie (composer require)
  - Publie les assets (vendor:publish) pour Spatie (optionnel)
  - Exécute les migrations
  - Crée le lien storage (php artisan storage:link)
  - Exécute les seeders (roles + users + test data)
  - Installe les dépendances npm et compile assets (npm run dev)

  Usage: Ouvrir PowerShell en tant qu'administrateur (ou un terminal où composer/php/npm sont disponibles), puis:
    .\setup-dev.ps1

  Attention: le script exécute des commandes potentiellement destructrices en base (migrations). À utiliser en environnement de développement uniquement.
#>

Param(
    [switch]$SkipComposer,
    [switch]$SkipNpm,
    [switch]$RunFactoryData,
    [switch]$ForcePublish,
    [switch]$SkipMigrate,
    [switch]$OnlyMigrate,
    [switch]$NoSeed,
    [switch]$SkipStorageLink,
    [switch]$Verbose,
    [switch]$DryRun,
    [switch]$SummaryOnly,
    [switch]$Help,
    [switch]$FailOnPrereqs,
    [string]$LogFile = "setup-dev.log"
)

Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'
$LogFilePath = $null

function Write-Log($message) {
    try {
        $timestamp = Get-Date -Format 'yyyy-MM-dd HH:mm:ss'
        $line = "[$timestamp] $message"
        if ($null -ne $LogFilePath) {
            Add-Content -Path $LogFilePath -Value $line -ErrorAction SilentlyContinue
        } else {
            Add-Content -Path $LogFile -Value $line -ErrorAction SilentlyContinue
        }
    } catch {
        # ignore logging failures
    }
}

Write-Host "== Setup dev BRNY (Laragon) - début ==" -ForegroundColor Cyan
Write-Log "== Setup dev BRNY (Laragon) - début =="

# Fonction d'aide/usage
function Show-Usage {
    Write-Host "Usage: .\setup-dev.ps1 [options]" -ForegroundColor Cyan
    Write-Host "Options:" -ForegroundColor Cyan
    Write-Host "  -SkipComposer       : Ne pas lancer 'composer install'" -ForegroundColor Gray
    Write-Host "  -SkipNpm            : Ne pas lancer 'npm install' ni 'npm run dev'" -ForegroundColor Gray
    Write-Host "  -RunFactoryData     : Exécuter le seeder FactoryDataSeeder (bulk test data)" -ForegroundColor Gray
    Write-Host "  -ForcePublish       : Forcer le 'vendor:publish' pour Spatie" -ForegroundColor Gray
    Write-Host "  -SkipMigrate        : Ne pas exécuter les migrations" -ForegroundColor Gray
    Write-Host "  -OnlyMigrate        : Exécuter uniquement les migrations puis sortir" -ForegroundColor Gray
    Write-Host "  -NoSeed             : Ne pas exécuter les seeders (roles/users/testdata)" -ForegroundColor Gray
    Write-Host "  -SkipStorageLink     : Ne pas créer le lien 'php artisan storage:link'" -ForegroundColor Gray
    Write-Host "  -DryRun             : Afficher les commandes prévues sans les exécuter" -ForegroundColor Gray
    Write-Host "  -SummaryOnly        : Afficher le plan prévu puis quitter (utile pour CI)" -ForegroundColor Gray
    Write-Host "  -Help               : Afficher cette aide" -ForegroundColor Gray
    Write-Host "  -Verbose            : Mode verbeux" -ForegroundColor Gray
    Write-Host "Examples:" -ForegroundColor Cyan
    Write-Host "  .\setup-dev.ps1 -SummaryOnly" -ForegroundColor Green
    Write-Host "  .\setup-dev.ps1 -DryRun -Verbose" -ForegroundColor Green
}

if ($Help) { Show-Usage; Pop-Location; exit 0 }

# Positionner le script
if ($PSScriptRoot) {
    Push-Location $PSScriptRoot
} else {
    Push-Location (Split-Path -Path $MyInvocation.MyCommand.Definition -Parent)
}

$LogDir = "logs"

# Prepare log directory and file path
try {
    if (-not (Test-Path -Path $LogDir)) {
        New-Item -ItemType Directory -Path $LogDir -Force | Out-Null
    }
} catch {
    # ignore
}

# determine LogFilePath: if LogFile looks like a path with folder separator, use it; otherwise use default pattern in LogDir
if ($LogFile -and $LogFile -ne "" -and $LogFile -ne "setup-dev.log" -and $LogFile -like "*\*") {
    $LogFilePath = $LogFile
} else {
    $timestamp = Get-Date -Format "yyyyMMddHHmmss"
    $LogFilePath = Join-Path (Resolve-Path -Path $LogDir).ProviderPath ("setup-dev-$timestamp.log")
}

# Rotate logs in LogDir keeping last $LogRetention files
try {
    $files = Get-ChildItem -Path (Resolve-Path -Path $LogDir).ProviderPath -Filter '*.log' -File | Sort-Object LastWriteTime
    $removeCount = $files.Count - $LogRetention
    if ($removeCount -gt 0) {
        $toRemove = $files | Select-Object -First $removeCount
        foreach ($f in $toRemove) { Remove-Item $f.FullName -Force -ErrorAction SilentlyContinue }
    }
} catch {
    # ignore rotation errors
}

function Check-Command($cmd, $name) {
    try {
        & $cmd  -Version *> $null
        Write-Host "$name trouvé." -ForegroundColor Green
        return $true
    } catch {
        Write-Host "$name introuvable. Assurez-vous qu'il est installé et disponible dans le PATH." -ForegroundColor Yellow
        return $false
    }
}

function Log-Verbose($message) {
    if ($Verbose) { Write-Host "[VERBOSE] $message" -ForegroundColor DarkGray }
}

# Compare semantic versions (returns -1 if current<required, 0 if equal, 1 if current>required)
function Compare-SemVer([string]$current, [string]$required) {
    $curParts = ($current -split '[^0-9]+' ) | Where-Object { $_ -ne '' } | ForEach-Object { [int]$_ }
    $reqParts = ($required -split '[^0-9]+' ) | Where-Object { $_ -ne '' } | ForEach-Object { [int]$_ }
    $len = [Math]::Max($curParts.Count, $reqParts.Count)
    for ($i = 0; $i -lt $len; $i++) {
        $c = if ($i -lt $curParts.Count) { $curParts[$i] } else { 0 }
        $r = if ($i -lt $reqParts.Count) { $reqParts[$i] } else { 0 }
        if ($c -lt $r) { return -1 }
        if ($c -gt $r) { return 1 }
    }
    return 0
}

# Try to extract a semver-like version from a command output using common patterns
function Get-CommandVersion([string]$exe, [string]$cmdArgs = '--version') {
    try {
        $out = & $exe $cmdArgs 2>&1
        if ($out -is [array]) { $out = $out -join "`n" }
        if ($out -match '([0-9]+(\.[0-9]+){1,})') { return $matches[1] }
        return $null
    } catch {
        return $null
    }
}

function Check-ToolVersion([string]$exe, [string]$name, [string]$requiredVersion) {
    if (-not (Get-Command $exe -ErrorAction SilentlyContinue)) {
        Write-Host "$name introuvable." -ForegroundColor Yellow
        Write-Log "$name not found"
        return $false
    }
    $ver = Get-CommandVersion $exe '--version'
    if (-not $ver) { $ver = Get-CommandVersion $exe '-v' }
    if ($ver) {
        $cmp = Compare-SemVer $ver $requiredVersion
        if ($cmp -lt 0) {
            Write-Host "$name version $ver détectée — recommandée $requiredVersion. Pensez à mettre à jour." -ForegroundColor Yellow
            Write-Log "$name version $ver detected (recommended $requiredVersion)"
            return $false
        } else {
            Write-Host "$name version $ver OK (>= $requiredVersion)" -ForegroundColor Green
            Write-Log "$name version $ver OK"
            return $true
        }
    } else {
        Write-Host "Impossible de déterminer la version de $name." -ForegroundColor Yellow
        Write-Log "Could not determine version for $name"
        return $false
    }
}

# More complete Laragon detection
function Get-LaragonRoot {
    # Check common environment variables
    if ($env:LARAGON_ROOT -and (Test-Path $env:LARAGON_ROOT)) { return $env:LARAGON_ROOT }
    if ($env:LARAGON -and (Test-Path $env:LARAGON)) { return $env:LARAGON }

    # Common installation paths
    $candidates = @(
        'C:\laragon',
        'C:\Program Files\Laragon',
        (Join-Path $env:LOCALAPPDATA 'Programs\Laragon'),
        (Join-Path $env:ProgramFiles 'Laragon')
    )
    foreach ($p in $candidates) {
        if ($p -and (Test-Path $p)) { return $p }
    }
    return $null
}

function Get-FileProductVersion([string]$path) {
    try {
        $item = Get-Item $path -ErrorAction Stop
        if ($item -and $item.VersionInfo -and $item.VersionInfo.ProductVersion) { return $item.VersionInfo.ProductVersion }
        if ($item -and $item.VersionInfo -and $item.VersionInfo.FileVersion) { return $item.VersionInfo.FileVersion }
        return $null
    } catch { return $null }
}

function Check-Laragon {
    $root = Get-LaragonRoot
    if (-not $root) {
        Write-Host "Laragon non détecté dans les chemins communs." -ForegroundColor Gray
        Write-Log 'Laragon not detected in common paths'
        return $false
    }

    $laragonExe = Join-Path $root 'laragon.exe'
    if (-not (Test-Path $laragonExe)) {
        # sometimes the exe is under root\bin or different location - try to search for laragon.exe under root
        $found = Get-ChildItem -Path $root -Filter 'laragon.exe' -Recurse -ErrorAction SilentlyContinue | Select-Object -First 1
        if ($found) { $laragonExe = $found.FullName }
    }

    if (Test-Path $laragonExe) {
        $lv = Get-FileProductVersion $laragonExe
        if ($lv) { Write-Host "Laragon détecté: $root (version $lv)" -ForegroundColor Green; Write-Log ("Laragon detected: $root v" + $lv) } else { Write-Host "Laragon détecté: $root" -ForegroundColor Green; Write-Log ("Laragon detected: " + $root) }

        # Expose the detected Laragon root to the environment and script scope
        try {
            $env:LARAGON_ROOT = $root
            $script:LARAGON_ROOT = $root
            Write-Log ("Exported LARAGON_ROOT=" + $root)
        } catch {
            Write-Log 'Failed to export LARAGON_ROOT environment variable'
        }

        # Write the detected root to small files for reuse by other scripts
        if (-not $DryRun -and -not $SummaryOnly) {
            try {
                $txtPath = Join-Path $PSScriptRoot 'laragon-root.txt'
                Set-Content -Path $txtPath -Value $root -Force -Encoding UTF8

                $envLocalPath = Join-Path $PSScriptRoot '.env.local'
                $envLine = 'LARAGON_ROOT="' + $root + '"'
                if (Test-Path $envLocalPath) {
                    $content = Get-Content $envLocalPath -Raw
                    if ($content -match '(?m)^LARAGON_ROOT=.*$') {
                        $content = $content -replace '(?m)^LARAGON_ROOT=.*$', $envLine
                    } else {
                        if ($content -ne '') { $content = $content + "`n" + $envLine } else { $content = $envLine }
                    }
                    Set-Content -Path $envLocalPath -Value $content -Force -Encoding UTF8
                } else {
                    Set-Content -Path $envLocalPath -Value $envLine -Force -Encoding UTF8
                }
                Write-Log ("Wrote laragon-root.txt and .env.local to $PSScriptRoot")
            } catch {
                Write-Log ("Failed to write laragon root files: " + $_.Exception.Message)
            }
        } else {
            Write-Log 'DryRun/SummaryOnly - skipping writing laragon root files'
        }

        # Check bundled PHP
        $phpBase = Join-Path $root 'bin\php'
        Write-Host "Checking PHP in $phpBase"
        if (Test-Path $phpBase) {
             $phpVersions = Get-ChildItem -Path $phpBase -Directory | Sort-Object Name -Descending
             foreach ($v in $phpVersions) {
                 Write-Host "Checking version: $($v.FullName)"
                 $phpExe = Join-Path $v.FullName 'php.exe'
                 if (Test-Path $phpExe) {
                     $pver = Get-CommandVersion $phpExe '--version'
                     if ($pver) { 
                        Write-Host "PHP bundled avec Laragon: $($v.Name) (version $pver)" -ForegroundColor Green
                        Write-Log ("Laragon PHP: " + $v.Name + " v" + $pver)
                        
                        # Add PHP to PATH for this session
                        $phpBin = $v.FullName
                        if ($env:Path -notlike "*$phpBin*") {
                            $env:Path = "$phpBin;" + $env:Path
                            Write-Host "Ajout de PHP au PATH: $phpBin" -ForegroundColor Cyan
                            Write-Log "Added PHP to PATH: $phpBin"
                        }
                        break 
                     }
                 }
             }
        }

        # Check bundled Composer
        $composerDir = Join-Path $root 'bin\composer'
        if (Test-Path $composerDir) {
            if ($env:Path -notlike "*$composerDir*") {
                $env:Path = "$composerDir;" + $env:Path
                Write-Host "Ajout de Composer au PATH: $composerDir" -ForegroundColor Cyan
                Write-Log "Added Composer to PATH: $composerDir"
            }
        }

        # Check bundled Node.js (if not already found in path)
        if (-not (Get-Command node -ErrorAction SilentlyContinue)) {
            $nodeBase = Join-Path $root 'bin\nodejs'
            if (Test-Path $nodeBase) {
                 $nodeVersions = Get-ChildItem -Path $nodeBase -Directory | Sort-Object Name -Descending
                 foreach ($v in $nodeVersions) {
                     $nodeExe = Join-Path $v.FullName 'node.exe'
                     if (Test-Path $nodeExe) {
                        $nodeBin = $v.FullName
                        if ($env:Path -notlike "*$nodeBin*") {
                            $env:Path = "$nodeBin;" + $env:Path
                            Write-Host "Ajout de Node.js au PATH: $nodeBin" -ForegroundColor Cyan
                            Write-Log "Added Node.js to PATH: $nodeBin"
                        }
                        break
                     }
                 }
            }
        }
        return $true
    } else {
        Write-Host "Laragon non détecté dans '$root' (laragon.exe introuvable)." -ForegroundColor Gray
        Write-Log ("Laragon root found but laragon.exe missing at " + $root)
        # Remove any previously exported env var to avoid stale value
        try { Remove-Item Env:\LARAGON_ROOT -ErrorAction SilentlyContinue } catch { }
        return $false
    }
}

if (Check-Laragon) { $laragonDetected = $true } else { $laragonDetected = $false }

# Execute a shell command or just print it when DryRun is set
function Invoke-Step([string]$cmd, [string]$message = $null) {
    if ($message) { Log-Verbose($message); Write-Log($message) }
    if ($DryRun) {
        Write-Host "[DRYRUN] $cmd" -ForegroundColor Yellow
        Write-Log("[DRYRUN] " + $cmd)
    } else {
        try {
            Log-Verbose("Executing: $cmd")
            Invoke-Expression $cmd
        } catch {
            Write-Host "Erreur lors de l'exécution de: $cmd" -ForegroundColor Red
            Write-Log("Error executing: $cmd - " + $_.Exception.Message)
            throw
        }
    }
}

# Dry-run summary: when -DryRun is set, display a human-friendly plan of steps
if ($DryRun -or $SummaryOnly) {
    $PlannedSteps = @()
    if (-not $SkipComposer) { $PlannedSteps += 'Composer install (composer install --no-interaction --prefer-dist)' }
    $PlannedSteps += 'Install spatie/laravel-permission if missing (composer require spatie/laravel-permission)'
    $PlannedSteps += 'Vendor publish for Spatie (config + migrations) if needed (php artisan vendor:publish ...)'
    $PlannedSteps += 'Run migrations (php artisan migrate --force)'
    $PlannedSteps += 'Create storage symlink (php artisan storage:link)'
    $PlannedSteps += 'Seed roles, users and test data (RolePermissionSeeder, UserSeeder, TestDataSeeder)'
    if ($RunFactoryData) { $PlannedSteps += 'Seed factory bulk data (FactoryDataSeeder) (flag -RunFactoryData)' }
    if (-not $SkipNpm) { $PlannedSteps += 'NPM install and build assets (npm install && npm run dev) (if npm available)' }

    $title = ($SummaryOnly) ? 'SummaryOnly: plan (will exit after displaying)' : 'Dry-Run Summary: planned steps'
    Write-Host "`n== $title ==" -ForegroundColor Yellow
    Write-Log $title
    for ($i = 0; $i -lt $PlannedSteps.Count; $i++) {
        $num = $i + 1
        $item = $PlannedSteps[$i]
        Write-Host "[$num] $item"
        Write-Log ("DRYRUN PLAN ${num}: " + $item)
    }
    if ($DryRun) { Write-Host "`nNote: Dry-Run enabled — commands are shown but NOT executed." -ForegroundColor Yellow; Write-Log 'DryRun mode - no commands executed' }
    if ($SummaryOnly) {
        Write-Host "`nSummaryOnly flag present — sortie immédiate sans exécution." -ForegroundColor Yellow
        Write-Log 'SummaryOnly - exiting after printing plan'
        Pop-Location
        exit 0
    }
}

# Vérifications préalables

$phpOk = (Get-Command php -ErrorAction SilentlyContinue) -ne $null
$composerOk = (Get-Command composer -ErrorAction SilentlyContinue) -ne $null
$npmOk = (Get-Command npm -ErrorAction SilentlyContinue) -ne $null

if (-not $phpOk) { Write-Host "PHP non trouvé. Veuillez installer PHP (Laragon fournit PHP)." -ForegroundColor Red; if ($FailOnPrereqs) { exit 1 } }
if (-not $composerOk) { Write-Host "Composer non trouvé. Installer Composer ou utilisez Laragon Shell." -ForegroundColor Red; if ($FailOnPrereqs) { exit 1 } }
if (-not $npmOk) { Write-Host "npm non trouvé. Installer Node.js." -ForegroundColor Yellow }

Log-Verbose("php: " + (Get-Command php).Source)
if ($composerOk) { Log-Verbose("composer: " + (Get-Command composer).Source) }
if ($npmOk) { Log-Verbose("npm: " + (Get-Command npm).Source) }
Write-Log ("Checks: phpOk=" + $phpOk + ", composerOk=" + $composerOk + ", npmOk=" + $npmOk)

# Version checks (recommandations définies dans README)
$allOk = $true
$allOk = $allOk -and (Check-ToolVersion 'php' 'PHP' '8.2')
$allOk = $allOk -and (Check-ToolVersion 'composer' 'Composer' '2.5')
$allOk = $allOk -and (Check-ToolVersion 'node' 'Node.js' '18.16')
$allOk = $allOk -and (Check-ToolVersion 'npm' 'npm' '8.19')
$allOk = $allOk -and (Check-ToolVersion 'git' 'Git' '2.40.1')



if (-not $allOk) {
    Write-Host "Certaines vérifications de versions ont échoué. Utilisez -FailOnPrereqs pour faire échouer le script en cas d'erreur." -ForegroundColor Yellow
    Write-Log 'Prereq version checks failed'
    if ($FailOnPrereqs) { Pop-Location; exit 1 }
}

# Charger .env si nécessaire
if (-not (Test-Path -Path .env)) {
    if (Test-Path -Path .env.example) {
        Copy-Item -Path .env.example -Destination .env -Force
        Write-Host ".env créé à partir de .env.example" -ForegroundColor Green
        Write-Log ".env créé à partir de .env.example"
        & php artisan key:generate | Out-Null
        Write-Host "APP_KEY générée." -ForegroundColor Green
        Write-Log "APP_KEY générée"
    } else {
        Write-Host "Fichier .env.example introuvable. Créez un .env manuellement." -ForegroundColor Red
        Write-Log "Fichier .env.example introuvable"
    }
} else {
    Write-Host ".env existe déjà. Saute key generation." -ForegroundColor Gray
    Write-Log ".env existe déjà. Saute key generation."
}

if (-not $SkipComposer) {
    # Composer install (dépendances du projet)
    Write-Host "\n== Composer install (dépendances existantes) ==" -ForegroundColor Cyan
    Log-Verbose('Running: composer install --no-interaction --prefer-dist')
    Write-Log 'Composer install started'
    Invoke-Step 'composer install --no-interaction --prefer-dist' 'composer install'
    Write-Log 'Composer install finished'
} else {
    Write-Host "\n== Skip Composer install (flag -SkipComposer) ==" -ForegroundColor Gray
    Write-Log 'Skip Composer install (-SkipComposer)'
}

# Installer Spatie si nécessaire
Write-Host "\n== Installer spatie/laravel-permission (si non installé) ==" -ForegroundColor Cyan
$composerLock = Test-Path composer.lock
if (-not $SkipComposer) {
    $hasSpatie = $false
    if (Test-Path -Path composer.lock) {
        $hasSpatie = Select-String -Path composer.lock -Pattern "spatie/laravel-permission" -SimpleMatch -Quiet -ErrorAction SilentlyContinue
    }
    if (-not $hasSpatie) {
        Write-Host "Installation de spatie/laravel-permission..." -ForegroundColor Cyan
        Log-Verbose('Running: composer require spatie/laravel-permission --no-interaction')
        Write-Log 'Installing spatie/laravel-permission'
        Invoke-Step 'composer require spatie/laravel-permission --no-interaction' 'composer require spatie/laravel-permission'
        Write-Log 'Installed spatie/laravel-permission'
    } else {
        Write-Host "spatie/laravel-permission déjà présent dans composer.lock" -ForegroundColor Gray
        Write-Log 'spatie/laravel-permission already present in composer.lock'
    }
} else {
    Write-Host "Skip vérification/installation Spatie (flag -SkipComposer)" -ForegroundColor Gray
    Write-Log 'Skip verification/installation Spatie (-SkipComposer)'
}

# Publier assets Spatie (config + migrations) - optionnel
Write-Host "\n== Vendor:publish pour Spatie (config/migrations) ==" -ForegroundColor Cyan
if ($ForcePublish -or -not (Test-Path -Path "config/permission.php")) {
    try {
        Log-Verbose('Running: php artisan vendor:publish for Spatie (config + migrations)')
        Write-Log 'Vendor publish for Spatie started'
        Invoke-Step 'php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config" --force' 'vendor:publish spatie config'
        Invoke-Step 'php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations" --force' 'vendor:publish spatie migrations'
        Write-Host "Vendor publish exécuté pour Spatie." -ForegroundColor Green
        Write-Log 'Vendor publish for Spatie finished'
    } catch {
        Write-Host "vendor:publish Spatie a échoué ou n'était pas nécessaire (c'est OK si les fichiers existent déjà)." -ForegroundColor Yellow
        Write-Log 'Vendor publish for Spatie failed or was not necessary'
    }
} else {
    Write-Host "Saute vendor:publish Spatie (config existante et pas de flag -ForcePublish)" -ForegroundColor Gray
    Write-Log 'Skip vendor:publish (config exists and -ForcePublish not set)'
}


# Validate migration flags
if ($OnlyMigrate -and $SkipMigrate) {
    Write-Host "Options contradictoires : -OnlyMigrate et -SkipMigrate fournis. Choisissez une seule option." -ForegroundColor Red
    exit 1
}

# Migrations
if ($OnlyMigrate) {
    Write-Host "\n== OnlyMigrate: Exécution des migrations uniquement ==" -ForegroundColor Cyan
    Log-Verbose('Running: php artisan migrate --force')
    Write-Log 'Migrate started (OnlyMigrate)'
    Invoke-Step 'php artisan migrate --force' 'php artisan migrate'
    Write-Log 'Migrate finished (OnlyMigrate)'
    if (-not $SkipStorageLink) {
        Write-Host "\n== Création du lien storage (php artisan storage:link) ==" -ForegroundColor Cyan
        try { Log-Verbose('Running: php artisan storage:link'); Write-Log('Running: php artisan storage:link'); & php artisan storage:link } catch { Write-Host "storage:link a échoué (peut-être déjà créé)." -ForegroundColor Yellow }
    }
    Write-Host "OnlyMigrate terminé." -ForegroundColor Green
    Write-Log 'OnlyMigrate completed'
    Pop-Location
    exit 0
}

if (-not $SkipMigrate) {
    Write-Host "\n== Migrations ==" -ForegroundColor Cyan
    Log-Verbose('Running: php artisan migrate --force')
    Write-Log 'Migrate started'
    Invoke-Step 'php artisan migrate --force' 'php artisan migrate'
    Write-Log 'Migrate finished'
} else {
    Write-Host "Skip migrations (flag -SkipMigrate)" -ForegroundColor Gray
    Write-Log 'Skip migrations (-SkipMigrate)'
}

# Storage link
if (-not $SkipStorageLink) {
    Write-Host "\n== Création du lien storage (php artisan storage:link) ==" -ForegroundColor Cyan
    try { Log-Verbose('Running: php artisan storage:link'); Write-Log('Running: php artisan storage:link'); Invoke-Step 'php artisan storage:link' 'php artisan storage:link' } catch { Write-Host "storage:link a échoué (peut-être déjà créé)." -ForegroundColor Yellow; Write-Log('storage:link failed') }
} else {
    Write-Host "Skip storage link (flag -SkipStorageLink)" -ForegroundColor Gray
    Write-Log 'Skip storage link (-SkipStorageLink)'
}

# Seeders: roles + users + test data
Write-Host "\n== Seeders (roles, users, test data) ==" -ForegroundColor Cyan
    Log-Verbose('Running seeders: RolePermissionSeeder, UserSeeder, TestDataSeeder')
    Write-Log 'Seeders started'
    Invoke-Step 'php artisan db:seed --class=RolePermissionSeeder --force' 'db:seed RolePermissionSeeder'
    Invoke-Step 'php artisan db:seed --class=UserSeeder --force' 'db:seed UserSeeder'
    Invoke-Step 'php artisan db:seed --class=TestDataSeeder --force' 'db:seed TestDataSeeder'
    Write-Log 'Seeders finished'
if ($RunFactoryData) {
    Write-Host "Exécution de FactoryDataSeeder (bulk) car flag -RunFactoryData fourni." -ForegroundColor Cyan
    Log-Verbose('Running: php artisan db:seed --class=FactoryDataSeeder --force')
    Write-Log 'FactoryDataSeeder started'
    Invoke-Step 'php artisan db:seed --class=FactoryDataSeeder --force' 'db:seed FactoryDataSeeder'
    Write-Log 'FactoryDataSeeder finished'
} else {
    Write-Host "Skip FactoryDataSeeder (passer -RunFactoryData pour l'exécuter)" -ForegroundColor Gray
    Write-Log 'Skip FactoryDataSeeder'
}

# NPM / assets
if (-not $SkipNpm -and $npmOk) {
    Write-Host "\n== NPM install && npm run dev ==" -ForegroundColor Cyan
    Log-Verbose('Running: npm install')
    Write-Log 'NPM install started'
    Invoke-Step 'npm install' 'npm install'
    Write-Log 'NPM install finished'
    Log-Verbose('Running: npm run dev')
    Write-Log 'NPM run dev started'
    Invoke-Step 'npm run dev' 'npm run dev'
    Write-Log 'NPM run dev finished'
} elseif ($SkipNpm) {
    Write-Host "Skip NPM (flag -SkipNpm)" -ForegroundColor Gray
    Write-Log 'Skip NPM (-SkipNpm)'
} else {
    Write-Host "npm non disponible: saute compilation assets." -ForegroundColor Yellow
    Write-Log 'npm non disponible: skip assets'
}

Write-Host "\n== Setup terminé. Vérifiez les logs ci‑dessous pour d'éventuelles erreurs. ==" -ForegroundColor Green
Write-Log 'Setup terminé'

Pop-Location
