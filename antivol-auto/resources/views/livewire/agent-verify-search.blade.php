<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6">Vérifier un Véhicule</h2>

    <div class="flex gap-2 mb-6">
        <input type="text" wire:model="search" placeholder="Plaque, Code Marquage ou Téléphone" class="flex-1 border rounded p-2">
        <button wire:click="verify" class="bg-blue-600 text-white px-4 py-2 rounded">Rechercher</button>
    </div>

    @if ()
        <div class="border rounded p-4 bg-gray-50">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-xl font-bold">{{ ->plate_number }}</h3>
                    <p class="text-gray-600">{{ ->make }} {{ ->model }} ({{ ->year }})</p>
                </div>
                <span class="px-2 py-1 rounded text-sm {{ ->status === 'stolen' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                    {{ ucfirst(->status) }}
                </span>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <p class="text-sm text-gray-500">Propriétaire</p>
                    <p class="font-medium">{{ ->client->user->name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Téléphone</p>
                    <p class="font-medium">{{ ->client->user->phone }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Code Marquage</p>
                    <p class="font-medium">{{ ->marking->code ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Date Marquage</p>
                    <p class="font-medium">{{ ->marking->marked_at?->format('d/m/Y') ?? 'N/A' }}</p>
                </div>
            </div>

            @if(->marking && ->marking->qr_path)
                <div class="text-center mt-4">
                    <img src="{{ asset('storage/' . ->marking->qr_path) }}" alt="QR Code" class="w-32 h-32 mx-auto">
                </div>
            @endif
        </div>
    @elseif ( && !)
        <div class="text-center text-gray-500 mt-4">
            Aucun véhicule trouvé.
        </div>
    @endif
</div>
