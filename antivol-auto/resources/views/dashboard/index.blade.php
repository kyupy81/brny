<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de Bord Agent') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Filters -->
            <x-dashboard-filters :filters="$filters" :communes="$communes" :brands="$brands" />

            <!-- KPIs -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-500 text-sm uppercase">Enregistrements</div>
                    <div class="text-3xl font-bold">{{ $kpis['total_registrations'] }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-500 text-sm uppercase">Volés</div>
                    <div class="text-3xl font-bold text-red-600">{{ $kpis['total_stolen'] }}</div>
                    <div class="text-xs text-gray-400">{{ $kpis['stolen_rate'] }}%</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-500 text-sm uppercase">Propriétaires</div>
                    <div class="text-3xl font-bold">{{ $kpis['total_owners'] }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-500 text-sm uppercase">Top Commune</div>
                    <div class="text-xl font-bold truncate" title="{{ $kpis['top_commune'] }}">{{ $kpis['top_commune'] }}</div>
                    <div class="text-xs text-gray-400">{{ $kpis['top_commune_count'] }} dossiers</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-500 text-sm uppercase">Top Marque</div>
                    <div class="text-xl font-bold truncate" title="{{ $kpis['top_brand'] }}">{{ $kpis['top_brand'] }}</div>
                    <div class="text-xs text-gray-400">{{ $kpis['top_brand_count'] }} dossiers</div>
                </div>
            </div>

            <!-- Charts Row 1 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Time Series -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Évolution des Enregistrements</h3>
                    <canvas id="timeSeriesChart"></canvas>
                </div>

                <!-- Top Communes -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Top 10 Communes</h3>
                    <canvas id="communeChart"></canvas>
                </div>
            </div>

            <!-- Charts Row 2 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Top Brands -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Top 10 Marques</h3>
                    <canvas id="brandChart"></canvas>
                </div>

                <!-- Top Models -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Top 10 Modèles</h3>
                    <canvas id="modelChart"></canvas>
                </div>
            </div>

            <!-- Tables Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Commune Table -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 font-bold">Détail par Commune</div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left">Nom</th>
                                    <th class="px-4 py-2 text-right">Total</th>
                                    <th class="px-4 py-2 text-right">Volés</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($statsByCommune as $stat)
                                <tr>
                                    <td class="px-4 py-2">{{ $stat->commune }}</td>
                                    <td class="px-4 py-2 text-right">{{ $stat->total }}</td>
                                    <td class="px-4 py-2 text-right text-red-600">{{ $stat->stolen_count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Brand Table -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 font-bold">Détail par Marque</div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left">Nom</th>
                                    <th class="px-4 py-2 text-right">Total</th>
                                    <th class="px-4 py-2 text-right">Volés</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($statsByBrand as $stat)
                                <tr>
                                    <td class="px-4 py-2">{{ $stat->name }}</td>
                                    <td class="px-4 py-2 text-right">{{ $stat->total }}</td>
                                    <td class="px-4 py-2 text-right text-red-600">{{ $stat->stolen_count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Model Table -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 font-bold">Détail par Modèle</div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left">Nom</th>
                                    <th class="px-4 py-2 text-right">Total</th>
                                    <th class="px-4 py-2 text-right">Volés</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($statsByModel as $stat)
                                <tr>
                                    <td class="px-4 py-2">{{ $stat->name }}</td>
                                    <td class="px-4 py-2 text-right">{{ $stat->total }}</td>
                                    <td class="px-4 py-2 text-right text-red-600">{{ $stat->stolen_count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Time Series Chart
        new Chart(document.getElementById('timeSeriesChart'), {
            type: 'line',
            data: {
                labels: @json($timeSeries->pluck('date')),
                datasets: [{
                    label: 'Enregistrements',
                    data: @json($timeSeries->pluck('total')),
                    borderColor: 'rgb(79, 70, 229)',
                    tension: 0.1
                }]
            }
        });

        // Commune Chart
        new Chart(document.getElementById('communeChart'), {
            type: 'bar',
            data: {
                labels: @json($statsByCommune->pluck('commune')),
                datasets: [{
                    label: 'Total',
                    data: @json($statsByCommune->pluck('total')),
                    backgroundColor: 'rgba(79, 70, 229, 0.5)'
                }, {
                    label: 'Volés',
                    data: @json($statsByCommune->pluck('stolen_count')),
                    backgroundColor: 'rgba(220, 38, 38, 0.5)'
                }]
            }
        });

        // Brand Chart
        new Chart(document.getElementById('brandChart'), {
            type: 'doughnut',
            data: {
                labels: @json($statsByBrand->pluck('name')),
                datasets: [{
                    data: @json($statsByBrand->pluck('total')),
                    backgroundColor: [
                        '#4F46E5', '#EF4444', '#10B981', '#F59E0B', '#6366F1',
                        '#EC4899', '#8B5CF6', '#14B8A6', '#F97316', '#64748B'
                    ]
                }]
            }
        });

        // Model Chart
        new Chart(document.getElementById('modelChart'), {
            type: 'bar',
            data: {
                labels: @json($statsByModel->pluck('name')),
                datasets: [{
                    label: 'Total',
                    data: @json($statsByModel->pluck('total')),
                    backgroundColor: 'rgba(16, 185, 129, 0.5)'
                }]
            },
            options: {
                indexAxis: 'y',
            }
        });
    </script>
</x-app-layout>