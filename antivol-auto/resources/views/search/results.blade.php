<x-guest-layout>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-black uppercase tracking-tighter mb-4">RÉSULTATS DE RECHERCHE</h1>
            <p class="text-xl font-mono">Pour : "{{ $query }}"</p>
        </div>

        <div class="mb-8">
            <form action="{{ route('search') }}" method="GET" class="flex gap-2 max-w-2xl mx-auto">
                <input type="text" name="query" value="{{ $query }}" placeholder="CODE DE MARQUAGE, PLAQUE OU VIN..." class="w-full border-2 border-black p-3 font-mono uppercase focus:outline-none focus:bg-yellow-100">
                <button type="submit" class="bg-black text-white px-6 py-3 font-bold uppercase hover:bg-gray-800">
                    CHERCHER
                </button>
            </form>
        </div>

        @if($results->isEmpty())
            <div class="text-center py-12 bg-gray-100 border-2 border-dashed border-gray-300">
                <p class="text-xl text-gray-500 font-mono">Aucun véhicule trouvé.</p>
            </div>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($results as $vehicle)
                    <div class="border-4 border-black p-6 bg-white shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-2xl font-black uppercase">{{ $vehicle->brand->name }} {{ $vehicle->model->name }}</h3>
                                <p class="font-mono text-gray-600">{{ $vehicle->plate_number }}</p>
                            </div>
                            @if($vehicle->registrations->where('status', 'STOLEN')->count() > 0)
                                <span class="bg-red-600 text-white px-3 py-1 font-bold text-sm uppercase">VOLÉÉ</span>
                            @else
                                <span class="bg-green-600 text-white px-3 py-1 font-bold text-sm uppercase">CLEAN</span>
                            @endif
                        </div>
                        
                        <div class="space-y-2 font-mono text-sm border-t-2 border-gray-100 pt-4">
                            <p><span class="font-bold">Année:</span> {{ $vehicle->manufacture_year }}</p>
                            <p><span class="font-bold">Couleur:</span> {{ $vehicle->color }}</p>
                            <p><span class="font-bold">VIN:</span> {{ Str::mask($vehicle->vin, '*', 4, -4) }}</p>
                        </div>

                        <div class="mt-6 pt-4 border-t-2 border-black">
                            <a href="#" class="block text-center bg-yellow-400 border-2 border-black py-2 font-bold uppercase hover:bg-yellow-500 transition-colors">
                                VOIR DÉTAILS
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-guest-layout>

