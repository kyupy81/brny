$phpPath = "C:\laragon\bin\php\php-8.3.26-Win32-vs16-x64"
$composerPath = "C:\laragon\bin\composer"
$env:Path = "$phpPath;$composerPath;$env:Path"
Write-Host "Environment configured for current session."
Write-Host "PHP Version:"
php -v
Write-Host "Composer Version:"
composer -V
