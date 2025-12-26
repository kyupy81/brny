<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text-primary leading-tight">
            {{ __("Détails du Signalement #") . $theft->id }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg-surface overflow-hidden shadow-sm sm:rounded-lg border border-border-default">
                <div class="p-6 text-text-primary">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-text-primary">Détails du Signalement #{{ $theft->id }}</h2>
                        <a href="{{ route("admin.operations") }}" class="text-text-secondary hover:text-text-primary transition-colors duration-200">Retour à la liste</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Vehicle Info -->
                        <div class="bg-bg-elevated p-4 rounded-lg border border-border-default">
                            <h3 class="text-lg font-semibold mb-3 text-text-primary">Véhicule Concerné</h3>
                            <dl class="grid grid-cols-1 gap-2">
                                <div class="flex justify-between">
                                    <dt class="text-text-secondary">Immatriculation:</dt>
                                    <dd class="font-medium text-text-primary">{{ $theft->vehicle->plate_number }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-text-secondary">Marque/Modèle:</dt>
                                    <dd class="font-medium text-text-primary">{{ $theft->vehicle->brand }} {{ $theft->vehicle->model }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-text-secondary">VIN:</dt>
                                    <dd class="font-medium text-text-primary">{{ $theft->vehicle->vin }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-text-secondary">Propriétaire:</dt>
                                    <dd class="font-medium text-text-primary">{{ $theft->vehicle->owner->name ?? "N/A" }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Report Info -->
                        <div class="bg-bg-elevated p-4 rounded-lg border border-border-default">
                            <h3 class="text-lg font-semibold mb-3 text-text-primary">Détails du Vol</h3>
                            <dl class="grid grid-cols-1 gap-2">
                                <div class="flex justify-between">
                                    <dt class="text-text-secondary">Signalé par:</dt>
                                    <dd class="font-medium text-text-primary">{{ $theft->reporter->name }} ({{ $theft->reporter->phone ?? $theft->reporter->email }})</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-text-secondary">Date du signalement:</dt>
                                    <dd class="font-medium text-text-primary">{{ $theft->created_at->format("d/m/Y H:i") }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-text-secondary">Date du vol:</dt>
                                    <dd class="font-medium text-text-primary">{{ $theft->reported_at ? \Carbon\Carbon::parse($theft->reported_at)->format("d/m/Y") : "Non précisée" }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-text-secondary">Lieu:</dt>
                                    <dd class="font-medium text-text-primary">{{ $theft->location ?? "Non précisé" }}</dd>
                                </div>
                                <div class="mt-2">
                                    <dt class="text-text-secondary">Description:</dt>
                                    <dd class="mt-1 text-sm text-text-primary bg-bg-surface p-2 rounded border border-border-default">{{ $theft->description ?? "Aucune description" }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Action Form -->
                    <div class="mt-8 border-t border-border-default pt-6">
                        <h3 class="text-lg font-semibold mb-4 text-text-primary">Traitement du Signalement</h3>
                        
                        <form action="{{ route("admin.thefts.update", $theft) }}" method="POST" class="max-w-xl">
                            @csrf
                            @method("PUT")

                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-text-secondary">Nouveau Statut</label>
                                <select name="status" id="status" class="mt-1 block w-full rounded-md border-border-default bg-bg-background text-text-primary shadow-sm focus:border-accent-500 focus:ring-accent-500">
                                    <option value="PENDING" {{ $theft->status === "PENDING" ? "selected" : "" }}>En attente (PENDING)</option>
                                    <option value="CONFIRMED" {{ $theft->status === "CONFIRMED" ? "selected" : "" }}>Confirmé (CONFIRMED) - Véhicule volé</option>
                                    <option value="RECOVERED" {{ $theft->status === "RECOVERED" ? "selected" : "" }}>Retrouvé (RECOVERED)</option>
                                    <option value="REJECTED" {{ $theft->status === "REJECTED" ? "selected" : "" }}>Rejeté (REJECTED)</option>
                                </select>
                                <p class="mt-1 text-sm text-text-muted">
                                    Note: Confirmer le vol marquera le véhicule comme "VOLÉ" dans la base de données publique.
                                </p>
                            </div>

                            <div class="mb-4">
                                <label for="admin_note" class="block text-sm font-medium text-text-secondary">Note interne (Optionnel)</label>
                                <textarea name="admin_note" id="admin_note" rows="3" class="mt-1 block w-full rounded-md border-border-default bg-bg-background text-text-primary shadow-sm focus:border-accent-500 focus:ring-accent-500">{{ $theft->admin_note ?? "" }}</textarea>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-accent-500 text-white px-4 py-2 rounded-md hover:bg-accent-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-500 transition-colors duration-200">
                                    Mettre à jour le statut
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
