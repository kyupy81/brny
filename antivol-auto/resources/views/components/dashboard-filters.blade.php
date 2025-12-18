@props(['filters', 'communes', 'brands', 'agents' => null])

<div class="bg-white p-6 rounded-lg shadow mb-6">
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
            <select name="brand_id" id="brand_select" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Toutes</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ ($filters['brand_id'] ?? '') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Model -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Modèle</label>
            <select name="model_id" id="model_select" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Tous</option>
                <!-- Populated via JS -->
            </select>
        </div>

        <!-- Year -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Année Fabrication</label>
            <select name="manufacture_year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Toutes</option>
                @for($i = date('Y'); $i >= 1995; $i--)
                    <option value="{{ $i }}" {{ ($filters['manufacture_year'] ?? '') == $i ? 'selected' : '' }}>{{ $i }}</option>
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

        <!-- Agent (Admin Only) -->
        @if($agents)
        <div>
            <label class="block text-sm font-medium text-gray-700">Agent</label>
            <select name="agent_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Tous</option>
                @foreach($agents as $agent)
                    <option value="{{ $agent->id }}" {{ ($filters['agent_id'] ?? '') == $agent->id ? 'selected' : '' }}>{{ $agent->name }}</option>
                @endforeach
            </select>
        </div>
        @endif

        <div class="md:col-span-4 flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Filtrer</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('brand_select').addEventListener('change', function() {
        const brandId = this.value;
        const modelSelect = document.getElementById('model_select');
        modelSelect.innerHTML = '<option value="">Chargement...</option>';

        if (brandId) {
            fetch(`/api/brands/${brandId}/models`)
                .then(response => response.json())
                .then(data => {
                    modelSelect.innerHTML = '<option value="">Tous</option>';
                    data.forEach(model => {
                        const selected = model.id == "{{ $filters['model_id'] ?? '' }}" ? 'selected' : '';
                        modelSelect.innerHTML += `<option value="${model.id}" ${selected}>${model.name}</option>`;
                    });
                });
        } else {
            modelSelect.innerHTML = '<option value="">Tous</option>';
        }
    });

    // Trigger change on load if brand is selected
    if (document.getElementById('brand_select').value) {
        document.getElementById('brand_select').dispatchEvent(new Event('change'));
    }
</script>