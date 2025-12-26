@props(['action', 'filters', 'brands', 'cities'])

<div class="bg-white p-4 rounded-lg shadow mb-6">
    <form action="{{ $action }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <!-- Search -->
        <div class="md:col-span-4">
            <label class="block text-sm font-medium text-gray-700">Recherche rapide</label>
            <input type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Plaque, téléphone, n° dossier..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <!-- Period -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Du</label>
            <input type="date" name="from" value="{{ $filters['from'] ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Au</label>
            <input type="date" name="to" value="{{ $filters['to'] ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <!-- City -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Ville</label>
            <select name="city_id" id="filter_city_select" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Toutes</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ ($filters['city_id'] ?? '') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Commune -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Commune</label>
            <select name="commune_id" id="filter_commune_select" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" {{ empty($filters['city_id']) ? 'disabled' : '' }}>
                <option value="">Toutes</option>
                <!-- Populated via JS -->
            </select>
        </div>

        <!-- Brand -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Marque</label>
            <select name="brand_id" id="brand_select" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Toutes</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ ($filters['brand_id'] ?? '') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Model -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Modèle</label>
            <select name="model_id" id="model_select" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Tous</option>
                <!-- Populated via AJAX -->
            </select>
        </div>

        <!-- Year -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Année</label>
            <select name="year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Toutes</option>
                @for($i = date('Y') + 1; $i >= 1995; $i--)
                    <option value="{{ $i }}" {{ ($filters['year'] ?? '') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <!-- Status -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Statut</label>
            <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="ALL">Tous</option>
                <option value="ACTIVE" {{ ($filters['status'] ?? '') == 'ACTIVE' ? 'selected' : '' }}>Actif</option>
                <option value="STOLEN" {{ ($filters['status'] ?? '') == 'STOLEN' ? 'selected' : '' }}>Volé</option>
                <option value="PENDING" {{ ($filters['status'] ?? '') == 'PENDING' ? 'selected' : '' }}>En attente</option>
            </select>
        </div>

        <!-- Buttons -->
        <div class="md:col-span-4 flex justify-end space-x-2 mt-2">
            <a href="{{ $action }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
                Réinitialiser
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Appliquer les filtres
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Vehicle Logic ---
        const brandSelect = document.getElementById('brand_select');
        const modelSelect = document.getElementById('model_select');
        const currentModelId = "{{ $filters['model_id'] ?? '' }}";

        function loadModels(brandId) {
            modelSelect.innerHTML = '<option value="">Chargement...</option>';
            
            if (!brandId) {
                modelSelect.innerHTML = '<option value="">Tous</option>';
                return;
            }

            fetch(/api/brands/\/models)
                .then(response => response.json())
                .then(data => {
                    modelSelect.innerHTML = '<option value="">Tous</option>';
                    data.forEach(model => {
                        const selected = model.id == currentModelId ? 'selected' : '';
                        modelSelect.innerHTML += <option value="\" \>\</option>;
                    });
                });
        }

        brandSelect.addEventListener('change', function() {
            loadModels(this.value);
        });

        if (brandSelect.value) {
            loadModels(brandSelect.value);
        }

        // --- Location Logic ---
        const citySelect = document.getElementById('filter_city_select');
        const communeSelect = document.getElementById('filter_commune_select');
        const currentCommuneId = "{{ $filters['commune_id'] ?? '' }}";

        function loadCommunes(cityId) {
            communeSelect.innerHTML = '<option value="">Chargement...</option>';
            communeSelect.disabled = true;

            if (!cityId) {
                communeSelect.innerHTML = '<option value="">Toutes</option>';
                return;
            }

            fetch(/api/cities/\/communes)
                .then(response => response.json())
                .then(data => {
                    communeSelect.innerHTML = '<option value="">Toutes</option>';
                    data.forEach(commune => {
                        const selected = commune.id == currentCommuneId ? 'selected' : '';
                        communeSelect.innerHTML += <option value="\" \>\</option>;
                    });
                    communeSelect.disabled = false;
                });
        }

        citySelect.addEventListener('change', function() {
            loadCommunes(this.value);
        });

        if (citySelect.value) {
            loadCommunes(citySelect.value);
        }
    });
</script>
