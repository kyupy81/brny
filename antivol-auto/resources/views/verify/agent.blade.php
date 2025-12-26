<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification Agent</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl p-8 max-w-md w-full text-center">
        @if($agent->status === 'ACTIVE')
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Agent Vérifié</h2>
            <p class="text-green-600 font-semibold mb-4">Cet agent est ACTIF</p>
        @else
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-4">
                <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Attention</h2>
            <p class="text-red-600 font-semibold mb-4">Cet agent est INACTIF ou SUSPENDU</p>
        @endif

        <div class="border-t pt-4 text-left">
            <p><strong>Nom :</strong> {{ $agent->name }}</p>
            <p><strong>Code :</strong> {{ $agent->agent_code }}</p>
            <p><strong>Téléphone :</strong> {{ $agent->phone }}</p>
        </div>
    </div>
</body>
</html>
