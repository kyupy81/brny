<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6">Enregistrement Véhicule - Étape {{  }}/4</h2>

    @if ( === 1)
        <div class="space-y-4">
            <h3 class="text-lg font-semibold">Informations Client</h3>
            <div>
                <label class="block text-sm font-medium">Nom Complet</label>
                <input type="text" wire:model="client_name" class="w-full border rounded p-2">
                @error('client_name') <span class="text-red-500 text-sm">{{  }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium">Téléphone</label>
                <input type="text" wire:model="client_phone" class="w-full border rounded p-2">
                @error('client_phone') <span class="text-red-500 text-sm">{{  }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium">Adresse</label>
                <input type="text" wire:model="client_address" class="w-full border rounded p-2">
                @error('client_address') <span class="text-red-500 text-sm">{{  }}</span> @enderror
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Type Pièce</label>
                    <select wire:model="client_id_type" class="w-full border rounded p-2">
                        <option value="CNI">CNI</option>
                        <option value="Passport">Passeport</option>
                        <option value="Permis">Permis</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium">Numéro Pièce</label>
                    <input type="text" wire:model="client_id_number" class="w-full border rounded p-2">
                    @error('client_id_number') <span class="text-red-500 text-sm">{{  }}</span> @enderror
                </div>
            </div>
            <button wire:click="nextStep" class="bg-blue-600 text-white px-4 py-2 rounded">Suivant</button>
        </div>
    @elseif ( === 2)
        <div class="space-y-4">
            <h3 class="text-lg font-semibold">Informations Véhicule</h3>
            <div>
                <label class="block text-sm font-medium">Plaque d'immatriculation</label>
                <input type="text" wire:model="plate_number" class="w-full border rounded p-2 uppercase">
                @error('plate_number') <span class="text-red-500 text-sm">{{  }}</span> @enderror
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Marque</label>
                    <input type="text" wire:model="make" class="w-full border rounded p-2">
                    @error('make') <span class="text-red-500 text-sm">{{  }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium">Modèle</label>
                    <input type="text" wire:model="model" class="w-full border rounded p-2">
                    @error('model') <span class="text-red-500 text-sm">{{  }}</span> @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Couleur</label>
                    <input type="text" wire:model="color" class="w-full border rounded p-2">
                    @error('color') <span class="text-red-500 text-sm">{{  }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium">Type</label>
                    <select wire:model="type" class="w-full border rounded p-2">
                        <option value="Berline">Berline</option>
                        <option value="SUV">SUV</option>
                        <option value="Moto">Moto</option>
                        <option value="Camion">Camion</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-between">
                <button wire:click="prevStep" class="bg-gray-500 text-white px-4 py-2 rounded">Précédent</button>
                <button wire:click="nextStep" class="bg-blue-600 text-white px-4 py-2 rounded">Suivant</button>
            </div>
        </div>
    @elseif ( === 3)
        <div class="space-y-4">
            <h3 class="text-lg font-semibold">Preuves (Photos)</h3>
            <div>
                <label class="block text-sm font-medium">Photo Véhicule (Global)</label>
                <input type="file" wire:model="photo_vehicle" class="w-full border rounded p-2">
                @error('photo_vehicle') <span class="text-red-500 text-sm">{{  }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium">Photo Rétroviseur (Marquage)</label>
                <input type="file" wire:model="photo_mirror" class="w-full border rounded p-2">
                @error('photo_mirror') <span class="text-red-500 text-sm">{{  }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium">Photo Pièce d'identité</label>
                <input type="file" wire:model="photo_id" class="w-full border rounded p-2">
                @error('photo_id') <span class="text-red-500 text-sm">{{  }}</span> @enderror
            </div>
            <div class="flex justify-between">
                <button wire:click="prevStep" class="bg-gray-500 text-white px-4 py-2 rounded">Précédent</button>
                <button wire:click="submit" class="bg-green-600 text-white px-4 py-2 rounded">Confirmer et Enregistrer</button>
            </div>
        </div>
    @elseif ( === 4)
        <div class="text-center space-y-6">
            <div class="text-green-600 text-xl font-bold">Enregistrement réussi !</div>
            <div class="bg-gray-100 p-4 rounded">
                <p class="text-sm text-gray-600">Code de Marquage</p>
                <p class="text-3xl font-mono font-bold">{{  }}</p>
            </div>
            <div>
                <p class="mb-2">QR Code généré :</p>
                <img src="{{ asset('storage/' . ) }}" alt="QR Code" class="mx-auto border p-2 bg-white">
            </div>
            <button onclick="window.print()" class="bg-blue-600 text-white px-4 py-2 rounded">Imprimer Fiche</button>
            <button wire:click="('step', 1)" class="bg-gray-500 text-white px-4 py-2 rounded">Nouvel Enregistrement</button>
        </div>
    @endif
</div>
