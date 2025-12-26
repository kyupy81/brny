<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text-primary leading-tight">
            {{ __("Import Utilisateurs (Excel)") }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg-surface overflow-hidden shadow-sm sm:rounded-lg border border-border-default p-6">
                <form action="{{ route("admin.users.import.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-6">
                        <label class="block text-text-primary text-sm font-bold mb-2">Fichier Excel (.xlsx)</label>
                        <input type="file" name="file" required class="block w-full text-sm text-text-secondary
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-accent-500 file:text-white
                            hover:file:bg-accent-600
                            cursor-pointer border border-border-default rounded-md bg-bg-background p-2
                        ">
                        <p class="text-xs text-text-muted mt-2">Colonnes attendues : Role, Name, Phone, Email, PIN</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-text-primary text-sm font-bold mb-2">Mode d import</label>
                        <select name="mode" class="block w-full rounded-md border-border-default bg-bg-background text-text-primary shadow-sm focus:border-accent-500 focus:ring-accent-500 p-2">
                            <option value="skip">Ignorer si le téléphone existe déjà</option>
                            <option value="update">Mettre à jour si existe</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-accent-500 text-white px-4 py-2 rounded-md hover:bg-accent-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-500 transition-colors duration-200">
                            Importer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
