# BATELA RETROVISEUR NA YO — Design Tokens

Dark, premium design tokens for the BATELA PWA (Agent/Admin). This handoff includes CSS variables, minimal base styles, and quick usage examples.

## Contents
- `design-tokens.css`: core variables (colors, typography, spacing, radius, shadows, status) + tiny reference styles.

## Install & Use
Include once at the app root:

```html
<link rel="stylesheet" href="./design-tokens.css" />
<!-- Optional font: Inter -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&display=swap" rel="stylesheet">
```

Use variables in your components:

```css
.button-primary {
  background: var(--accent);
  color: var(--bg-background);
  border-radius: var(--radius-pill);
  box-shadow: var(--shadow-sm);
}
.button-primary:hover { background: var(--accent-hover); }
.button-primary:focus-visible { outline: none; box-shadow: 0 0 0 3px var(--focus-ring); }
```

Accessible inputs:

```css
.input {
  background: var(--bg-elevated);
  color: var(--text-primary);
  border: 1px solid var(--border-card);
  border-radius: var(--radius-input);
  padding: 10px 12px;
}
.input::placeholder { color: var(--text-muted); }
.input:focus-visible { outline: none; box-shadow: 0 0 0 3px var(--focus-ring); }
```

## Token Reference
- Surfaces: `--bg-background`, `--bg-surface`, `--bg-elevated`
- Borders: `--border-card`, `--border-divider`
- Text: `--text-primary`, `--text-secondary`, `--text-muted`
- Accent: `--accent`, `--accent-hover`, `--focus-ring`
- Status: `--success`, `--warning`, `--danger`
- Radius: `--radius-input`, `--radius-card`, `--radius-pill`
- Spacing: `--space-{4|8|12|16|24|32}`
- Shadows: `--shadow-sm|md|lg`
- Type: `--font-sans`, `--h1|h2|h3|body|caption-*`
- Motion: `--transition-fast|medium|slow`

## Breakpoints & Layout (design guidance)
- Mobile 360: margins 16, gutter 8, bottom nav 64
- Tablet 768: 12 cols, margins 24, gutter 16, sidebar 72
- Desktop 1440: 12 cols, margins 80, gutter 24, sidebar 80, topbar 64

## Notes
- Icons: Lucide (stroke 1.5px, `currentColor`)
- Contrast: AA or better; touch targets  44px
- Skeletons: subtle shimmer for KPIs/lists; empty states with CTA
- PWA: offline banner + sync indicator (UI only)

## Liens du projet

### 🔗 Dépôt GitHub
- **Repository:** [https://github.com/kyupy81/brny](https://github.com/kyupy81/brny)
- **Issues:** [https://github.com/kyupy81/brny/issues](https://github.com/kyupy81/brny/issues)

### 📚 Documentation API
- **Documentation complète:** [docs/api-documentation.md](docs/api-documentation.md)
- **Endpoints disponibles:**
  - Authentification (OTP, Login/Logout)
  - Gestion des dossiers (CRUD)
  - Téléchargement de photos
  - Recherche de véhicules
  - Vérification publique (QR Code)

### 📖 Documentation supplémentaire
- [Guide d'intégration](docs/integration-guide.md) - Intégration des composants Agent/Admin
- [Exemples de composants](docs/component-examples.md) - Composants Blade réutilisables
- [Utilisation des tokens](docs/design-tokens-usage.md) - Guide des design tokens

## Next
If you want, I can add a Style Dictionary JSON for Figma import, Tailwind config mapping, or scaffold component examples (buttons, cards, badges, inputs) using these tokens.
