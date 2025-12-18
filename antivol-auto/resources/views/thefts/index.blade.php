@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4">
    <div class="flex justify-between items-center mb-8 border-b-4 border-black pb-4">
        <h1 class="text-4xl font-black uppercase">Véhicules Volés</h1>
        <a href="{{ route('thefts.create') }}" class="bg-red-600 text-white font-bold uppercase px-6 py-3 hover:bg-red-700 transition-colors">
            Signaler un vol
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($thefts as $theft)
        <div class="border-4 border-black p-6 relative">
            <div class="absolute top-0 right-0 bg-red-600 text-white text-xs font-bold px-2 py-1 uppercase">
                Volé le {{ $theft->reported_at->format('d/m/Y') }}
            </div>
            <h2 class="text-2xl font-black uppercase mb-2">{{ $theft->registration->vehicle->plate_number }}</h2>
            <p class="font-mono text-lg mb-4">{{ $theft->registration->vehicle->brand->name }} {{ $theft->registration->vehicle->model->name }}</p>
            
            <div class="space-y-2 text-sm font-mono">
                <p><span class="font-bold">Lieu:</span> {{ $theft->location }}</p>
                <p><span class="font-bold">Couleur:</span> {{ $theft->registration->vehicle->color ?? 'N/A' }}</p>
                <p class="mt-4 border-t-2 border-gray-200 pt-2 italic">"{{ Str::limit($theft->description, 100) }}"</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection