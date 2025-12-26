<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Opérations") }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-admin-filters :filters="$filters" :brands="$brands" :communes="$communes" :agents="$agents" />

            <!-- Registrations Table -->
            <div class="bg-bg-surface shadow overflow-hidden sm:rounded-lg mb-8">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-text-primary">Derniers Enregistrements</h3>
                </div>
                <div class="border-t border-border-divider overflow-x-auto">
                    <table class="min-w-full divide-y divide-border-divider">
                        <thead class="bg-bg-elevated">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Plaque</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Véhicule</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Propriétaire</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Agent</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Statut</th>
                            </tr>
                        </thead>
                        <tbody class="bg-bg-surface divide-y divide-border-divider">
                            @foreach($registrations as $reg)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary">{{ $reg->created_at->format("d/m/Y") }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-text-primary">{{ $reg->vehicle->plate_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary">{{ $reg->vehicle->brand->name }} {{ $reg->vehicle->model->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary">{{ $reg->owner->first_name }} {{ $reg->owner->last_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary">{{ $reg->creator->name ?? "N/A" }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $reg->status === "ACTIVE" ? "bg-success/20 text-success" : "" }}
                                        {{ $reg->status === "STOLEN" ? "bg-danger/20 text-danger" : "" }}
                                        {{ $reg->status === "PENDING" ? "bg-warning/20 text-warning" : "" }}">
                                        {{ $reg->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Thefts Table -->
            <div class="bg-bg-surface shadow overflow-hidden sm:rounded-lg mb-8">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-text-primary">Derniers Vols Signalés</h3>
                </div>
                <div class="border-t border-border-divider overflow-x-auto">
                    <table class="min-w-full divide-y divide-border-divider">
                        <thead class="bg-bg-elevated">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Date Signalement</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Plaque</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Lieu</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Statut</th>
                            </tr>
                        </thead>
                        <tbody class="bg-bg-surface divide-y divide-border-divider">
                            @foreach($thefts as $theft)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary">{{ $theft->reported_at->format("d/m/Y H:i") }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-text-primary">{{ $theft->registration->vehicle->plate_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary">{{ $theft->location }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $theft->status === "RESOLVED" ? "bg-success/20 text-success" : "bg-danger/20 text-danger" }}">
                                        {{ $theft->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Duplicates Table -->
            @if($duplicates->count() > 0)
            <div class="bg-bg-surface shadow overflow-hidden sm:rounded-lg mb-8">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-danger">Doublons Potentiels (Plaques)</h3>
                </div>
                <div class="border-t border-border-divider overflow-x-auto">
                    <table class="min-w-full divide-y divide-border-divider">
                        <thead class="bg-bg-elevated">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Plaque</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Nombre d occurrences</th>
                            </tr>
                        </thead>
                        <tbody class="bg-bg-surface divide-y divide-border-divider">
                            @foreach($duplicates as $dup)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-text-primary">{{ $dup->plate_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-danger font-bold">{{ $dup->count }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            <!-- Agent Performance -->
            <div class="bg-bg-surface shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-text-primary">Performance des Agents (Top 10)</h3>
                </div>
                <div class="border-t border-border-divider overflow-x-auto">
                    <table class="min-w-full divide-y divide-border-divider">
                        <thead class="bg-bg-elevated">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Agent</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Total Enregistrements</th>
                            </tr>
                        </thead>
                        <tbody class="bg-bg-surface divide-y divide-border-divider">
                            @foreach($agentPerformance as $perf)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-text-primary">{{ $perf->creator->name ?? "Inconnu" }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-primary font-bold">{{ $perf->total_registrations }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
