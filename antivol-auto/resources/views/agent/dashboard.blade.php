@extends("layouts.app")

@section("content")
<div class="min-h-screen bg-gray-900 text-white font-sans">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500">
                    Espace Agent
                </h1>
                <p class="text-gray-400 mt-1">Bienvenue, {{ Auth::user()->name }}</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route("agent.registrations.new") }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white font-semibold rounded-xl shadow-lg transform transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Nouvel Enregistrement
                </a>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total -->
            <div class="bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-700 relative overflow-hidden group hover:border-blue-500 transition-colors">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-500 rounded-full opacity-10 blur-xl group-hover:opacity-20 transition-opacity"></div>
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm font-medium">Total Enregistrements</p>
                        <h3 class="text-3xl font-bold text-white mt-2">{{ $stats["total_registrations"] }}</h3>
                    </div>
                    <div class="p-3 bg-blue-500/10 rounded-lg text-blue-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Actifs -->
            <div class="bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-700 relative overflow-hidden group hover:border-green-500 transition-colors">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-green-500 rounded-full opacity-10 blur-xl group-hover:opacity-20 transition-opacity"></div>
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm font-medium">Véhicules Actifs</p>
                        <h3 class="text-3xl font-bold text-white mt-2">{{ $stats["active_registrations"] }}</h3>
                    </div>
                    <div class="p-3 bg-green-500/10 rounded-lg text-green-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Volés -->
            <div class="bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-700 relative overflow-hidden group hover:border-red-500 transition-colors">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-red-500 rounded-full opacity-10 blur-xl group-hover:opacity-20 transition-opacity"></div>
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm font-medium">Véhicules Volés</p>
                        <h3 class="text-3xl font-bold text-white mt-2">{{ $stats["stolen_vehicles"] }}</h3>
                    </div>
                    <div class="p-3 bg-red-500/10 rounded-lg text-red-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- En Attente -->
            <div class="bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-700 relative overflow-hidden group hover:border-yellow-500 transition-colors">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-yellow-500 rounded-full opacity-10 blur-xl group-hover:opacity-20 transition-opacity"></div>
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm font-medium">En Attente</p>
                        <h3 class="text-3xl font-bold text-white mt-2">{{ $stats["pending_validations"] }}</h3>
                    </div>
                    <div class="p-3 bg-yellow-500/10 rounded-lg text-yellow-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <div class="bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-700">
                <h3 class="text-lg font-semibold text-white mb-6">Évolution des Enregistrements</h3>
                <div class="relative h-64">
                    <canvas id="registrationsChart"></canvas>
                </div>
            </div>
            <div class="bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-700">
                <h3 class="text-lg font-semibold text-white mb-6">Répartition par Statut</h3>
                <div class="relative h-64 flex justify-center">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activity & Incomplete -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Recent Registrations -->
            <div class="lg:col-span-2 bg-gray-800 rounded-2xl shadow-lg border border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-700 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-white">Derniers Enregistrements</h3>
                    <a href="{{ route('agent.registrations.index') }}" class="text-sm text-blue-400 hover:text-blue-300">Voir tout</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-700/50 text-gray-400 text-xs uppercase">
                            <tr>
                                <th class="px-6 py-3">Date</th>
                                <th class="px-6 py-3">Client</th>
                                <th class="px-6 py-3">Véhicule</th>
                                <th class="px-6 py-3">Statut</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @forelse($latestRegistrations as $reg)
                            <tr class="hover:bg-gray-700/30 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-300">{{ $reg->created_at->format("d/m/Y") }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-white">
                                    {{ $reg->owner->first_name ?? "N/A" }} {{ $reg->owner->last_name ?? "" }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-300">
                                    {{ $reg->vehicle->brand->name ?? "" }} {{ $reg->vehicle->model->name ?? "" }}
                                    <br>
                                    <span class="text-xs text-gray-500">{{ $reg->plate_number }}</span>
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
                                <td class="px-6 py-4 text-sm">
                                    <a href="{{ route('agent.registrations.pdf', $reg) }}" class="text-blue-400 hover:text-blue-300" target="_blank">Reçu PDF</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    Aucun enregistrement récent.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Incomplete / Pending -->
            <div class="bg-gray-800 rounded-2xl shadow-lg border border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-700">
                    <h3 class="text-lg font-semibold text-white">À Compléter</h3>
                </div>
                <div class="divide-y divide-gray-700">
                    @forelse($incompleteRegistrations as $reg)
                    <div class="p-4 hover:bg-gray-700/30 transition-colors flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-white">
                                {{ $reg->owner->first_name ?? "N/A" }} {{ $reg->owner->last_name ?? "" }}
                            </p>
                            <p class="text-xs text-gray-400 mt-1">
                                {{ $reg->vehicle->brand->name ?? "" }} - {{ $reg->created_at->diffForHumans() }}
                            </p>
                        </div>
                        <a href="#" class="px-3 py-1 bg-yellow-500/10 text-yellow-400 text-xs rounded-lg hover:bg-yellow-500/20 transition-colors">
                            Reprendre
                        </a>
                    </div>
                    @empty
                    <div class="p-8 text-center text-gray-500 text-sm">
                        Aucun dossier en attente.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@push("scripts")
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Common Chart Options for Dark Theme
    Chart.defaults.color = "#9CA3AF";
    Chart.defaults.borderColor = "#374151";

    const ctxReg = document.getElementById("registrationsChart").getContext("2d");
    new Chart(ctxReg, {
        type: "line",
        data: {
            labels: {!! json_encode($charts["registrations_by_month"]["labels"]) !!},
            datasets: [{
                label: "Enregistrements",
                data: {!! json_encode($charts["registrations_by_month"]["data"]) !!},
                borderColor: "#60A5FA",
                backgroundColor: "rgba(96, 165, 250, 0.1)",
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: "#60A5FA",
                pointBorderColor: "#1F2937",
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [2, 4],
                        color: "#374151"
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    const ctxStatus = document.getElementById("statusChart").getContext("2d");
    new Chart(ctxStatus, {
        type: "doughnut",
        data: {
            labels: {!! json_encode($charts["vehicles_by_status"]["labels"]) !!},
            datasets: [{
                data: {!! json_encode($charts["vehicles_by_status"]["data"]) !!},
                backgroundColor: [
                    "#22C55E", // Active - Green
                    "#EF4444", // Stolen - Red
                    "#EAB308", // Pending - Yellow
                    "#6B7280"  // Other - Gray
                ],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: "bottom",
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            },
            cutout: "70%"
        }
    });
</script>
@endpush
@endsection



