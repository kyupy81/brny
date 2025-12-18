<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-xl text-black leading-tight uppercase">
            {{ __('Tableau de Bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-2 border-black p-6 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
                <div class="text-black font-bold uppercase text-lg mb-4">
                    {{ __("Bienvenue,") }} {{ Auth::user()->name }}
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @if(auth()->user()->role === 'admin')
                        <div class="border-2 border-black p-4 hover:bg-black hover:text-white transition cursor-pointer">
                            <h3 class="font-black text-4xl mb-2">AGENTS</h3>
                            <p class="font-bold uppercase">Gérer les agents</p>
                            <a href="{{ route('admin.agents') }}" class="block mt-4 text-sm underline">Accéder &rarr;</a>
                        </div>
                        <div class="border-2 border-black p-4 hover:bg-black hover:text-white transition cursor-pointer">
                            <h3 class="font-black text-4xl mb-2">STATS</h3>
                            <p class="font-bold uppercase">Statistiques Globales</p>
                        </div>
                    @elseif(auth()->user()->role === 'agent')
                        <div class="border-2 border-black p-4 hover:bg-black hover:text-white transition cursor-pointer">
                            <h3 class="font-black text-4xl mb-2">NOUVEAU</h3>
                            <p class="font-bold uppercase">Enregistrer Véhicule</p>
                            <a href="{{ route('agent.wizard') }}" class="block mt-4 text-sm underline">Commencer &rarr;</a>
                        </div>
                        <div class="border-2 border-black p-4 hover:bg-black hover:text-white transition cursor-pointer">
                            <h3 class="font-black text-4xl mb-2">VÉRIFIER</h3>
                            <p class="font-bold uppercase">Rechercher Véhicule</p>
                            <a href="{{ route('agent.verify') }}" class="block mt-4 text-sm underline">Rechercher &rarr;</a>
                        </div>
                    @else
                        <div class="border-2 border-black p-4 hover:bg-black hover:text-white transition cursor-pointer">
                            <h3 class="font-black text-4xl mb-2">MES VÉHICULES</h3>
                            <p class="font-bold uppercase">Consulter ma liste</p>
                            <a href="{{ route('client.vehicles') }}" class="block mt-4 text-sm underline">Voir &rarr;</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>