@extends("layouts.app")

@section("content")
<div class="min-h-screen bg-gray-900 text-white font-sans">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500">
                    Historique des Enregistrements
                </h1>
                <p class="text-gray-400 mt-1">Gérez et consultez tous vos dossiers</p>
            </div>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="{{ route("agent.registrations.export", request()->all()) }}" 
                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-gray-700 rounded-xl text-gray-300 hover:bg-gray-700 hover:text-white transition-colors shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Exporter CSV
                </a>
                <a href="{{ route("agent.registrations.new") }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-lg transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Nouveau
                </a>
            </div>
        </div>

        <!-- Filters (Placeholder for now, assuming component needs update or we style around it) -->
        <div class="bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-700 mb-8">
            <x-agent-filters
                :action="route(\"agent.registrations.index\")"
                :filters="$filters"
                :brands="$brands"
                :communes="$cities" 
            />
        </div>

        <!-- Table -->
        <div class="bg-gray-800 rounded-2xl shadow-lg border border-gray-700 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-700/50 text-gray-400 text-xs uppercase">
                        <tr>
                            <th class="px-6 py-4">Date</th>
                            <th class="px-6 py-4">Propriétaire</th>
                            <th class="px-6 py-4">Véhicule</th>
                            <th class="px-6 py-4">Statut</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($registrations as $reg)
                        <tr class="hover:bg-gray-700/30 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-300">
                                {{ $reg->created_at->format("d/m/Y H:i") }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-white">{{ $reg->owner->first_name ?? "N/A" }} {{ $reg->owner->last_name ?? "" }}</div>
                                <div class="text-xs text-gray-500">{{ $reg->owner->phone ?? "" }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-300">{{ $reg->vehicle->brand->name ?? "N/A" }} {{ $reg->vehicle->model->name ?? "" }}</div>
                                <div class="text-xs text-gray-500">{{ $reg->plate_number }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $statusColors = [
                                        "ACTIVE" => "bg-green-500/20 text-green-400",
                                        "PENDING" => "bg-yellow-500/20 text-yellow-400",
                                        "STOLEN" => "bg-red-500/20 text-red-400",
                                    ];
                                    $colorClass = $statusColors[$reg->status] ?? "bg-gray-500/20 text-gray-400";
                                @endphp
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium {{ $colorClass }}">
                                    {{ $reg->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium space-x-3">
                                <a href="{{ route('agent.registrations.pdf', $reg) }}" class="text-blue-400 hover:text-blue-300" target="_blank">Reçu PDF</a>
                                <a href="#" class="text-red-400 hover:text-red-300">Déclarer Vol</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                Aucun enregistrement trouvé.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-700">
                {{ $registrations->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


