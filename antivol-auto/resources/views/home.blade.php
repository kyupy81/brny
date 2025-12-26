@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
        <h1 class="text-5xl font-black tracking-tighter uppercase mb-4">Batela Retroviseur Na Yo</h1>
        <p class="text-xl font-mono uppercase border-b-4 border-black inline-block pb-1">Protection & Sécurité Véhicule</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Enregistrement -->
        <div class="border-4 border-black p-8 hover:bg-black hover:text-white transition-colors group">
            <h2 class="text-3xl font-black uppercase mb-4">Enregistrer</h2>
            <p class="font-mono mb-6">Protégez votre véhicule en l'enregistrant dans notre base de données sécurisée.</p>
            <a href="{{ route('registrations.create') }}" class="inline-block border-2 border-black px-6 py-3 font-bold uppercase tracking-wider group-hover:border-white group-hover:bg-white group-hover:text-black transition-colors">
                Commencer ->
            </a>
        </div>

        <!-- Déclaration Vol -->
        <div class="border-4 border-black p-8 bg-red-600 text-white">
            <h2 class="text-3xl font-black uppercase mb-4">Signaler un Vol</h2>
            <p class="font-mono mb-6">Déclarez immédiatement le vol de votre véhicule ou de vos rétroviseurs.</p>
            <a href="{{ route('thefts.create') }}" class="inline-block border-2 border-white px-6 py-3 font-bold uppercase tracking-wider hover:bg-white hover:text-red-600 transition-colors">
                Déclarer ->
            </a>
        </div>
    </div>

    <div class="mt-12 border-t-4 border-black pt-8">
        <h3 class="text-2xl font-black uppercase mb-6">VOLES DU RETROVISEUR Récemment</h3>
        <div class="overflow-x-auto">
            <table class="w-full border-2 border-black font-mono text-sm">
                <thead class="bg-black text-white">
                    <tr>
                        <th class="p-3 text-left uppercase">Plaque</th>
                        <th class="p-3 text-left uppercase">Marque/Modèle</th>
                        <th class="p-3 text-left uppercase">Lieu</th>
                        <th class="p-3 text-left uppercase">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(\App\Models\TheftReport::with('vehicle.brand', 'vehicle.model')->latest()->take(5)->get() as $theft)
                        @if($theft->vehicle)
                        <tr class="border-b border-black">
                            <td class="p-3 font-bold">{{ $theft->vehicle->plate_number ?? 'N/A' }}</td>
                            <td class="p-3">
                                @if($theft->vehicle->brand && $theft->vehicle->model)
                                    {{ $theft->vehicle->brand->name }} {{ $theft->vehicle->model->name }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="p-3">{{ $theft->location ?? 'N/A' }}</td>
                            <td class="p-3">{{ $theft->reported_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        @endif
                    @empty
                        <tr class="border-b border-black">
                            <td colspan="4" class="p-3 text-center text-gray-500">Aucun vol déclaré</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4 text-right">
                <a href="{{ route('thefts.index') }}" class="underline font-bold uppercase">Voir toute la liste</a>
            </div>
        </div>
    </div>
</div>
@endsection

