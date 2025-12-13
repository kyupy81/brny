# BRNY - Setup Development (Laragon)

Ce dépôt contient un script PowerShell `setup-dev.ps1` pour initialiser l'environnement de développement local (Windows / Laragon) pour le projet BRNY.

## Objectif
Fournir une séquence réproducible d'étapes pour configurer le projet : installer les dépendances PHP/JS, exécuter les migrations, créer les liens de stockage et charger des données de test.

## Exemples d'utilisation (PowerShell)

- Afficher uniquement le plan des étapes puis quitter :
```powershell
.\setup-dev.ps1 -SummaryOnly
```

- Afficher les commandes prévues (DryRun) avec détail verbeux :
```powershell
.\setup-dev.ps1 -DryRun -Verbose
```

- Exécuter l'installation complète (composer, migrations, seeders, npm build) :
```powershell
.\setup-dev.ps1
```

- Exécuter uniquement les migrations puis quitter :
```powershell
.\setup-dev.ps1 -OnlyMigrate
```

## Remarques
- Le script est conçu pour un usage en développement local uniquement.
- `spatie/laravel-permission` est installé automatiquement si manquant (si `composer` est disponible).
- Le script écrit un log `setup-dev-<timestamp>.log` dans le répertoire des logs.

## Prérequis

- Windows (recommandé : Windows 10/11)
- Laragon (ou PHP, MySQL et un serveur local configurés)
- PHP 8.1+ (ou la version requise par votre installation Laravel)
- Composer (dernère version stable recommandée)
- Node.js & npm (pour compiler les assets ; Node 16+ recommandé)
- Git (optionnel mais recommandé pour init/commit)

### Versions recommandées (exemples exacts)

- `PHP 8.2` (par ex. 8.2.x)
- `Composer 2.5` (par ex. 2.5.x)
- `Node.js 18.16` (Node 18 LTS)
- `npm 8.19` (correspondant à Node 18)
- `Git 2.40.1`
- `Laragon 5.0.0` (ou version stable récente)

Ces versions sont des recommandations raisonnables pour un environnement Laravel moderne ; ajustez-les selon vos contraintes. Assurez-vous que les exécutables sont disponibles dans le `PATH`.

Assurez-vous que `php`, `composer`, `npm` et `git` sont dans votre `PATH` avant d'exécuter le script.

## Badge d'exécution rapide

Pour afficher un résumé rapide du plan sans exécuter :

```powershell
.\setup-dev.ps1 -SummaryOnly
```


## Aide
Pour afficher l'aide intégrée :
```powershell
.\setup-dev.ps1 -Help
```
