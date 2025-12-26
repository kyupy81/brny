<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Badge Agent - {{ $user->agent_code }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body { -webkit-print-color-adjust: exact; }
            .no-print { display: none; }
        }
        .badge-card {
            width: 85.6mm;
            height: 53.98mm;
            border: 1px solid #000;
            position: relative;
            overflow: hidden;
            background: white;
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">

    <div class="no-print mb-8 text-center">
        <button onclick="window.print()" class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700">
            Imprimer le Badge
        </button>
        <p class="text-sm text-gray-500 mt-2">Assurez-vous d'activer "Graphiques d'arrière-plan" dans les options d'impression.</p>
    </div>

    <!-- Badge Recto -->
    <div class="badge-card shadow-xl flex flex-row p-4 items-center">
        <!-- Section Gauche : Photo/QR -->
        <div class="w-1/3 flex flex-col items-center justify-center border-r border-gray-200 pr-2">
            <div class="mb-2">
                {!! $qrCode !!}
            </div>
            <span class="text-[10px] font-mono text-gray-500">{{ $user->agent_code }}</span>
        </div>

        <!-- Section Droite : Infos -->
        <div class="w-2/3 pl-4">
            <div class="uppercase tracking-wide text-xs text-indigo-500 font-bold">Agent Officiel</div>
            <h1 class="text-lg font-bold text-gray-900 leading-tight">{{ $user->name }}</h1>
            <p class="text-sm text-gray-600 mt-1">{{ $user->phone }}</p>
            
            <div class="mt-4 border-t pt-2">
                <p class="text-[10px] text-gray-400">BATELA RETROVISEUR NA YO</p>
                <p class="text-[8px] text-gray-400">Ce badge est la propriété de l'entreprise.</p>
            </div>
        </div>
    </div>

</body>
</html>
