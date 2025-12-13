<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-6">Mes Véhicules</h2>

                @if(->isEmpty())
                    <div class="text-center py-8 text-gray-500">
                        Aucun véhicule enregistré pour le moment.
                    </div>
                @else
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @foreach( as )
                            <div class="border rounded-lg p-4 shadow-sm hover:shadow-md transition">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="text-xl font-bold text-blue-600">{{ ->plate_number }}</h3>
                                    <span class="px-2 py-1 text-xs rounded {{ ->status === 'registered' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst(->status) }}
                                    </span>
                                </div>
                                <p class="text-gray-700 font-medium">{{ ->make }} {{ ->model }}</p>
                                <p class="text-sm text-gray-500 mb-4">{{ ->color }} - {{ ->year }}</p>

                                @if(->marking)
                                    <div class="bg-gray-50 p-3 rounded mb-4">
                                        <p class="text-xs text-gray-500 uppercase">Code Marquage</p>
                                        <p class="font-mono font-bold">{{ ->marking->code }}</p>
                                    </div>
                                @endif

                                <div class="flex justify-end">
                                    <a href="#" class="text-sm text-blue-600 hover:underline">Voir détails</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
