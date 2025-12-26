# BRNY - Setup Development (Laragon)

This repository includes a PowerShell script `setup-dev.ps1` to initialize the local development environment (Windows / Laragon) for the BRNY project.

## Purpose
Provide a reproducible sequence of steps to set up the project: install PHP/JS dependencies, run migrations, create storage symlink and load test data.

## Usage examples (PowerShell)

- Display the planned steps then exit:
```powershell
.\setup-dev.ps1 -SummaryOnly
```

- Show the commands that would be run (DryRun) with verbose output:
```powershell
.\setup-dev.ps1 -DryRun -Verbose
```

- Execute the full setup (composer, migrations, seeders, npm build):
```powershell
.\setup-dev.ps1
```

- Run only migrations then exit:
```powershell
.\setup-dev.ps1 -OnlyMigrate
```

## Notes
- The script is intended for local development only.
- `spatie/laravel-permission` will be installed automatically if missing (when `composer` is available).
- The script writes a log `setup-dev-<timestamp>.log` in the logs directory.

## Prerequisites

- Windows (recommended: Windows 10/11)
- Laragon (or PHP, MySQL and a local web server configured)
- PHP 8.1+ (or the version required by your Laravel installation)
- Composer (latest stable recommended)
- Node.js & npm (to build assets; Node 16+ recommended)
- Git (optional but recommended for init/commit)

### Recommended versions (example exacts)

- `PHP 8.2` (e.g. 8.2.x)
- `Composer 2.5` (e.g. 2.5.x)
- `Node.js 18.16` (Node 18 LTS)
- `npm 8.19` (matching Node 18)
- `Git 2.40.1`
- `Laragon 5.0.0` (or recent stable)

These are reasonable recommendations for a modern Laravel environment; adjust as needed. Ensure the executables are in your `PATH`.

Ensure `php`, `composer`, `npm` and `git` are available in your `PATH` before running the script.

## Quick run badge

To print the planned steps without executing them:

```powershell
.\setup-dev.ps1 -SummaryOnly
```


## Project Links

### 🔗 GitHub Repository
- **Repository:** [https://github.com/kyupy81/brny](https://github.com/kyupy81/brny)
- **Issues:** [https://github.com/kyupy81/brny/issues](https://github.com/kyupy81/brny/issues)

### 📚 API Documentation
- **Complete documentation:** [docs/api-documentation.md](docs/api-documentation.md)
- **Available endpoints:**
  - Authentication (OTP, Login/Logout)
  - Registration management (CRUD)
  - Photo uploads
  - Vehicle search
  - Public verification (QR Code)

### 📖 Additional Documentation
- [Integration Guide](docs/integration-guide.md) - Agent/Admin component integration
- [Component Examples](docs/component-examples.md) - Reusable Blade components
- [Token Usage](docs/design-tokens-usage.md) - Design tokens guide

## Help
To display the built-in help:
```powershell
.\setup-dev.ps1 -Help
```
