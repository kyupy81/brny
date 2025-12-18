@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-4">
    <h1 class="text-4xl font-black uppercase mb-8 border-b-4 border-black pb-4 text-red-600">Signaler un Vol</h1>

    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
            <p class="font-bold">Attention</p>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('thefts.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="border-2 border-black p-6">
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block font-mono text-sm font-bold mb-2">Plaque d'immatriculation</label>
                    <input type="text" name="plate_number" value="{{ old('plate_number') }}" class="w-full border-2 border-black p-2 focus:outline-none focus:ring-2 focus:ring-black uppercase" required placeholder="Ex: 1234AB01">
                    <p class="text-xs text-gray-500 mt-1">Le véhicule doit être enregistré dans le système.</p>
                </div>
                
                <div>
                    <label class="block font-mono text-sm font-bold mb-2">Date et Heure du vol</label>
                    <input type="datetime-local" name="reported_at" value="{{ old('reported_at') }}" class="w-full border-2 border-black p-2 focus:outline-none focus:ring-2 focus:ring-black" required>
                </div>

                <div>
                    <label class="block font-mono text-sm font-bold mb-2">Lieu du vol</label>
                    <input type="text" name="location" value="{{ old('location') }}" class="w-full border-2 border-black p-2 focus:outline-none focus:ring-2 focus:ring-black" required placeholder="Commune, Quartier, Avenue...">
                </div>

                <div>
                    <label class="block font-mono text-sm font-bold mb-2">Description / Circonstances</label>
                    <textarea name="description" rows="4" class="w-full border-2 border-black p-2 focus:outline-none focus:ring-2 focus:ring-black" required>{{ old('description') }}</textarea>
                </div>
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-red-600 text-white font-black uppercase px-8 py-4 hover:bg-red-700 transition-colors text-lg tracking-widest">
                Lancer l'alerte
            </button>
        </div>
    </form>
</div>
@endsection