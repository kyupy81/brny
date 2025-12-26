<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text-primary leading-tight">
            {{ __("Résultat Import") }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg-surface overflow-hidden shadow-sm sm:rounded-lg border border-border-default p-6">
                <h3 class="text-lg font-bold mb-4 text-text-primary">Statistiques</h3>
                <ul class="list-disc pl-5 mb-6 text-text-secondary">
                    <li class="text-status-success">Créés : {{ $stats["created"] }}</li>
                    <li class="text-accent-500">Mis à jour : {{ $stats["updated"] }}</li>
                </ul>

                @if(count($stats["errors"]) > 0)
                    <h3 class="text-lg font-bold mb-2 text-status-danger">Erreurs</h3>
                    <ul class="list-disc pl-5 text-status-danger">
                        @foreach($stats["errors"] as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-status-success font-bold">Aucune erreur détectée.</p>
                @endif

                <div class="mt-6">
                    <a href="{{ route("admin.users.index") }}" class="inline-flex items-center px-4 py-2 bg-bg-elevated border border-border-default rounded-md font-semibold text-xs text-text-primary uppercase tracking-widest hover:bg-bg-background focus:outline-none transition ease-in-out duration-150">
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
