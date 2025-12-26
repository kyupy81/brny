<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text-primary leading-tight">
            {{ __('Gestion des Utilisateurs') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="userManagement()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(auth()->user()->hasAnyRole(['super_admin', 'admin']))
            
            <div class="bg-bg-surface overflow-hidden shadow-sm sm:rounded-lg border border-border-default">
                <div class="p-6 text-text-primary">
                    
                    <!-- Toolbar -->
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                        <h3 class="text-lg font-medium text-text-primary">Liste des comptes</h3>
                        <div class="relative w-full sm:w-64">
                            <input 
                                type="text" 
                                x-model="search" 
                                placeholder="Rechercher..." 
                                class="w-full bg-bg-background border-border-default text-text-primary rounded-md shadow-sm focus:border-accent-500 focus:ring-accent-500"
                            >
                        </div>
                    </div>

                    <!-- Desktop Table -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-border-default">
                            <thead class="bg-bg-elevated">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Nom</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Rôle</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-text-secondary uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-bg-surface divide-y divide-border-default">
                                <template x-for="user in filteredUsers" :key="user.id">
                                    <tr :class="{'opacity-60': user.status !== 'active'}" class="transition-opacity duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-text-primary" x-text="user.name"></div>
                                                    <div class="text-sm text-text-muted" x-text="user.email"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-bg-elevated text-text-secondary" x-text="user.role"></span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                                  :class="user.status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'"
                                                  x-text="user.status === 'active' ? 'Actif' : 'Inactif'">
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button @click="confirmAction(user, 'freeze')" 
                                                    class="text-accent-500 hover:text-accent-600 mr-3 font-semibold"
                                                    x-text="user.status === 'active' ? 'Geler' : 'Activer'">
                                            </button>
                                            <button @click="confirmAction(user, 'delete')" class="text-status-danger hover:text-red-700 font-semibold">Supprimer</button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Cards (PWA) -->
                    <div class="md:hidden space-y-4">
                        <template x-for="user in filteredUsers" :key="user.id">
                            <div class="bg-bg-elevated p-4 rounded-lg shadow border border-border-default transition-all duration-200" 
                                 :class="{'opacity-60': user.status !== 'active'}">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h4 class="text-lg font-bold text-text-primary" x-text="user.name"></h4>
                                        <p class="text-sm text-text-muted" x-text="user.email"></p>
                                    </div>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-bg-surface text-text-secondary border border-border-default" x-text="user.role"></span>
                                </div>
                                
                                <div class="flex justify-between items-center mt-4 pt-4 border-t border-border-default">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full"
                                          :class="user.status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'"
                                          x-text="user.status === 'active' ? 'Actif' : 'Inactif'">
                                    </span>
                                    <div class="flex space-x-3">
                                        <button @click="confirmAction(user, 'freeze')" class="p-2 text-accent-500 bg-bg-surface rounded-full hover:bg-bg-background transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                        </button>
                                        <button @click="confirmAction(user, 'delete')" class="p-2 text-status-danger bg-bg-surface rounded-full hover:bg-bg-background transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                </div>
            </div>

            <!-- OTP Modal -->
            <div x-show="otpModalOpen" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div x-show="otpModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-bg-background opacity-75"></div>
                    </div>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div x-show="otpModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-bg-surface rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-border-default">
                        <div class="bg-bg-surface px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-accent-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-accent-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                    <h3 class="text-lg leading-6 font-medium text-text-primary" id="modal-title">Validation de Sécurité</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-text-muted mb-4">
                                            Cette action est sensible. Veuillez entrer le code OTP envoyé à votre adresse email.
                                        </p>
                                        
                                        <div class="flex gap-2 mb-4">
                                            <button @click="sendOtp()" 
                                                    :disabled="otpSent && otpTimer > 0"
                                                    class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-bg-elevated text-sm font-medium text-text-primary hover:bg-bg-background focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-500 disabled:opacity-50">
                                                <span x-text="otpSent && otpTimer > 0 ? 'Renvoyer (' + otpTimer + 's)' : 'Envoyer le code'"></span>
                                            </button>
                                        </div>

                                        <div x-show="otpSent">
                                            <label class="block text-sm font-medium text-text-secondary text-left">Code OTP (6 chiffres)</label>
                                            <input type="text" x-model="otpCode" maxlength="6" class="mt-1 block w-full rounded-md border-border-default bg-bg-background text-text-primary shadow-sm focus:border-accent-500 focus:ring-accent-500 text-center tracking-widest text-xl">
                                            <p x-show="errorMessage" class="text-status-danger text-sm mt-1" x-text="errorMessage"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-bg-elevated px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button @click="submitAction()" 
                                    :disabled="!otpCode || otpCode.length !== 6 || isLoading"
                                    type="button" 
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-accent-500 text-base font-medium text-white hover:bg-accent-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-500 sm:ml-3 sm:w-auto sm:text-sm disabled:opacity-50">
                                <span x-show="!isLoading">Confirmer</span>
                                <span x-show="isLoading">Traitement...</span>
                            </button>
                            <button @click="closeOtpModal()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-border-default shadow-sm px-4 py-2 bg-bg-surface text-base font-medium text-text-secondary hover:text-text-primary focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Annuler
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @else
                <div class="bg-status-danger text-white p-4 rounded-md">
                    Accès refusé. Vous n'avez pas les droits nécessaires.
                </div>
            @endif
        </div>
    </div>

    <script>
        function userManagement() {
            return {
                users: @json($users),
                search: '',
                otpModalOpen: false,
                currentUser: null,
                currentAction: null,
                otpCode: '',
                otpSent: false,
                otpTimer: 0,
                isLoading: false,
                errorMessage: '',

                get filteredUsers() {
                    if (this.search === '') {
                        return this.users;
                    }
                    return this.users.filter(user => {
                        return user.name.toLowerCase().includes(this.search.toLowerCase()) ||
                               user.email.toLowerCase().includes(this.search.toLowerCase());
                    });
                },

                confirmAction(user, action) {
                    this.currentUser = user;
                    this.currentAction = action;
                    this.otpModalOpen = true;
                    this.otpCode = '';
                    this.errorMessage = '';
                    this.otpSent = false;
                },

                closeOtpModal() {
                    this.otpModalOpen = false;
                    this.currentUser = null;
                    this.currentAction = null;
                    this.otpCode = '';
                },

                sendOtp() {
                    this.isLoading = true;
                    this.errorMessage = '';
                    
                    fetch('{{ route('admin.otp.generate') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Erreur lors de l\'envoi');
                        return response.json();
                    })
                    .then(data => {
                        this.otpSent = true;
                        this.startTimer();
                        // Toast success could go here
                    })
                    .catch(error => {
                        this.errorMessage = "Impossible d'envoyer le code. Vérifiez votre configuration mail.";
                    })
                    .finally(() => {
                        this.isLoading = false;
                    });
                },

                startTimer() {
                    this.otpTimer = 60;
                    let interval = setInterval(() => {
                        if (this.otpTimer > 0) {
                            this.otpTimer--;
                        } else {
                            clearInterval(interval);
                        }
                    }, 1000);
                },

                submitAction() {
                    if (!this.otpCode || this.otpCode.length !== 6) return;

                    this.isLoading = true;
                    this.errorMessage = '';

                    fetch(`/admin/users/${this.currentUser.id}/action`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            otp: this.otpCode,
                            action: this.currentAction
                        })
                    })
                    .then(async response => {
                        const data = await response.json();
                        if (!response.ok) throw new Error(data.message || 'Erreur de validation');
                        return data;
                    })
                    .then(data => {
                        // Update local state
                        if (this.currentAction === 'delete') {
                            this.users = this.users.filter(u => u.id !== this.currentUser.id);
                        } else if (this.currentAction === 'freeze') {
                            let index = this.users.findIndex(u => u.id === this.currentUser.id);
                            if (index !== -1) {
                                this.users[index].status = this.users[index].status === 'active' ? 'frozen' : 'active';
                            }
                        }
                        this.closeOtpModal();
                        // Optional: Show success toast
                        alert(data.message); 
                    })
                    .catch(error => {
                        this.errorMessage = error.message;
                    })
                    .finally(() => {
                        this.isLoading = false;
                    });
                }
            }
        }
    </script>
</x-admin-layout>
