# Design Tokens — Component Examples

Composants réutilisables (Blade) utilisant les tokens Tailwind et CSS.

## Utilisation

### Button
```blade
<x-design-tokens.button variant="primary" size="md">
    Save
</x-design-tokens.button>

<x-design-tokens.button variant="secondary">Cancel</x-design-tokens.button>
<x-design-tokens.button variant="ghost">More</x-design-tokens.button>
<x-design-tokens.button variant="danger" size="lg">Delete</x-design-tokens.button>
```

**Props:** `variant` (primary|secondary|ghost|danger), `size` (sm|md|lg), `disabled`

---

### Card
```blade
<x-design-tokens.card title="Agent Dashboard">
    <p class="text-text-secondary">Recent registrations</p>
    <ul class="mt-3 space-y-2">
        <li>Registration #001</li>
        <li>Registration #002</li>
    </ul>
</x-design-tokens.card>
```

**Props:** `title` (optional)

---

### Badge
```blade
<x-design-tokens.badge status="active">ACTIVE</x-design-tokens.badge>
<x-design-tokens.badge status="pending">PENDING</x-design-tokens.badge>
<x-design-tokens.badge status="stolen">STOLEN</x-design-tokens.badge>
<x-design-tokens.badge>Custom</x-design-tokens.badge>
```

**Props:** `status` (active|pending|stolen|default)

---

### Input
```blade
<x-design-tokens.input
    label="Plaque d'immatriculation"
    placeholder="XX-AAA-123"
    required
/>

<x-design-tokens.input
    type="email"
    label="Email"
    placeholder="agent@example.com"
    error="Email format invalid"
/>
```

**Props:** `type`, `label`, `placeholder`, `required`, `error`

---

### Alert
```blade
<x-design-tokens.alert type="success">
    Registration created successfully!
</x-design-tokens.alert>

<x-design-tokens.alert type="warning" dismissible>
    Please verify your phone number.
</x-design-tokens.alert>

<x-design-tokens.alert type="danger">
    An error occurred. Please try again.
</x-design-tokens.alert>
```

**Props:** `type` (info|success|warning|danger), `dismissible`

---

## Tokens de conception utilisés

- **Couleurs:** bg-background, bg-surface, bg-elevated, text-primary, text-secondary, accent, success, warning, danger
- **Radius:** rounded-card, rounded-input, rounded-pill
- **Spacing:** p-3, p-4, px-3, py-2 (1=4px, 2=8px, 3=12px, 4=16px, etc.)
- **Shadows:** shadow-md
- **Typography:** text-sm, text-base, font-semibold

## Intégration Agent/Admin

**Agent (Mobile):**
```blade
<x-design-tokens.card class="mb-4">
    <x-design-tokens.input label="Téléphone" placeholder="+243..." required />
    <x-design-tokens.button variant="primary" class="mt-3 w-full">
        Rechercher
    </x-design-tokens.button>
</x-design-tokens.card>
```

**Admin (Desktop):**
```blade
<div class="grid grid-cols-3 gap-4">
    <x-design-tokens.card title="KPI: Dossiers">
        <p class="text-2xl font-bold text-text-primary">1,234</p>
    </x-design-tokens.card>
    <x-design-tokens.card title="KPI: Vols">
        <p class="text-2xl font-bold text-danger">42</p>
    </x-design-tokens.card>
</div>
```

---

## Notes

- Tous les composants respectent les **normes d'accessibilité** (focus rings, contraste AA)
- Responsive et mobile-first
- Utilise `@apply` Tailwind pour des classes personnalisées complexes
- Peut être étendu avec des slots nommés pour plus de flexibilité
