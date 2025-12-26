<div class="min-h-screen bg-background text-text-primary p-4 pb-24">
    
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-extrabold tracking-tight">Nouveau Dossier</h1>
        <div class="text-sm font-bold text-accent">
            ÉTAPE {{ $step }}/4
        </div>
    </div>

    <!-- Progress Bar -->
    <div class="w-full bg-elevated h-2 rounded-full mb-8 overflow-hidden">
        <div class="bg-accent h-full transition-all duration-500 ease-out" style="width: {{ ($step / 4) * 100 }}%"></div>
    </div>

    @if ($step === 1)
        <!-- Step 1: Owner Info -->
        <div class="space-y-6 animate-fade-in">
            <div class="card">
                <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Propriétaire
                </h2>
                
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-bold text-text-secondary uppercase tracking-wider ml-1">Prénom</label>
                            <input type="text" wire:model="first_name" class="input-field" placeholder="Jean">
                            @error('first_name') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-xs font-bold text-text-secondary uppercase tracking-wider ml-1">Nom</label>
                            <input type="text" wire:model="last_name" class="input-field" placeholder="Dupont">
                            @error('last_name') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="text-xs font-bold text-text-secondary uppercase tracking-wider ml-1">Téléphone</label>
                        <input type="tel" wire:model="phone" class="input-field" placeholder="0700000000">
                        @error('phone') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="text-xs font-bold text-text-secondary uppercase tracking-wider ml-1">Adresse</label>
                        <input type="text" wire:model="address" class="input-field" placeholder="Av. de la Paix, N° 10">
                        @error('address') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-bold text-text-secondary uppercase tracking-wider ml-1">Commune</label>
                            <input type="text" wire:model="commune" class="input-field" placeholder="Gombe">
                            @error('commune') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-xs font-bold text-text-secondary uppercase tracking-wider ml-1">Quartier</label>
                            <input type="text" wire:model="quartier" class="input-field" placeholder="Socimat">
                            @error('quartier') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <button wire:click="nextStep" class="btn-primary w-full flex items-center justify-center gap-2 py-4 text-lg shadow-soft-md">
                <span>Suivant</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>

    @elseif ($step === 2)
        <!-- Step 2: Vehicle Info -->
        <div class="space-y-6 animate-fade-in">
            <div class="card">
                <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    Véhicule
                </h2>

                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-bold text-text-secondary uppercase tracking-wider ml-1">Plaque d'immatriculation</label>
                        <input type="text" wire:model="plate_number" class="input-field font-mono uppercase text-lg tracking-widest" placeholder="0000AA00">
                        @error('plate_number') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-bold text-text-secondary uppercase tracking-wider ml-1">Marque</label>
                            <select wire:model.live="brand_id" class="input-field appearance-none">
                                <option value="">Choisir...</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-xs font-bold text-text-secondary uppercase tracking-wider ml-1">Modèle</label>
                            <select wire:model="model_id" class="input-field appearance-none" {{ empty($models) ? 'disabled' : '' }}>
                                <option value="">Choisir...</option>
                                @foreach($models as $model)
                                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                                @endforeach
                            </select>
                            @error('model_id') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-bold text-text-secondary uppercase tracking-wider ml-1">Année</label>
                            <input type="number" wire:model="manufacture_year" class="input-field" placeholder="2020">
                            @error('manufacture_year') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-xs font-bold text-text-secondary uppercase tracking-wider ml-1">Couleur</label>
                            <input type="text" wire:model="color" class="input-field" placeholder="Noir">
                            @error('color') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="text-xs font-bold text-text-secondary uppercase tracking-wider ml-1">Numéro de Châssis (VIN)</label>
                        <input type="text" wire:model="vin" class="input-field font-mono uppercase" placeholder="XXXXXXXXXXXXXXXXX">
                        @error('vin') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="flex gap-4">
                <button wire:click="previousStep" class="btn-secondary flex-1 py-4">Retour</button>
                <button wire:click="nextStep" class="btn-primary flex-1 py-4">Suivant</button>
            </div>
        </div>

    @elseif ($step === 3)
        <!-- Step 3: Photos -->
        <div class="space-y-6 animate-fade-in">
            <div class="card">
                <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Photos
                </h2>

                <div class="space-y-6">
                    <!-- Plate Photo -->
                    <div>
                        <label class="block text-sm font-bold mb-2">Photo de la Plaque</label>
                        <div class="border-2 border-dashed border-surface-border rounded-xl p-6 text-center hover:border-accent transition-colors relative group">
                            @if ($photo_plate)
                                <img src="{{ $photo_plate->temporaryUrl() }}" class="w-full h-48 object-cover rounded-lg mb-2">
                                <button wire:click="$set('photo_plate', null)" class="absolute top-2 right-2 bg-danger text-white p-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            @else
                                <div class="flex flex-col items-center justify-center h-32 text-text-secondary">
                                    <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    <span class="text-sm">Appuyer pour prendre une photo</span>
                                </div>
                            @endif
                            <input type="file" wire:model="photo_plate" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" capture="environment">
                        </div>
                        @error('photo_plate') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Engraving Photo -->
                    <div>
                        <label class="block text-sm font-bold mb-2">Photo du Gravage (Rétroviseur)</label>
                        <div class="border-2 border-dashed border-surface-border rounded-xl p-6 text-center hover:border-accent transition-colors relative group">
                            @if ($photo_engraving)
                                <img src="{{ $photo_engraving->temporaryUrl() }}" class="w-full h-48 object-cover rounded-lg mb-2">
                                <button wire:click="$set('photo_engraving', null)" class="absolute top-2 right-2 bg-danger text-white p-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            @else
                                <div class="flex flex-col items-center justify-center h-32 text-text-secondary">
                                    <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    <span class="text-sm">Appuyer pour prendre une photo</span>
                                </div>
                            @endif
                            <input type="file" wire:model="photo_engraving" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" capture="environment">
                        </div>
                        @error('photo_engraving') <span class="text-danger text-xs ml-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="flex gap-4">
                <button wire:click="previousStep" class="btn-secondary flex-1 py-4">Retour</button>
                <button wire:click="submit" class="btn-primary flex-1 py-4 flex items-center justify-center gap-2">
                    <span wire:loading.remove>Terminer</span>
                    <span wire:loading>Traitement...</span>
                </button>
            </div>
        </div>

    @elseif ($step === 4)
        <!-- Step 4: Success -->
        <div class="flex flex-col items-center justify-center min-h-[60vh] animate-fade-in text-center">
            <div class="w-24 h-24 bg-success/20 rounded-full flex items-center justify-center mb-6 animate-bounce-slow">
                <svg class="w-12 h-12 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            
            <h2 class="text-3xl font-extrabold mb-2">Succès !</h2>
            <p class="text-text-secondary mb-8">Le véhicule a été enregistré et marqué.</p>

            <div class="card w-full mb-8">
                <div class="text-sm text-text-secondary uppercase tracking-wider mb-1">Code de Marquage</div>
                <div class="text-3xl font-mono font-bold text-accent tracking-widest">{{ $markingCode }}</div>
            </div>

            <a href="{{ route('agent.dashboard') }}" class="btn-primary w-full py-4">
                Retour au Tableau de Bord
            </a>
        </div>
    @endif

</div>
