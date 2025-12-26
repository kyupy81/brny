<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text-primary leading-tight">
            {{ __('Super Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-success/10 border border-success text-success px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Quick Actions -->
            <div class="bg-bg-surface overflow-hidden shadow-sm sm:rounded-lg mb-6 border border-border-card">
                <div class="p-6 text-text-primary">
                    <h3 class="text-lg font-medium mb-4">Actions Rapides</h3>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('super_admin.agents.create') }}" class="inline-flex items-center px-4 py-2 bg-accent border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-accent-hover focus:bg-accent-hover active:bg-accent-hover focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Ajouter un Agent
                        </a>
                        <a href="{{ route('super_admin.admins.create') }}" class="inline-flex items-center px-4 py-2 bg-bg-elevated border border-border-divider rounded-md font-semibold text-xs text-text-primary uppercase tracking-widest hover:bg-bg-background focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Ajouter un Admin
                        </a>
                        <a href="{{ route('admin.local-site.show') }}" class="inline-flex items-center px-4 py-2 bg-bg-elevated border border-border-divider rounded-md font-semibold text-xs text-text-primary uppercase tracking-widest hover:bg-bg-background focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Trouver le site sur mon PC
                        </a>
                    </div>
                </div>
            </div>

            <!-- KPIs or other content can go here -->
            <div class="bg-bg-surface overflow-hidden shadow-sm sm:rounded-lg border border-border-card">
                <div class="p-6 text-text-primary">
                    {{ __("Bienvenue sur le tableau de bord Super Admin.") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
