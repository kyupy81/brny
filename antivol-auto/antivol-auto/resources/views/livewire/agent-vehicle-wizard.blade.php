<div class="max-w-4xl mx-auto p-6 bg-white border-2 border-black">
    <h2 class="text-2xl font-black uppercase mb-6 border-b-2 border-black pb-2">Enregistrement Véhicule - Étape {{ $step }}/4</h2>

    @if ($step === 1)
        <div class="space-y-4">
            <h3 class="text-lg font-bold uppercase">Informations Client</h3>
            <div>
                <label class="block text-sm font-bold uppercase mb-1">Nom Complet</label>
                <input type="text" wire:model="client_name" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                @error('client_name') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-bold uppercase mb-1">Téléphone</label>
                <input type="text" wire:model="client_phone" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                @error('client_phone') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-bold uppercase mb-1">Adresse</label>
                <input type="text" wire:model="client_address" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                @error('client_address') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold uppercase mb-1">Type Pièce</label>
                    <select wire:model="client_id_type" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                        <option value="CNI">CNI</option>
                        <option value="Passport">Passeport</option>
                        <option value="Permis">Permis</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold uppercase mb-1">Numéro Pièce</label>
                    <input type="text" wire:model="client_id_number" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                    @error('client_id_number') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button wire:click="nextStep" class="bg-black text-white px-6 py-3 font-bold uppercase hover:bg-gray-800 transition">Suivant</button>
            </div>
        </div>
    @elseif ($step === 2)
        <div class="space-y-4">
            <h3 class="text-lg font-bold uppercase">Informations Véhicule</h3>
            <div>
                <label class="block text-sm font-bold uppercase mb-1">Plaque d'immatriculation</label>
                <input type="text" wire:model="plate_number" class="w-full border-2 border-black p-2 uppercase focus:ring-0 focus:border-black rounded-none">
                @error('plate_number') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold uppercase mb-1">Marque</label>
                    <input type="text" wire:model="make" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                    @error('make') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold uppercase mb-1">Modèle</label>
                    <input type="text" wire:model="model" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                    @error('model') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold uppercase mb-1">Couleur</label>
                    <input type="text" wire:model="color" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                    @error('color') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold uppercase mb-1">Type</label>
                    <select wire:model="type" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                        <option value="Berline">Berline</option>
                        <option value="SUV">SUV</option>
                        <option value="Moto">Moto</option>
                        <option value="Camion">Camion</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-between mt-6">
                <button wire:click="prevStep" class="bg-white border-2 border-black text-black px-6 py-3 font-bold uppercase hover:bg-black hover:text-white transition">Précédent</button>
                <button wire:click="nextStep" class="bg-black text-white px-6 py-3 font-bold uppercase hover:bg-gray-800 transition">Suivant</button>
            </div>
        </div>
    @elseif ($step === 3)
        <div class="space-y-4">
            <h3 class="text-lg font-bold uppercase">Preuves (Photos)</h3>
            <div>
                <label class="block text-sm font-bold uppercase mb-1">Photo Véhicule (Global)</label>
                <input type="file" wire:model="photo_vehicle" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                @error('photo_vehicle') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-bold uppercase mb-1">Photo Rétroviseur (Marquage)</label>
                <input type="file" wire:model="photo_mirror" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                @error('photo_mirror') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-bold uppercase mb-1">Photo Pièce d'identité</label>
                <input type="file" wire:model="photo_id" class="w-full border-2 border-black p-2 focus:ring-0 focus:border-black rounded-none">
                @error('photo_id') <span class="text-red-600 font-bold text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-between mt-6">
                <button wire:click="prevStep" class="bg-white border-2 border-black text-black px-6 py-3 font-bold uppercase hover:bg-black hover:text-white transition">Précédent</button>
                <button wire:click="submit" class="bg-black text-white px-6 py-3 font-bold uppercase hover:bg-gray-800 transition">Confirmer et Enregistrer</button>
            </div>
        </div>
    @elseif ($step === 4)
        <div class="text-center space-y-6">
            <div class="text-6xl mb-4"></div>
            <h3 class="text-2xl font-black uppercase">Enregistrement Réussi !</h3>
            <p class="text-lg">Le véhicule a été enregistré avec succès.</p>
            
            <div class="bg-gray-100 p-6 border-2 border-black inline-block">
                <p class="font-bold uppercase mb-2">Code AntiVol</p>
                <p class="text-4xl font-mono font-black tracking-widest">{{ $generated_code }}</p>
            </div>

            <div class="mt-4">
                <p class="font-bold uppercase mb-2">QR Code</p>
                <img src="{{ asset('storage/' . $qr_path) }}" alt="QR Code" class="mx-auto border-2 border-black w-48 h-48">
            </div>

            <div class="mt-8">
                <button wire:click="$set('step', 1)" class="bg-black text-white px-8 py-4 font-bold uppercase hover:bg-gray-800 transition">Nouvel Enregistrement</button>
            </div>
        </div>
    @endif
</div>