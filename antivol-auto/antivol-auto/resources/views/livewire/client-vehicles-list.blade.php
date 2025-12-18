<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white border-2 border-black">
            <div class="p-6">
                <h2 class="text-2xl font-black uppercase mb-6 border-b-2 border-black pb-2">Mes Véhicules</h2>

                @if($vehicles->isEmpty())
                    <div class="text-center py-12 border-2 border-black border-dashed">
                        <p class="text-xl font-bold uppercase">Aucun véhicule enregistré.</p>
                    </div>
                @else
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @foreach($vehicles as $vehicle)
                            <div class="border-2 border-black p-4 hover:bg-gray-50 transition relative">
                                <div class="flex justify-between items-start mb-4 border-b-2 border-black pb-2">
                                    <h3 class="text-xl font-black uppercase">{{ $vehicle->plate_number }}</h3>
                                    <span class="px-2 py-1 text-xs font-bold uppercase border-2 border-black {{ $vehicle->status === 'registered' ? 'bg-white text-black' : 'bg-black text-white' }}">
                                        {{ $vehicle->status === 'registered' ? 'ENREGISTRÉ' : 'VOLÉ' }}
                                    </span>
                                </div>
                                <p class="text-lg font-bold uppercase">{{ $vehicle->make }} {{ $vehicle->model }}</p>
                                <p class="text-sm font-medium mb-4">{{ $vehicle->color }} - {{ $vehicle->year }}</p>

                                @if($vehicle->marking)
                                    <div class="bg-gray-100 p-3 border-2 border-black mb-4">
                                        <p class="text-xs font-black uppercase mb-1">Code Marquage</p>
                                        <p class="font-mono font-black text-lg tracking-wider">{{ $vehicle->marking->code }}</p>
                                    </div>
                                @endif

                                <div class="flex justify-end mt-4">
                                    <button class="text-sm font-bold uppercase underline hover:no-underline">Voir détails</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>