<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification Véhicule - BRNY Antivol</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl p-8 max-w-md w-full text-center">
        @php
            $isStolen = $vehicle->theftReports()->where('status', 'CONFIRMED')->exists();
        @endphp

        @if($isStolen)
            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-red-100 mb-6">
                <svg class="h-10 w-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <h2 class="text-3xl font-bold text-red-600 mb-2">VÉHICULE VOLÉ</h2>
            <p class="text-gray-600 mb-6">Ce véhicule a été déclaré volé.</p>
            
            <div class="bg-red-50 p-4 rounded-lg text-left mb-6">
                <p class="font-bold text-red-800">Action requise :</p>
                <p class="text-sm text-red-700">Contactez immédiatement les forces de l'ordre ou signalez cette localisation.</p>
            </div>
        @else
            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-100 mb-6">
                <svg class="h-10 w-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <h2 class="text-3xl font-bold text-green-600 mb-2">VÉHICULE VÉRIFIÉ</h2>
            <p class="text-gray-600 mb-6">Ce véhicule est enregistré et en règle.</p>
        @endif

        <div class="border-t pt-6 text-left space-y-3">
            <div class="flex justify-between">
                <span class="text-gray-500">Plaque :</span>
                <span class="font-bold text-gray-900">{{ $vehicle->plate_number }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Marque/Modèle :</span>
                <span class="font-medium text-gray-900">{{ $vehicle->brand->name ?? '' }} {{ $vehicle->model->name ?? '' }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Couleur :</span>
                <span class="font-medium text-gray-900">{{ $vehicle->color }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Code Marquage :</span>
                <span class="font-mono font-medium text-gray-900">{{ $marking->code }}</span>
            </div>
        </div>

        <div class="mt-8 text-xs text-gray-400">
            Vérifié le {{ now()->format('d/m/Y à H:i') }}<br>
            Système BRNY Antivol
        </div>
    </div>
</body>
</html>