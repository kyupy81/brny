<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-text-primary leading-tight">
                {{ __("Modèles : ") . $brand->name }}
            </h2>
            <a href="{{ route("admin.brands.index") }}" class="text-sm text-text-secondary hover:text-text-primary">
                &larr; Retour aux marques
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session("success"))
                <div class="mb-4 bg-status-success/10 border border-status-success text-status-success px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session("success") }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Add Model Form -->
                <div class="md:col-span-1">
                    <div class="bg-bg-surface p-6 rounded-lg shadow border border-border-default sticky top-6">
                        <h3 class="text-lg font-medium text-text-primary mb-4">Ajouter un Modèle</h3>
                        <form action="{{ route("admin.brands.models.store", $brand) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-text-secondary mb-1">Nom du modèle</label>
                                <input type="text" name="name" id="name" required class="w-full rounded-md border-border-default bg-bg-background text-text-primary shadow-sm focus:border-accent-500 focus:ring-accent-500">
                            </div>
                            <button type="submit" class="w-full bg-accent-500 text-white px-4 py-2 rounded-md hover:bg-accent-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-500 transition-colors duration-200">
                                Ajouter
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Models List -->
                <div class="md:col-span-2">
                    <div class="bg-bg-surface shadow rounded-lg border border-border-default overflow-hidden">
                        <table class="min-w-full divide-y divide-border-default">
                            <thead class="bg-bg-elevated">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Nom</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-text-secondary uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-bg-surface divide-y divide-border-default">
                                @forelse($models as $model)
                                <tr class="hover:bg-bg-elevated transition-colors duration-150" x-data="{ editMode: false, name: \"{{ $model->name }}\" }">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span x-show="!editMode" class="text-sm font-medium text-text-primary">{{ $model->name }}</span>
                                        <form x-show="editMode" action="{{ route("admin.brands.models.update", [$brand, $model]) }}" method="POST" class="flex gap-2">
                                            @csrf
                                            @method("PUT")
                                            <input type="text" name="name" x-model="name" class="text-sm rounded-md border-border-default bg-bg-background text-text-primary px-2 py-1 w-full">
                                            <button type="submit" class="text-status-success hover:text-green-700">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            </button>
                                            <button type="button" @click="editMode = false" class="text-status-danger hover:text-red-700">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div x-show="!editMode" class="flex justify-end gap-3">
                                            <button @click="editMode = true" class="text-text-secondary hover:text-text-primary">Modifier</button>
                                            <form action="{{ route("admin.brands.models.destroy", [$brand, $model]) }}" method="POST" class="inline" onsubmit="return confirm(\"Êtes-vous sûr de vouloir supprimer ce modèle ?\");">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="text-status-danger hover:text-red-700">Supprimer</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-4 text-center text-text-secondary">Aucun modèle enregistré pour cette marque.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
