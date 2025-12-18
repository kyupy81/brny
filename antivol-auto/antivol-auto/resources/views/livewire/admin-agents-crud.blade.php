<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white border-2 border-black p-6">
            <div class="flex justify-between items-center mb-6 border-b-2 border-black pb-4">
                <h2 class="text-2xl font-black uppercase">Gestion des Agents</h2>
                <button wire:click="create" class="bg-black text-white px-6 py-2 font-bold uppercase hover:bg-gray-800 transition">
                    + Nouvel Agent
                </button>
            </div>

            @if (session()->has('message'))
                <div class="bg-white border-2 border-black text-black px-4 py-3 mb-4 font-bold uppercase">
                    {{ session('message') }}
                </div>
            @endif

            @if($isOpen)
                <div class="bg-white p-6 mb-6 border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                    <h3 class="font-black uppercase text-lg mb-4 border-b-2 border-black pb-2">Ajouter / Modifier un agent</h3>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold uppercase mb-1">Nom Complet</label>
                            <input type="text" wire:model="name" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                            @error('name') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold uppercase mb-1">Email</label>
                            <input type="email" wire:model="email" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                            @error('email') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold uppercase mb-1">Téléphone</label>
                            <input type="text" wire:model="phone" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                            @error('phone') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold uppercase mb-1">Matricule</label>
                            <input type="text" wire:model="matricule" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                            @error('matricule') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold uppercase mb-1">Zone</label>
                            <input type="text" wire:model="zone" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                            @error('zone') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold uppercase mb-1">Mot de passe</label>
                            <input type="password" wire:model="password" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                            @error('password') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end gap-4">
                        <button wire:click="cancel" class="bg-white border-2 border-black text-black px-6 py-2 font-bold uppercase hover:bg-black hover:text-white transition">Annuler</button>
                        <button wire:click="store" class="bg-black text-white px-6 py-2 font-bold uppercase hover:bg-gray-800 transition">Enregistrer</button>
                    </div>
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full border-2 border-black text-left">
                    <thead class="bg-black text-white uppercase font-black">
                        <tr>
                            <th class="p-3 border-r-2 border-white">Nom</th>
                            <th class="p-3 border-r-2 border-white">Email</th>
                            <th class="p-3 border-r-2 border-white">Matricule</th>
                            <th class="p-3 border-r-2 border-white">Zone</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-2 divide-black">
                        @foreach($agents as $agent)
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 border-r-2 border-black font-bold">{{ $agent->user->name }}</td>
                                <td class="p-3 border-r-2 border-black">{{ $agent->user->email }}</td>
                                <td class="p-3 border-r-2 border-black font-mono">{{ $agent->matricule }}</td>
                                <td class="p-3 border-r-2 border-black">{{ $agent->zone }}</td>
                                <td class="p-3 flex gap-2">
                                    <button wire:click="edit({{ $agent->id }})" class="text-sm font-bold uppercase underline hover:no-underline">Modifier</button>
                                    <button wire:click="delete({{ $agent->id }})" class="text-sm font-bold uppercase text-red-600 underline hover:no-underline">Supprimer</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>