<div class="min-h-screen bg-background text-text-primary p-4 pb-24">
    
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-extrabold tracking-tight">Mode Terrain</h1>
            <p class="text-text-secondary text-sm">Vérification & Contrôle</p>
        </div>
        <div class="w-10 h-10 rounded-full bg-elevated border border-card-border flex items-center justify-center">
            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        </div>
    </div>

    <!-- Search Section -->
    <div class="mb-8 relative z-20">
        <div class="relative">
            <input 
                type="text" 
                wire:model.live.debounce.300ms="search" 
                placeholder="PLAQUE, CODE, TÉL..." 
                class="w-full bg-elevated border-2 border-accent/30 text-text-primary rounded-2xl px-5 py-4 pl-12 text-lg font-mono uppercase tracking-wider focus:border-accent focus:ring-4 focus:ring-accent/10 transition-all outline-none shadow-soft-md placeholder-text-muted"
            >
            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-accent">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            
            <!-- Loading Indicator -->
            <div wire:loading class="absolute right-4 top-1/2 -translate-y-1/2">
                <svg class="animate-spin h-5 w-5 text-accent" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Search Results -->
    @if(strlen($search) >= 2)
        <div class="mb-8 space-y-4">
            <h3 class="text-sm font-bold text-text-secondary uppercase tracking-wider mb-2">Résultats ({{ count($results) }})</h3>
            
            @forelse($results as $vehicle)
                <div class="card relative overflow-hidden group hover:border-accent/50 transition-all">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <div class="font-mono text-xl font-bold text-text-primary tracking-wide">{{ $vehicle->plate_number }}</div>
                            <div class="text-sm text-text-secondary">{{ $vehicle->brand->name ?? '' }} {{ $vehicle->model->name ?? '' }}</div>
                        </div>
                        @if($vehicle->theftReports->where('status', 'active')->count() > 0)
                            <span class="bg-danger text-background font-bold px-3 py-1 rounded-full text-xs shadow-lg shadow-danger/20 animate-pulse">
                                VOLÉ
                            </span>
                        @else
                            <span class="bg-success text-background font-bold px-3 py-1 rounded-full text-xs shadow-lg shadow-success/20">
                                CLEAN
                            </span>
                        @endif
                    </div>
                    
                    <div class="grid grid-cols-2 gap-2 text-sm mb-4">
                        <div class="bg-background/50 p-2 rounded-lg">
                            <div class="text-xs text-text-muted mb-1">Propriétaire</div>
                            <div class="font-medium truncate">{{ $vehicle->owner->name ?? 'N/A' }}</div>
                        </div>
                        <div class="bg-background/50 p-2 rounded-lg">
                            <div class="text-xs text-text-muted mb-1">Marquage</div>
                            <div class="font-mono text-accent truncate">{{ $vehicle->marking->code ?? 'NON MARQUÉ' }}</div>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 bg-elevated hover:bg-card-border text-text-primary py-2 rounded-lg text-sm font-medium transition-colors border border-card-border">
                            Détails
                        </button>
                        <button class="flex-1 bg-danger/10 hover:bg-danger/20 text-danger py-2 rounded-lg text-sm font-medium transition-colors border border-danger/20">
                            Signaler
                        </button>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-text-muted">
                    <p>Aucun véhicule trouvé pour "{{ $search }}"</p>
                </div>
            @endforelse
        </div>
    @endif

    <!-- Quick Actions -->
    <div class="mb-8">
        <a href="{{ route('agent.registrations.new') }}" class="w-full bg-accent text-background font-extrabold text-lg py-4 rounded-2xl shadow-soft-md hover:shadow-accent/30 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
            NOUVEAU DOSSIER
        </a>
    </div>

    <!-- Recent Files -->
    <div>
        <h3 class="text-sm font-bold text-text-secondary uppercase tracking-wider mb-4">Derniers dossiers</h3>
        <div class="space-y-3">
            @foreach($recentFiles as $file)
                <div class="bg-surface border border-card-border rounded-xl p-3 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-elevated flex items-center justify-center text-text-muted font-mono font-bold text-xs">
                        {{ substr($file->plate_number, 0, 2) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-bold text-text-primary truncate">{{ $file->plate_number }}</div>
                        <div class="text-xs text-text-secondary truncate">{{ $file->brand->name ?? '' }} - {{ $file->owner->name ?? 'N/A' }}</div>
                    </div>
                    <div class="text-xs text-text-muted">
                        {{ $file->created_at->format('d/m') }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bottom Nav Placeholder (Fixed) -->
    <div class="fixed bottom-0 left-0 w-full bg-surface/90 backdrop-blur-md border-t border-card-border p-2 pb-4 flex justify-around items-center z-50">
        <a href="{{ route('agent.field') }}" class="p-2 text-accent flex flex-col items-center gap-1">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <span class="text-[10px] font-bold">TERRAIN</span>
        </a>
        <a href="#" class="p-2 text-text-muted hover:text-text-primary flex flex-col items-center gap-1">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            <span class="text-[10px] font-bold">DOSSIERS</span>
        </a>
        <a href="#" class="p-2 text-text-muted hover:text-text-primary flex flex-col items-center gap-1">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            <span class="text-[10px] font-bold">PROFIL</span>
        </a>
    </div>

</div>
