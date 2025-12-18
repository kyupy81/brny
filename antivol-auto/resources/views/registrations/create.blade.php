@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-4">
    <h1 class="text-4xl font-black uppercase mb-8 border-b-4 border-black pb-4">Enregistrement Véhicule</h1>

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

    <form action="{{ route('registrations.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Propriétaire -->
        <div class="border-2 border-black p-6">
            <h2 class="text-xl font-bold uppercase mb-4 bg-black text-white inline-block px-2">Propriétaire</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-mono text-sm font-bold mb-2">Prénom</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="w-full border-2 border-black p-2 focus:outline-none focus:ring-2 focus:ring-black" required>
                </div>
                <div>
                    <label class="block font-mono text-sm font-bold mb-2">Nom</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="w-full border-2 border-black p-2 focus:outline-none focus:ring-2 focus:ring-black" required>
                </div>
                <div class="md:col-span-2">
                    <label class="block font-mono text-sm font-bold mb-2">Téléphone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border-2 border-black p-2 focus:outline-none focus:ring-2 focus:ring-black" required>
                </div>
                <div class="md:col-span-2">
                    <label class="block font-mono text-sm font-bold mb-2">Adresse</label>
                    <input type="text" name="address" value="{{ old('address') }}" class="w-full border-2 border-black p-2 focus:outline-none focus:ring-2 focus:ring-black">
                </div>
            </div>
        </div>

        <!-- Véhicule -->
        <div class="border-2 border-black p-6">
            <h2 class="text-xl font-bold uppercase mb-4 bg-black text-white inline-block px-2">Véhicule</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-mono text-sm font-bold mb-2">Marque</label>
                    <select name="brand_id" id="brand_select" class="w-full border-2 border-black p-2 focus:outline-none focus:ring-2 focus:ring-black" required>
                        <option value="">Sélectionner...</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block font-mono text-sm font-bold mb-2">Modèle</label>
                    <select name="model_id" id="model_select" class="w-full border-2 border-black p-2 focus:outline-none focus:ring-2 focus:ring-black" required disabled>
                        <option value="">Sélectionner marque d'abord...</option>
                    </select>
                </div>
                <div>
                    <label class="block font-mono text-sm font-bold mb-2">Année</label>
                    <input type="number" name="manufacture_year" value="{{ old('manufacture_year') }}" min="1900" max="{{ date('Y') + 1 }}" class="w-full border-2 border-black p-2 focus:outline-none focus:ring-2 focus:ring-black" required>
                </div>
                <div>
                    <label class="block font-mono text-sm font-bold mb-2">Couleur</label>
                    <input type="text" name="color" value="{{ old('color') }}" class="w-full border-2 border-black p-2 focus:outline-none focus:ring-2 focus:ring-black">
                </div>
                <div class="md:col-span-2">
                    <label class="block font-mono text-sm font-bold mb-2">Plaque d'immatriculation</label>
                    <input type="text" name="plate_number" value="{{ old('plate_number') }}" class="w-full border-2 border-black p-2 focus:outline-none focus:ring-2 focus:ring-black uppercase" required>
                </div>
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-black text-white font-black uppercase px-8 py-4 hover:bg-gray-800 transition-colors text-lg tracking-widest">
                Enregistrer le véhicule
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('brand_select').addEventListener('change', function() {
        const brandId = this.value;
        const modelSelect = document.getElementById('model_select');
        
        modelSelect.innerHTML = '<option value="">Chargement...</option>';
        modelSelect.disabled = true;

        if (brandId) {
            fetch(`/api/brands/${brandId}/models`)
                .then(response => response.json())
                .then(data => {
                    modelSelect.innerHTML = '<option value="">Sélectionner...</option>';
                    data.forEach(model => {
                        const option = document.createElement('option');
                        option.value = model.id;
                        option.textContent = model.name;
                        modelSelect.appendChild(option);
                    });
                    modelSelect.disabled = false;
                });
        } else {
            modelSelect.innerHTML = '<option value="">Sélectionner marque d\'abord...</option>';
            modelSelect.disabled = true;
        }
    });
</script>
@endsection