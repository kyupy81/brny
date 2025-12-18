@props(['filters', 'brands', 'communes', 'agents'])

<div class="bg-white p-4 rounded-lg shadow mb-6">
    <form method="GET" action="{{ url()->current() }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <!-- Period -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Du</label>
            <input type="date" name="from" value="{{ $filters['from'] ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Au</label>
            <input type="date" name="to" value="{{ $filters['to'] ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <!-- Commune -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Commune</label>
            <select name="commune" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Toutes</option>
                @foreach($communes as $commune)
                    <option value="{{ $commune }}" {{ ($filters['commune'] ?? '') == $commune ? 'selected' : '' }}>{{ $commune }}</option>
                @endforeach
            </select>
        </div>

        <!-- Brand -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Marque</label>
            <select name="brand" id="brand-select" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Toutes</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ ($filters['brand'] ?? '') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Model (AJAX loaded) -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Modèle</label>
            <select name="model" id="model-select" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Tous</option>
                <!-- Populated via JS -->
            </select>
        </div>

        <!-- Year -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Année</label>
            <select name="year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Toutes</option>
                @for($y = date('Y'); $y >= 1995; $y--)
                    <option value="{{ $y }}" {{ ($filters['year'] ?? '') == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>
        </div>

        <!-- Status -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Statut</label>
            <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="ALL">Tous</option>
                <option value="ACTIVE" {{ ($filters['status'] ?? '') == 'ACTIVE' ? 'selected' : '' }}>Actif</option>
                <option value="STOLEN" {{ ($filters['status'] ?? '') == 'STOLEN' ? 'selected' : '' }}>Volé</option>
                <option value="PENDING" {{ ($filters['status'] ?? '') == 'PENDING' ? 'selected' : '' }}>En attente</option>
            </select>
        </div>

        <!-- Agent -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Agent</label>
            <select name="agent" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Tous</option>
                @foreach($agents as $agent)
                    <option value="{{ $agent->id }}" {{ ($filters['agent'] ?? '') == $agent->id ? 'selected' : '' }}>{{ $agent->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Buttons -->
        <div class="md:col-span-4 flex justify-end space-x-3 mt-2">
            <a href="{{ url()->current() }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Réinitialiser
            </a>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Appliquer les filtres
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const brandSelect = document.getElementById('brand-select');
        const modelSelect = document.getElementById('model-select');
        const currentModel = "{{ $filters['model'] ?? '' }}";

        function loadModels(brandId) {
            modelSelect.innerHTML = '<option value="">Chargement...</option>';
            if (!brandId) {
                modelSelect.innerHTML = '<option value="">Tous</option>';
                return;
            }

            fetch(`/api/brands/${brandId}/models`)
                .then(response => response.json())
                .then(data => {
                    modelSelect.innerHTML = '<option value="">Tous</option>';
                    data.forEach(model => {
                        const option = document.createElement('option');
                        option.value = model.id;
                        option.textContent = model.name;
                        if (model.id == currentModel) option.selected = true;
                        modelSelect.appendChild(option);
                    });
                });
        }

        brandSelect.addEventListener('change', function() {
            loadModels(this.value);
        });

        if (brandSelect.value) {
            loadModels(brandSelect.value);
        }
    });
</script>
