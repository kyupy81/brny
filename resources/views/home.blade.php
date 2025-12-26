<x-guest-layout>
    <div class="text-center py-12 bg-yellow-400 border-b-4 border-black">
        <h1 class="text-6xl font-black uppercase tracking-tighter mb-4">BRNY ANTIVOL</h1>
        <p class="text-xl font-bold font-mono">SYSTÈME DE MARQUAGE ET DE SÉCURISATION</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8 mt-12">
        <div class="border-4 border-black p-8 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all bg-white">
            <h2 class="text-3xl font-black uppercase mb-4">VÉRIFIER UN VÉHICULE</h2>
            <p class="font-mono mb-6">Vérifiez instantanément si un véhicule est déclaré volé grâce à son numéro de marquage.</p>
            
            <form action="{{ route('search') }}" method="GET" class="flex gap-2">
                <input type="text" name="query" placeholder="CODE DE MARQUAGE..." class="w-full border-2 border-black p-3 font-mono uppercase focus:outline-none focus:bg-yellow-100">
                <button type="submit" class="bg-black text-white px-6 py-3 font-bold uppercase hover:bg-gray-800">
                    CHERCHER
                </button>
            </form>
        </div>

        <div class="border-4 border-black p-8 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all bg-blue-600 text-white">
            <h2 class="text-3xl font-black uppercase mb-4">SIGNALER UN VOL</h2>
            <p class="font-mono mb-6">Déclarez rapidement le vol de votre véhicule pour alerter notre réseau et les autorités.</p>
            <a href="{{ route('thefts.create') }}" class="inline-block bg-white text-black px-6 py-3 font-bold uppercase border-2 border-black hover:bg-gray-100">
                SIGNALER MAINTENANT
            </a>
        </div>
    </div>

    <div class="mt-12 border-t-4 border-black pt-8">
        <h3 class="text-2xl font-black uppercase mb-6">VOLÉS DU RÉTROVISEUR RÉCEMMENT</h3>
        <div class="overflow-x-auto">
            <table class="w-full border-2 border-black font-mono text-sm">
                <thead class="bg-black text-white">
                    <tr>
                        <th class="p-3 text-left uppercase">Plaque</th>
                        <th class="p-3 text-left uppercase">Marque/Modèle</th>
                        <th class="p-3 text-left uppercase">Lieu</th>
                        <th class="p-3 text-left uppercase">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\TheftReport::with(['vehicle.brand', 'vehicle.model'])->latest()->take(5)->get() as $theft)
                    <tr class="border-b border-black">
                        <td class="p-3 font-bold">{{ $theft->vehicle->plate_number }}</td>
                        <td class="p-3">{{ $theft->vehicle->brand->name }} {{ $theft->vehicle->model->name }}</td>
                        <td class="p-3">{{ $theft->location }}</td>
                        <td class="p-3">{{ $theft->reported_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-guest-layout>