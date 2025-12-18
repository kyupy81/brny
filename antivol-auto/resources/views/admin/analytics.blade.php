<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Analytique') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-admin-filters :filters="$filters" :brands="$brands" :communes="$communes" :agents="$agents" />

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Vols par jour</h3>
                    <canvas id="theftsChart"></canvas>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Top Marques</h3>
                    <canvas id="brandsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Thefts Chart
            const theftsCtx = document.getElementById('theftsChart').getContext('2d');
            new Chart(theftsCtx, {
                type: 'line',
                data: {
                    labels: @json($charts['thefts_trend']->pluck('date')),
                    datasets: [{
                        label: 'Vols Déclarés',
                        data: @json($charts['thefts_trend']->pluck('count')),
                        borderColor: 'rgb(239, 68, 68)',
                        tension: 0.1
                    }]
                }
            });

            // Brands Chart
            const brandsCtx = document.getElementById('brandsChart').getContext('2d');
            new Chart(brandsCtx, {
                type: 'bar',
                data: {
                    labels: @json($charts['top_brands']->pluck('name')),
                    datasets: [{
                        label: 'Enregistrements',
                        data: @json($charts['top_brands']->pluck('count')),
                        backgroundColor: 'rgba(16, 185, 129, 0.5)',
                        borderColor: 'rgb(16, 185, 129)',
                        borderWidth: 1
                    }]
                }
            });
        });
    </script>
</x-admin-layout>
