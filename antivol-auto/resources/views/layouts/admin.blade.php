<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config("app.name", "Laravel") }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <!-- Design Tokens CSS (generated from Style Dictionary) -->
    <link rel="stylesheet" href="{{ asset("dist/tokens/tokens.css") }}">

    @vite(["resources/css/app.css", "resources/js/app.js"])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-bg-background text-text-primary">
    <div class="min-h-screen">
        @include("layouts.navigation")

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-bg-surface shadow border-b border-border-default">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <!-- Admin Tabs -->
                    <div class="mb-6 border-b border-border-default">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <a href="{{ route("admin.dashboard") }}" class="{{ request()->routeIs("admin.dashboard") ? "border-accent-500 text-accent-500" : "border-transparent text-text-secondary hover:text-text-primary hover:border-border-default" }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                                Vue Globale
                            </a>
                            <a href="{{ route("admin.analytics") }}" class="{{ request()->routeIs("admin.analytics") ? "border-accent-500 text-accent-500" : "border-transparent text-text-secondary hover:text-text-primary hover:border-border-default" }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                                Analytique
                            </a>
                            <a href="{{ route("admin.operations") }}" class="{{ request()->routeIs("admin.operations") ? "border-accent-500 text-accent-500" : "border-transparent text-text-secondary hover:text-text-primary hover:border-border-default" }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                                Opérations
                            </a>
                            <a href="{{ route("admin.settings") }}" class="{{ request()->routeIs("admin.settings") ? "border-accent-500 text-accent-500" : "border-transparent text-text-secondary hover:text-text-primary hover:border-border-default" }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                                Administration
                            </a>
                        </nav>
                    </div>

                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
</body>
</html>
