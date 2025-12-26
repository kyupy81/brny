<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text-primary leading-tight">
            {{ __("Trouver le site sur mon PC") }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session("success"))
                <div class="mb-4 bg-status-success/10 border border-status-success text-status-success px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session("success") }}</span>
                </div>
            @endif

            @if(session("error"))
                <div class="mb-4 bg-status-danger/10 border border-status-danger text-status-danger px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session("error") }}</span>
                </div>
            @endif

            <div class="bg-bg-surface overflow-hidden shadow-sm sm:rounded-lg border border-border-default">
                <div class="p-6 text-text-primary">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium mb-2">Chemin du projet (Racine)</h3>
                        <div class="flex items-center gap-4">
                            <code class="bg-bg-elevated p-3 rounded border border-border-default flex-1 font-mono text-sm select-all" id="base-path">{{ $basePath }}</code>
                            <button onclick="copyToClipboard(\"base-path\")" class="inline-flex items-center px-4 py-2 bg-bg-elevated border border-border-default rounded-md font-semibold text-xs text-text-primary uppercase tracking-widest hover:bg-bg-background focus:outline-none transition ease-in-out duration-150">
                                Copier
                            </button>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-medium mb-2">Chemin Public (Web Root)</h3>
                        <div class="flex items-center gap-4">
                            <code class="bg-bg-elevated p-3 rounded border border-border-default flex-1 font-mono text-sm select-all" id="public-path">{{ $publicPath }}</code>
                            <button onclick="copyToClipboard(\"public-path\")" class="inline-flex items-center px-4 py-2 bg-bg-elevated border border-border-default rounded-md font-semibold text-xs text-text-primary uppercase tracking-widest hover:bg-bg-background focus:outline-none transition ease-in-out duration-150">
                                Copier
                            </button>
                        </div>
                    </div>

                    @if($isWindows)
                        <div class="border-t border-border-default pt-6">
                            <h3 class="text-lg font-medium mb-4">Actions Système</h3>
                            <p class="text-text-secondary mb-4 text-sm">
                                <span class="font-bold text-status-warning">Note :</span> Cette action ouvrira l explorateur de fichiers sur le serveur (votre machine locale).
                            </p>
                            
                            <form action="{{ route(\"admin.local_site.open\") }}" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-accent-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-accent-600 focus:bg-accent-600 active:bg-accent-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Ouvrir le dossier
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(elementId) {
            var copyText = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(copyText).then(function() {
                // Optional: Show a toast or change button text temporarily
                alert("Chemin copié !");
            }, function(err) {
                console.error("Erreur lors de la copie : ", err);
            });
        }
    </script>
</x-admin-layout>
