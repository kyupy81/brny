@extends('layouts.app')

@section('content')
<div x-data="supportManager()" class="min-h-screen p-4 md:p-8" style="background-color: var(--bg-primary); color: var(--text-primary);">
    
    <!-- Header -->
    <div class="max-w-7xl mx-auto mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold tracking-tight">Support Technique</h1>
            <p class="mt-1 text-sm opacity-70">Gestion des comptes et sécurité</p>
        </div>
        <div class="flex gap-2">
            <button @click="window.location.reload()" class="p-2 rounded-lg hover:bg-opacity-10 hover:bg-white transition-colors" style="border: 1px solid var(--border-default);">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/><path d="M16 16h5v5"/></svg>
            </button>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto">
        
        <!-- Mobile View (Cards) -->
        <div class="md:hidden space-y-4">
            @foreach($users as $user)
            <div class="p-4 rounded-xl shadow-sm transition-all duration-300 {{ $user->is_frozen ? 'opacity-50 grayscale' : '' }}" 
                 style="background-color: var(--bg-surface); border: 1px solid var(--border-default);">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-lg" style="background-color: var(--bg-elevated);">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div>
                            <h3 class="font-semibold">{{ $user->name }}</h3>
                            <p class="text-xs opacity-60">{{ $user->email }}</p>
                        </div>
                    </div>
                    @if($user->is_frozen)
                    <span class="px-2 py-1 rounded text-xs font-medium" style="background-color: var(--border-default);">GELÉ</span>
                    @endif
                </div>
                
                <div class="grid grid-cols-2 gap-2 mt-4">
                    <button @click="initiateAction({{ $user->id }}, 'freeze')" 
                            class="flex items-center justify-center gap-2 py-2 rounded-lg text-sm font-medium transition-colors hover:bg-opacity-10 hover:bg-white"
                            style="border: 1px solid var(--border-default);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M12 8v8"/><path d="M8 12h8"/></svg>
                        {{ $user->is_frozen ? 'Débloquer' : 'Geler' }}
                    </button>
                    <button @click="initiateAction({{ $user->id }}, 'delete')" 
                            class="flex items-center justify-center gap-2 py-2 rounded-lg text-sm font-medium text-red-500 transition-colors hover:bg-red-500 hover:bg-opacity-10"
                            style="border: 1px solid var(--border-default);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                        Supprimer
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Desktop View (Table) -->
        <div class="hidden md:block rounded-xl overflow-hidden shadow-sm" style="background-color: var(--bg-surface); border: 1px solid var(--border-default);">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b" style="border-color: var(--border-default);">
                        <th class="p-4 font-medium opacity-60">Utilisateur</th>
                        <th class="p-4 font-medium opacity-60">Rôle</th>
                        <th class="p-4 font-medium opacity-60">Statut</th>
                        <th class="p-4 font-medium opacity-60 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y" style="border-color: var(--border-default);">
                    @foreach($users as $user)
                    <tr class="group transition-colors hover:bg-opacity-50 hover:bg-black/5 {{ $user->is_frozen ? 'opacity-50 grayscale' : '' }}">
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm" style="background-color: var(--bg-elevated);">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-medium">{{ $user->name }}</div>
                                    <div class="text-xs opacity-60">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $user->role ?? 'User' }}
                            </span>
                        </td>
                        <td class="p-4">
                            @if($user->is_frozen)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium" style="background-color: var(--border-default);">
                                    Gelé
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Actif
                                </span>
                            @endif
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button @click="initiateAction({{ $user->id }}, 'freeze')" 
                                        class="p-2 rounded-lg hover:bg-opacity-10 hover:bg-white transition-colors" 
                                        title="{{ $user->is_frozen ? 'Débloquer' : 'Geler' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M12 8v8"/><path d="M8 12h8"/></svg>
                                </button>
                                <button @click="initiateAction({{ $user->id }}, 'delete')" 
                                        class="p-2 rounded-lg text-red-500 hover:bg-red-500 hover:text-white transition-colors"
                                        title="Supprimer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>

    <!-- OTP Modal -->
    <div x-show="showModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm"
         style="display: none;">
        
        <div class="w-full max-w-md rounded-2xl shadow-2xl overflow-hidden" 
             style="background-color: var(--bg-surface); border: 1px solid var(--border-default);">
            
            <div class="p-6 text-center">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center bg-blue-500/10 text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </div>
                
                <h2 class="text-2xl font-bold mb-2">Vérification de sécurité</h2>
                <p class="text-sm opacity-70 mb-6">
                    Un code OTP a été envoyé à votre adresse email. Veuillez le saisir pour confirmer l'action <span x-text="currentAction === 'delete' ? 'de suppression' : 'de gel'"></span>.
                </p>

                <div class="mb-6">
                    <input type="tel" 
                           x-model="otp" 
                           x-ref="otpInput"
                           maxlength="6"
                           placeholder="000000"
                           class="w-full text-center text-3xl font-mono tracking-[0.5em] py-3 rounded-lg bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                           :class="{'animate-shake border-red-500': error}"
                           style="border: 2px solid var(--border-default);">
                    
                    <div class="mt-2 flex justify-between text-xs opacity-60">
                        <span x-text="error || 'Code à 6 chiffres'"></span>
                        <span x-text="formatTime(timeLeft)"></span>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button @click="showModal = false" 
                            class="flex-1 py-3 rounded-lg font-medium transition-colors hover:bg-opacity-10 hover:bg-white"
                            style="border: 1px solid var(--border-default);">
                        Annuler
                    </button>
                    <button @click="verifyOtp()" 
                            :disabled="otp.length !== 6 || loading"
                            class="flex-1 py-3 rounded-lg font-medium text-white transition-all disabled:opacity-50 disabled:cursor-not-allowed"
                            style="background-color: var(--accent);">
                        <span x-show="!loading">Confirmer</span>
                        <span x-show="loading" class="animate-pulse">Vérification...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

        <!-- Desktop View (Table) -->
        <div class="hidden md:block rounded-xl overflow-hidden shadow-sm" style="background-color: var(--bg-surface); border: 1px solid var(--border-default);">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b" style="border-color: var(--border-default);">
                        <th class="p-4 font-medium opacity-60">Utilisateur</th>
                        <th class="p-4 font-medium opacity-60">Rôle</th>
                        <th class="p-4 font-medium opacity-60">Statut</th>
                        <th class="p-4 font-medium opacity-60 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y" style="border-color: var(--border-default);">
                    @foreach($users as $user)
                    <tr class="group transition-colors hover:bg-opacity-50 hover:bg-black/5 {{ $user->is_frozen ? 'opacity-50 grayscale' : '' }}">
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm" style="background-color: var(--bg-elevated);">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-medium">{{ $user->name }}</div>
                                    <div class="text-xs opacity-60">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $user->role ?? 'User' }}
                            </span>
                        </td>
                        <td class="p-4">
                            @if($user->is_frozen)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium" style="background-color: var(--border-default);">
                                    Gelé
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Actif
                                </span>
                            @endif
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button @click="initiateAction({{ $user->id }}, 'freeze')" 
                                        class="p-2 rounded-lg hover:bg-opacity-10 hover:bg-white transition-colors" 
                                        title="{{ $user->is_frozen ? 'Débloquer' : 'Geler' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M12 8v8"/><path d="M8 12h8"/></svg>
                                </button>
                                <button @click="initiateAction({{ $user->id }}, 'delete')" 
                                        class="p-2 rounded-lg text-red-500 hover:bg-red-500 hover:text-white transition-colors"
                                        title="Supprimer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>

        <!-- Desktop View (Table) -->
        <div class="hidden md:block rounded-xl overflow-hidden shadow-sm" style="background-color: var(--bg-surface); border: 1px solid var(--border-default);">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b" style="border-color: var(--border-default);">
                        <th class="p-4 font-medium opacity-60">Utilisateur</th>
                        <th class="p-4 font-medium opacity-60">Rôle</th>
                        <th class="p-4 font-medium opacity-60">Statut</th>
                        <th class="p-4 font-medium opacity-60 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y" style="border-color: var(--border-default);">
                    @foreach($users as $user)
                    <tr class="group transition-colors hover:bg-opacity-50 hover:bg-black/5 {{ $user->is_frozen ? 'opacity-50 grayscale' : '' }}">
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm" style="background-color: var(--bg-elevated);">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-medium">{{ $user->name }}</div>
                                    <div class="text-xs opacity-60">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $user->role ?? 'User' }}
                            </span>
                        </td>
                        <td class="p-4">
                            @if($user->is_frozen)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium" style="background-color: var(--border-default);">
                                    Gelé
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Actif
                                </span>
                            @endif
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button @click="initiateAction({{ $user->id }}, 'freeze')" 
                                        class="p-2 rounded-lg hover:bg-opacity-10 hover:bg-white transition-colors" 
                                        title="{{ $user->is_frozen ? 'Débloquer' : 'Geler' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M12 8v8"/><path d="M8 12h8"/></svg>
                                </button>
                                <button @click="initiateAction({{ $user->id }}, 'delete')" 
                                        class="p-2 rounded-lg text-red-500 hover:bg-red-500 hover:text-white transition-colors"
                                        title="Supprimer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
                        <td class="p-4">
                            @if($user->is_frozen)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium" style="background-color: var(--border-default);">
                                    Gelé
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Actif
                                </span>
                            @endif
                        </td>
