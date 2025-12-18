# Guide d'intégration  Design Tokens & Composants (Agent/Admin)

Ce guide montre comment intégrer les tokens et composants Blade dans l'interface **Agent (mobile 360px)** et **Admin (desktop 1440px)**.

---

## 1. Agent (Mobile)  Mode Terrain

### 1.1 Écran de connexion
```blade
<!-- resources/views/auth/login.blade.php -->
<div class="bg-bg-background min-h-screen flex items-center justify-center p-4">
    <x-design-tokens.card class="w-full max-w-sm">
        <h1 class="text-h1 text-text-primary mb-6 text-center">BATELA</h1>
        
        <form action="/login" method="POST" class="space-y-4">
            @csrf
            <x-design-tokens.input
                type="tel"
                label="Téléphone"
                placeholder="+243 98 123 4567"
                required
            />
            
            <x-design-tokens.input
                type="password"
                label="PIN"
                placeholder=""
                required
            />
            
            <x-design-tokens.button variant="primary" class="w-full">
                Se connecter
            </x-design-tokens.button>
        </form>
    </x-design-tokens.card>
</div>
```

### 1.2 Mode Terrain (recherche + résultats)
```blade
<!-- resources/views/agent/terrain.blade.php -->
<div class="bg-bg-background min-h-screen pb-20">
    <!-- Search bar -->
    <div class="sticky top-0 bg-bg-surface border-b border-border-divider p-4 z-10">
        <x-design-tokens.input
            placeholder="Plaque / Gravure / Téléphone..."
            class="text-sm"
        />
    </div>

    <!-- Recent dossiers -->
    <div class="p-4 space-y-3">
        <h2 class="text-h3 text-text-primary font-bold">5 derniers dossiers</h2>
        
        @foreach($recentDossiers as $dossier)
            <x-design-tokens.card class="cursor-pointer hover:shadow-lg transition-shadow">
                <div class="flex justify-between items-start mb-2">
                    <span class="text-text-primary font-bold">{{ $dossier->plate }}</span>
                    <x-design-tokens.badge :status="$dossier->status">
                        {{ strtoupper($dossier->status) }}
                    </x-design-tokens.badge>
                </div>
                <p class="text-text-secondary text-sm">{{ $dossier->owner_name }}</p>
                <p class="text-text-muted text-xs mt-1">{{ $dossier->created_at->format('d M Y') }}</p>
            </x-design-tokens.card>
        @endforeach
    </div>

    <!-- CTA button (sticky bottom) -->
    <div class="fixed bottom-20 left-4 right-4">
        <x-design-tokens.button variant="primary" class="w-full">
            + Nouveau dossier
        </x-design-tokens.button>
    </div>
</div>
```

### 1.3 Nouveau dossier (formulaire multi-étapes)
```blade
<!-- resources/views/agent/registration-wizard.blade.php -->
<div class="bg-bg-background min-h-screen p-4">
    <!-- Progress bar -->
    <div class="mb-6 flex space-x-2">
        <div class="flex-1 h-1 bg-accent rounded-pill"></div>
        <div class="flex-1 h-1 bg-border-card rounded-pill"></div>
        <div class="flex-1 h-1 bg-border-card rounded-pill"></div>
        <div class="flex-1 h-1 bg-border-card rounded-pill"></div>
    </div>

    <form class="space-y-4">
        <!-- Step 1: Propriétaire -->
        <x-design-tokens.card title="Propriétaire (étape 1/4)">
            <x-design-tokens.input label="Nom complet" required />
            <x-design-tokens.input type="tel" label="Téléphone" class="mt-3" required />
            
            <div class="grid grid-cols-2 gap-2 mt-3">
                <x-design-tokens.input label="Ville" required />
                <x-design-tokens.input label="Commune" required />
            </div>
            
            <x-design-tokens.input label="Quartier" class="mt-3" required />
        </x-design-tokens.card>

        <!-- Step 2: Véhicule -->
        <x-design-tokens.card title="Véhicule (étape 2/4)">
            <x-design-tokens.input label="Plaque" placeholder="XX-AAA-123" required />
            <x-design-tokens.input label="Marque" class="mt-3" required />
            <x-design-tokens.input label="Modèle" class="mt-3" required />
            <x-design-tokens.input type="number" label="Année" class="mt-3" min="1995" max="2025" required />
        </x-design-tokens.card>

        <!-- Step 3: Photos -->
        <x-design-tokens.card title="Photos (étape 3/4)">
            <p class="text-text-secondary text-sm mb-3">Plaque d'immatriculation *</p>
            <div class="border-2 border-dashed border-border-card rounded-card p-6 text-center hover:bg-bg-elevated transition">
                <p class="text-text-muted">Appuyez pour photographier</p>
            </div>
            
            <p class="text-text-secondary text-sm mt-4 mb-3">Rétroviseur gravé *</p>
            <div class="border-2 border-dashed border-border-card rounded-card p-6 text-center hover:bg-bg-elevated transition">
                <p class="text-text-muted">Appuyez pour photographier</p>
            </div>
        </x-design-tokens.card>

        <!-- Actions -->
        <div class="flex gap-2 mt-6">
            <x-design-tokens.button variant="secondary" class="flex-1">Retour</x-design-tokens.button>
            <x-design-tokens.button variant="primary" class="flex-1">Suivant</x-design-tokens.button>
        </div>
    </form>
</div>
```

### 1.4 Détails dossier + Actions
```blade
<!-- resources/views/agent/dossier-detail.blade.php -->
<div class="bg-bg-background min-h-screen p-4 pb-20">
    <!-- Status banner -->
    <div class="mb-4 p-3 bg-success/10 border border-success rounded-card">
        <x-design-tokens.badge status="active">ENREGISTRÉ</x-design-tokens.badge>
        <p class="text-success text-sm mt-2">Vérifié le 18 déc. 2025</p>
    </div>

    <!-- Info card -->
    <x-design-tokens.card title="Informations" class="mb-4">
        <div class="space-y-3 text-sm">
            <div>
                <p class="text-text-muted">Plaque</p>
                <p class="text-text-primary font-semibold">CA-123-ABC</p>
            </div>
            <div>
                <p class="text-text-muted">Propriétaire</p>
                <p class="text-text-primary font-semibold">Jean Dupont</p>
            </div>
            <div>
                <p class="text-text-muted">Téléphone</p>
                <p class="text-text-primary font-semibold">+243 98 123 4567</p>
            </div>
        </div>
    </x-design-tokens.card>

    <!-- Photos -->
    <x-design-tokens.card title="Photos" class="mb-4">
        <div class="space-y-3">
            <img src="" alt="Plaque" class="rounded-card w-full" />
            <img src="" alt="Rétroviseur" class="rounded-card w-full" />
        </div>
    </x-design-tokens.card>

    <!-- Actions -->
    <x-design-tokens.button variant="danger" class="w-full">
        Déclarer vol
    </x-design-tokens.button>
</div>
```

---

## 2. Admin (Desktop)  Pilotage

### 2.1 Dashboard global
```blade
<!-- resources/views/admin/dashboard.blade.php -->
<div class="bg-bg-background min-h-screen p-8">
    <h1 class="text-h1 text-text-primary mb-8">Tableau de bord</h1>

    <!-- KPI Grid -->
    <div class="grid grid-cols-3 gap-6 mb-8">
        <x-design-tokens.card title="Dossiers total">
            <p class="text-4xl font-bold text-accent">1,234</p>
            <p class="text-text-secondary text-sm mt-2">+12% ce mois</p>
        </x-design-tokens.card>

        <x-design-tokens.card title="Vols déclarés">
            <p class="text-4xl font-bold text-danger">42</p>
            <p class="text-text-secondary text-sm mt-2">3.4% du total</p>
        </x-design-tokens.card>

        <x-design-tokens.card title="Taux de résolution">
            <p class="text-4xl font-bold text-success">87%</p>
            <p class="text-text-secondary text-sm mt-2">+5% vs mois dernier</p>
        </x-design-tokens.card>
    </div>

    <!-- Chart -->
    <x-design-tokens.card title="Dossiers par jour (derniers 7 jours)" class="mb-8">
        <canvas id="registrations-chart"></canvas>
    </x-design-tokens.card>

    <!-- Alerts -->
    <x-design-tokens.alert type="warning" class="mb-4">
        <strong>3 doublons détectés</strong>  Vérification manuelle requise
    </x-design-tokens.alert>
</div>
```

### 2.2 Listage des vols (données et filtres)
```blade
<!-- resources/views/admin/thefts.blade.php -->
<div class="bg-bg-background min-h-screen p-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-h2 text-text-primary">Vols</h1>
        <x-design-tokens.button variant="primary">
            Exporter CSV
        </x-design-tokens.button>
    </div>

    <!-- Filters -->
    <x-design-tokens.card class="mb-6 p-4">
        <div class="flex gap-3">
            <x-design-tokens.input
                placeholder="Rechercher plaque, propriétaire..."
                class="flex-1"
            />
            <select class="bg-bg-elevated text-text-primary border border-border-card rounded-input px-3 py-2">
                <option>Statut: Tous</option>
                <option>OUVERT</option>
                <option>RÉSOLU</option>
            </select>
            <x-design-tokens.button variant="secondary">Réinitialiser</x-design-tokens.button>
        </div>
    </x-design-tokens.card>

    <!-- Table -->
    <x-design-tokens.card class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="border-b border-border-divider">
                <tr>
                    <th class="text-left p-3 text-text-primary font-semibold">Plaque</th>
                    <th class="text-left p-3 text-text-primary font-semibold">Propriétaire</th>
                    <th class="text-left p-3 text-text-primary font-semibold">Date vol</th>
                    <th class="text-left p-3 text-text-primary font-semibold">Statut</th>
                    <th class="text-left p-3 text-text-primary font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border-divider">
                @foreach($thefts as $theft)
                    <tr class="hover:bg-bg-elevated transition">
                        <td class="p-3 text-text-primary font-semibold">{{ $theft->vehicle->plate }}</td>
                        <td class="p-3 text-text-secondary">{{ $theft->owner->name }}</td>
                        <td class="p-3 text-text-muted">{{ $theft->reported_at->format('d M Y') }}</td>
                        <td class="p-3">
                            <x-design-tokens.badge :status="$theft->status === 'open' ? 'pending' : 'active'">
                                {{ strtoupper($theft->status) }}
                            </x-design-tokens.badge>
                        </td>
                        <td class="p-3">
                            <x-design-tokens.button variant="ghost" size="sm">
                                Détails
                            </x-design-tokens.button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-design-tokens.card>
</div>
```

### 2.3 Utilisateurs (CRUD)
```blade
<!-- resources/views/admin/users.blade.php -->
<div class="bg-bg-background min-h-screen p-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-h2 text-text-primary">Agents</h1>
        <x-design-tokens.button variant="primary">
            + Ajouter agent
        </x-design-tokens.button>
    </div>

    <!-- Agents Grid -->
    <div class="grid grid-cols-2 gap-6">
        @foreach($agents as $agent)
            <x-design-tokens.card class="hover:shadow-lg transition cursor-pointer">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h3 class="text-text-primary font-bold">{{ $agent->name }}</h3>
                        <p class="text-text-secondary text-sm">{{ $agent->email }}</p>
                    </div>
                    <x-design-tokens.badge :status="$agent->is_active ? 'active' : 'pending'">
                        {{ $agent->is_active ? 'ACTIF' : 'INACTIF' }}
                    </x-design-tokens.badge>
                </div>

                <p class="text-text-muted text-xs mb-3">{{ $agent->dossiers_count }} dossiers</p>

                <div class="flex gap-2">
                    <x-design-tokens.button variant="secondary" size="sm" class="flex-1">
                        Éditer
                    </x-design-tokens.button>
                    <x-design-tokens.button variant="danger" size="sm" class="flex-1">
                        Désactiver
                    </x-design-tokens.button>
                </div>
            </x-design-tokens.card>
        @endforeach
    </div>
</div>
```

---

## 3. Bonnes pratiques de conception

### 3.1 Spacing et Layout
```blade
<!-- Utiliser l'échelle d'espacement -->
<div class="p-4">           <!-- --space-16 (16px) -->
    <div class="mb-2">      <!-- --space-8 (8px) -->
        <p>Content</p>
    </div>
    <div class="space-y-3"> <!-- --space-12 (12px) between children -->
        <p>Item 1</p>
        <p>Item 2</p>
    </div>
</div>
```

### 3.2 Couleurs et contraste
```blade
<!-- Primary text sur backgrounds sombres -->
<div class="bg-bg-surface text-text-primary">Primary text (AA contrast)</div>

<!-- Secondary text pour les infos complémentaires -->
<p class="text-text-secondary">Secondary info</p>

<!-- Muted pour les labels, placeholders -->
<input placeholder="Search..." class="placeholder-text-muted" />
```

### 3.3 Responsivité
```blade
<!-- Agent: mobile-first (360px) -->
<div class="p-4 pb-20">     <!-- Bottom padding for nav -->
    <x-design-tokens.card class="mb-4">Content</x-design-tokens.card>
</div>

<!-- Admin: desktop (1440px) -->
<div class="grid grid-cols-3 gap-8 p-8">
    <x-design-tokens.card>KPI 1</x-design-tokens.card>
    <x-design-tokens.card>KPI 2</x-design-tokens.card>
    <x-design-tokens.card>KPI 3</x-design-tokens.card>
</div>
```

### 3.4 Accessibilité
```blade
<!-- Toujours inclure labels pour inputs -->
<x-design-tokens.input label="Plaque" required />

<!-- Utiliser des focus rings visibles -->
<button class="focus:ring-2 focus:ring-accent">Action</button>

<!-- ARIA roles pour alertes -->
<x-design-tokens.alert type="danger" role="alert">
    Error message
</x-design-tokens.alert>
```

---

## 4. Intégration Figma  Code

1. **Figma (Designer):**
   - Importer tokens via Tokens Studio
   - Créer composants (Button, Card, Badge) avec tokens
   - Publier librairie partagée

2. **Code (Dev):**
   - Utiliser composants Blade correspondants
   - Appliquer tokens Tailwind pour variantes custom
   - Régénérer CSS si tokens changent: `npm run build:tokens`

3. **Sync:**
   - Designer met à jour tokens dans Figma
   - Dev met à jour `tokens/style-dictionary/brny.tokens.json`
   - Rebuild + deploy

---

## 5. Checkliste de migration

- [ ] Agent: implémenter login avec composant Button + Input
- [ ] Agent: écran Mode Terrain avec Card + Badge
- [ ] Agent: formulaire multi-étapes pour nouveau dossier
- [ ] Admin: dashboard avec KPI cards
- [ ] Admin: liste vols avec filtres
- [ ] Admin: CRUD agents avec Card
- [ ] Tester accessibilité (focus, contraste)
- [ ] Vérifier responsivité (360/768/1440px)
- [ ] Documenter composants supplémentaires si ajout

---

## 6. Support & Questions

- **Tokens:** voir `docs/design-tokens-usage.md`
- **Composants:** voir `docs/component-examples.md`
- **Build:** `npm run build:tokens`
- **Reset CSS:** `npm run clean:tokens && npm run build:tokens`
