<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text-primary leading-tight">
            {{ __("Paramètres") }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- User Management Link -->
                <a href="{{ route("admin.users.index") }}" class="block group">
                    <div class="bg-bg-surface p-6 rounded-lg shadow border border-border-default hover:border-accent-500 transition-colors duration-200">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 rounded-full bg-accent-500/10 text-accent-500 group-hover:bg-accent-500 group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <svg class="w-5 h-5 text-text-muted group-hover:text-accent-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-text-primary mb-2">Gestion des Utilisateurs</h3>
                        <p class="text-text-secondary text-sm">Gérer les administrateurs, les agents et leurs permissions.</p>
                    </div>
                </a>

                <!-- Vehicle Catalog -->
                <div class="bg-bg-surface shadow rounded-lg border border-border-default md:col-span-2 lg:col-span-2">
                    <div class="px-6 py-4 border-b border-border-default flex justify-between items-center">
                        <h3 class="text-lg font-medium text-text-primary">Catalogue Véhicules</h3>
                        <a href="{{ route("admin.brands.index") }}" class="px-4 py-2 bg-accent-500 text-white text-sm font-medium rounded-md hover:bg-accent-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-500 transition-colors duration-200">
                            Gérer Marques
                        </a>
                    </div>
                    <div class="overflow-hidden">
                        <ul role="list" class="divide-y divide-border-default">
                            @foreach($brands as $brand)
                            <li class="px-6 py-4 hover:bg-bg-elevated transition-colors duration-150">
                                <div class="flex items-center justify-between">
                                    <div class="text-sm font-medium text-text-primary">
                                        {{ $brand->name }}
                                    </div>
                                    <div class="text-sm text-text-secondary">
                                        {{ $brand->models_count }} modèles
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- General Settings (Placeholder) -->
                <div class="bg-bg-surface p-6 rounded-lg shadow border border-border-default">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-full bg-status-warning/10 text-status-warning">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-medium text-text-primary mb-2">Configuration Système</h3>
                    <p class="text-text-secondary text-sm mb-4">Paramètres généraux de l application.</p>
                    <button class="w-full px-4 py-2 border border-border-default text-text-primary text-sm font-medium rounded-md hover:bg-bg-elevated focus:outline-none">
                        Configurer
                    </button>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
