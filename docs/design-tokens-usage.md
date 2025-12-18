# Design Tokens — Usage (Agent & Admin)

This PR adds a Style Dictionary JSON (`tokens/style-dictionary/brny.tokens.json`) for Figma import and dev consumption.

## Figma Import (Tokens Studio / Variables)
- Open your Figma file, install Tokens Studio (or use your variables importer).
- Import `tokens/style-dictionary/brny.tokens.json`.
- Map categories: Colors → Surface/Text/Accent/Status, Radius/Space/Shadow/Type/Motion.
- Publish to your Team Library so components can consume variables.

## Web Dev Consumption
- Prefer CSS variables from `design-tokens.css` for runtime theming.
- Or compile Style Dictionary to `css/variables.css` by adding SD to your toolchain.

### Tailwind (optional mapping)
```js
// tailwind.config.js (excerpt)
export default {
  theme: {
    extend: {
      colors: {
        bg: { background:'#0B0F14', surface:'#0F1620', elevated:'#141E2A' },
        border: { card:'#233041', divider:'#1B2634' },
        text: { primary:'#EAF0F7', secondary:'#A9B4C2', muted:'#7B8898' },
        accent: { DEFAULT:'#4CC3FF', hover:'#2FB5FF' },
        success:'#39D98A', warning:'#FFB020', danger:'#FF5A6A'
      },
      boxShadow: {
        sm:'0 6px 16px rgba(0,0,0,0.25)',
        md:'0 12px 30px rgba(0,0,0,0.35)',
        lg:'0 18px 40px rgba(0,0,0,0.45)'
      },
      borderRadius: { input:'12px', card:'16px', pill:'999px' },
      spacing: { 1:'4px', 2:'8px', 3:'12px', 4:'16px', 6:'24px', 8:'32px' }
    }
  }
}
```

## Agent (Mobile)  Examples
- Inputs: bg `--bg-elevated`, border `--border-card`, focus ring `--focus-ring`.
- Badges: ACTIVE `--success`, PENDING `--warning`, VOLÉ `--danger`.

## Admin (Desktop)  Examples
- KPI cards: surface `--bg-elevated`, shadow `--shadow-md`, text `--text-primary`.
- Charts: grid lines `--border-divider`, highlight color `--accent`.

## Notes
- Accessibility: AA contrast, focus visible (`--focus-ring`).
- Motion: 150250ms ease-out; respect reduced motion.
- Icons: Lucide outline, 1.5px stroke, `currentColor`.
