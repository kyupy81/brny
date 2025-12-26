<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Tableau de bord Administrateur") }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Filters -->
            <x-admin-filters :filters="$filters" :brands="$brands" :communes="$communes" :agents="$agents" />

            <!-- KPIs -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="bg-bg-surface overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-text-secondary truncate">Enregistrements</dt>
                                    <dd class="text-lg font-medium text-text-primary">{{ $kpis["total_registrations"] }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-bg-surface overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-text-secondary truncate">Vols Signalés</dt>
                                    <dd class="text-lg font-medium text-text-primary">{{ $kpis["total_thefts"] }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-bg-surface overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-text-secondary truncate">Taux de Recouvrement</dt>
                                    <dd class="text-lg font-medium text-text-primary">{{ $kpis["recovery_rate"] }}%</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-bg-surface overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-text-secondary truncate">Agents Actifs</dt>
                                    <dd class="text-lg font-medium text-text-primary">{{ $kpis["active_agents"] }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row 1 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <div class="bg-bg-surface p-6 rounded-lg shadow">
                    <h3 class="text-lg font-medium text-text-primary mb-4">Enregistrements par jour</h3>
                    <canvas id="registrationsChart"></canvas>
                </div>
                <div class="bg-bg-surface p-6 rounded-lg shadow">
                    <h3 class="text-lg font-medium text-text-primary mb-4">Top Marques</h3>
                    <canvas id="brandsChart"></canvas>
                </div>
            </div>

        </div>
    </div>

    @push("scripts")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const registrationsCtx = document.getElementById("registrationsChart").getContext("2d");
        new Chart(registrationsCtx, {
            type: "line",
            data: {
                labels: @json($charts["registrations_trend"]["labels"]),
                datasets: [{
                    label: "Enregistrements",
                    data: @json($charts["registrations_trend"]["data"]),
                    borderColor: "#6366f1",
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: "#9ca3af" }
                    },
                    x: {
                        ticks: { color: "#9ca3af" }
                    }
                },
                plugins: {
                    legend: { labels: { color: "#9ca3af" } }
                }
            }
        });

        const brandsCtx = document.getElementById("brandsChart").getContext("2d");
        new Chart(brandsCtx, {
            type: "doughnut",
            data: {
                labels: @json($charts["top_brands"]["labels"]),
                datasets: [{
                    data: @json($charts["top_brands"]["data"]),
                    backgroundColor: [
                        "#6366f1", "#ef4444", "#10b981", "#f59e0b", "#8b5cf6"
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { 
                        position: "right",
                        labels: { color: "#9ca3af" } 
                    }
                }
            }
        });
    </script>
    @endpush
</x-admin-layout>
