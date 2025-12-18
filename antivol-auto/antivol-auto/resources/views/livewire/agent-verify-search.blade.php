<div class="max-w-2xl mx-auto p-6 bg-white border-2 border-black">
    <h2 class="text-2xl font-black uppercase mb-6 border-b-2 border-black pb-2">Vérifier un Véhicule</h2>

    <div class="flex gap-2 mb-6">
        <input type="text" wire:model="search" placeholder="PLAQUE, CODE OU TÉLÉPHONE" class="flex-1 border-2 border-black p-2 uppercase focus:ring-0 focus:border-black rounded-none placeholder-gray-500">
        <button wire:click="verify" class="bg-black text-white px-6 py-2 font-bold uppercase hover:bg-gray-800 transition rounded-none">Rechercher</button>
    </div>

    @if ($vehicle)
        <div class="border-2 border-black p-4 bg-white">
            <div class="flex justify-between items-start mb-4 border-b-2 border-black pb-4">
                <div>
                    <h3 class="text-2xl font-black uppercase">{{ $vehicle->plate_number }}</h3>
                    <p class="text-black font-bold">{{ $vehicle->make }} {{ $vehicle->model }} ({{ $vehicle->year }})</p>
                </div>
                <span class="px-3 py-1 font-bold uppercase text-sm border-2 border-black {{ $vehicle->status === 'stolen' ? 'bg-black text-white' : 'bg-white text-black' }}">
                    {{ $vehicle->status === 'stolen' ? 'VOLÉ' : 'EN RÈGLE' }}
                </span>
            </div>

            <div class="grid grid-cols-2 gap-6 mb-4">
                <div>
                    <p class="text-xs font-black uppercase mb-1">Propriétaire</p>
                    <p class="font-medium uppercase">{{ $vehicle->client->user->name }}</p>
                </div>
                <div>
                    <p class="text-xs font-black uppercase mb-1">Téléphone</p>
                    <p class="font-medium font-mono">{{ $vehicle->client->user->phone }}</p>
                </div>
                <div>
                    <p class="text-xs font-black uppercase mb-1">Code Marquage</p>
                    <p class="font-medium font-mono">{{ $vehicle->marking->code ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-xs font-black uppercase mb-1">Date Marquage</p>
                    <p class="font-medium">{{ $vehicle->marking->marked_at?->format('d/m/Y') ?? 'N/A' }}</p>
                </div>
            </div>

            @if($vehicle->marking && $vehicle->marking->qr_path)
                <div class="text-center mt-6 pt-4 border-t-2 border-black">
                    <p class="text-xs font-black uppercase mb-2">QR Code</p>
                    <img src="{{ asset('storage/' . $vehicle->marking->qr_path) }}" alt="QR Code" class="w-32 h-32 mx-auto border-2 border-black">
                </div>
            @endif
        </div>
    @elseif ($search && !$vehicle)
        <div class="text-center p-8 border-2 border-black border-dashed">
            <p class="text-xl font-bold uppercase">Aucun véhicule trouvé.</p>
            <p class="text-sm mt-2">Vérifiez la plaque ou le code de marquage.</p>
        </div>
    @endif
</div>