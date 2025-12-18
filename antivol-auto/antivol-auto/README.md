# AntiVol Auto

Application Laravel 11 pour l'enregistrement et le marquage de véhicules.

## Prérequis

- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL

## Installation

1.  **Créer le projet**
    `ash
    composer create-project laravel/laravel antivol-auto
    cd antivol-auto
    `

2.  **Installer les dépendances**
    `ash
    composer require laravel/breeze --dev
    php artisan breeze:install blade
    composer require livewire/livewire
    composer require simplesoftwareio/simple-qrcode
    npm install
    `

3.  **Configuration**
    - Copier .env.example vers .env
    - Configurer la base de données dans .env :
      `env
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=antivol_auto
      DB_USERNAME=root
      DB_PASSWORD=
      `
    - Configurer le stockage :
      `ash
      php artisan storage:link
      `

4.  **Base de données**
    - Copier les fichiers de migration fournis dans database/migrations.
    - Lancer les migrations :
      `ash
      php artisan migrate
      `

5.  **Lancer l'application**
    `ash
    npm run dev
    php artisan serve
    `

## Fonctionnalités

- **Admin** : Gestion des agents.
- **Agent** : Enregistrement véhicule (Wizard), Marquage, Vérification.
- **Client** : Consultation de ses véhicules.
- **PWA** : Support offline basique.

## Structure

- pp/Models : Modèles Eloquent (Vehicle, Marking, etc.)
- pp/Livewire : Composants interactifs (Wizard, Search)
- pp/Services : Logique métier (MarkingService)
- public/service-worker.js : Configuration PWA

## Sécurité

- RBAC via Middleware/Gates (à implémenter dans AppServiceProvider).
- Validation stricte dans les composants Livewire.
