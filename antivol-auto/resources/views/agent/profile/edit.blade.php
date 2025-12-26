@extends("layouts.app")

@section("content")
<div class="min-h-screen bg-gray-900 text-white font-sans">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500">
                Mon Profil
            </h1>
            <p class="text-gray-400 mt-1">Gérez vos informations personnelles et votre sécurité</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Profile Information -->
            <div class="bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-700">
                <h2 class="text-xl font-semibold text-white mb-4">Informations Personnelles</h2>
                <p class="text-sm text-gray-400 mb-6">Mettez à jour votre nom et votre adresse email.</p>

                <form method="post" action="{{ route("agent.profile.update") }}" class="space-y-6">
                    @csrf
                    @method("patch")

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nom</label>
                        <input type="text" name="name" id="name" value="{{ old("name", $user->name) }}" required autofocus autocomplete="name"
                            class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        @error("name")
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old("email", $user->email) }}" required autocomplete="username"
                            class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        @error("email")
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-lg transition-colors">
                            Enregistrer
                        </button>

                        @if (session("status") === "profile-updated")
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-400">
                                Enregistré.
                            </p>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Update Password -->
            <div class="bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-700">
                <h2 class="text-xl font-semibold text-white mb-4">Sécurité</h2>
                <p class="text-sm text-gray-400 mb-6">Assurez-vous d'utiliser un mot de passe long et aléatoire pour rester en sécurité.</p>

                <form method="post" action="{{ route("password.update") }}" class="space-y-6">
                    @csrf
                    @method("put")

                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-300 mb-1">Mot de passe actuel</label>
                        <input type="password" name="current_password" id="current_password" autocomplete="current-password"
                            class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        @error("current_password")
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Nouveau mot de passe</label>
                        <input type="password" name="password" id="password" autocomplete="new-password"
                            class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        @error("password")
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password"
                            class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        @error("password_confirmation")
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-lg transition-colors">
                            Mettre à jour
                        </button>

                        @if (session("status") === "password-updated")
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-400">
                                Enregistré.
                            </p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

