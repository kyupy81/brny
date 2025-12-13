<#
publish-readme.ps1
Helper script to initialize a local git repo and commit README files if git is available.
Usage: Run from the repository root: .\publish-readme.ps1
#>

Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

if (-not (Get-Command git -ErrorAction SilentlyContinue)) {
    Write-Host "git not found in PATH. Please install Git and re-run this script." -ForegroundColor Yellow
    exit 0
}

# Ensure we're in the script folder
if ($PSScriptRoot) { Push-Location $PSScriptRoot } else { Push-Location (Split-Path -Path $MyInvocation.MyCommand.Definition -Parent) }

if (-not (Test-Path .git)) {
    git init
    Write-Host "Initialized empty git repository." -ForegroundColor Green
} else {
    Write-Host "Git repository already initialized." -ForegroundColor Gray
}

# Add README + helper files if present
$filesToCommit = @('README.md','README.en.md','laragon-root.txt','.env.local','publish-readme.ps1','setup-dev.ps1') | Where-Object { Test-Path $_ }
# If no files found to commit, exit
if ($filesToCommit.Count -eq 0) {
    Write-Host "No recognized files found to commit." -ForegroundColor Yellow
    Pop-Location
    exit 0
}

# Stage and commit the files
git add $filesToCommit
$commitMsg = "chore: add README and setup helper files"
# Only commit if there are staged changes
if ((git diff --cached --name-only) -ne '') {
    git commit -m $commitMsg
    Write-Host "Committed files: $($filesToCommit -join ', ')" -ForegroundColor Green
} else {
    Write-Host "No changes to commit for recognized files." -ForegroundColor Gray
}

Pop-Location
