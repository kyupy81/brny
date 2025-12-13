<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Gestion des Agents</h2>
                <button wire:click="create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Nouvel Agent
                </button>
            </div>

            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('message') }}
                </div>
            @endif

            @if()
                <div class="bg-gray-50 p-4 rounded mb-6 border">
                    <h3 class="font-bold mb-4">Ajouter un agent</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">Nom Complet</label>
                            <input type="text" wire:model="name" class="w-full border rounded p-2">
                            @error('name') <span class="text-red-500 text-sm">{{  }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Email</label>
                            <input type="email" wire:model="email" class="w-full border rounded p-2">
                            @error('email') <span class="text-red-500 text-sm">{{  }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Téléphone</label>
                            <input type="text" wire:model="phone" class="w-full border rounded p-2">
                            @error('phone') <span class="text-red-500 text-sm">{{  }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Matricule</label>
                            <input type="text" wire:model="matricule" class="w-full border rounded p-2">
                            @error('matricule') <span class="text-red-500 text-sm">{{  }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Zone</label>
                            <input type="text" wire:model="zone" class="w-full border rounded p-2">
                            @error('zone') <span class="text-red-500 text-sm">{{  }}</span> @enderror
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end gap-2">
                        <button wire:click="cancel" class="bg-gray-500 text-white px-4 py-2 rounded">Annuler</button>
                        <button wire:click="store" class="bg-green-600 text-white px-4 py-2 rounded">Enregistrer</button>
                    </div>
                </div>
            @endif

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Agent</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matricule</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Zone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach( as )
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ ->user->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ ->user->email }}</div>
                                <div class="text-sm text-gray-500">{{ ->user->phone }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ ->matricule }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ ->zone }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ ->user->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst(->user->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
