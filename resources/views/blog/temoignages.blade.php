@extends('layout')

@section('title', 'Témoignages – Info-Endo')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-pink-700">Témoignages 💬</h2>

<p class="mb-4 text-gray-700">Des personnes partagent ici leur vécu face à l’endométriose, pour briser le silence et aider d’autres à mieux comprendre.</p>

<div class="space-y-6">

    {{-- Témoignage 1 - Court (pas de "Lire la suite") --}}
    <div class="bg-white p-4 rounded shadow">
        <p class="text-gray-800">
            “J’ai été diagnostiquée il y a deux ans. Depuis, je me sens enfin entendue et comprise. Ce blog m’aide à ne pas me sentir seule.”
        </p>
    </div>

    {{-- Témoignage 2 - Moyen (avec "Lire la suite") --}}
    <div class="bg-white p-4 rounded shadow">
        <p class="text-gray-800">
            “Depuis l’adolescence, j’ai toujours eu des douleurs très fortes pendant mes règles...”
            <span class="text-pink-600 font-medium cursor-pointer hover:underline"
                onclick="openModal(`Depuis l’adolescence, j’ai toujours eu des douleurs très fortes pendant mes règles. Personne ne m’a crue pendant des années. Ce n’est qu’à 28 ans, après avoir changé trois fois de gynéco, qu’un IRM a enfin révélé de l’endométriose. Ce jour-là, j’ai pleuré... de soulagement.`)">
                Lire la suite
            </span>
        </p>
    </div>

    {{-- Témoignage 3 - Long (avec "Lire la suite") --}}
    <div class="bg-white p-4 rounded shadow">
        <p class="text-gray-800">
            “J’ai mis plus de 10 ans à obtenir un diagnostic. Chaque mois, c’était l’enfer...”
            <span class="text-pink-600 font-medium cursor-pointer hover:underline"
                onclick="openModal(`J’ai mis plus de 10 ans à obtenir un diagnostic. Chaque mois, c’était l’enfer : douleurs insoutenables, fatigue chronique, crises d’angoisse. À l’école, on disait que j’exagérais, que j’étais fragile. Ensuite, au travail, j’étais jugée non fiable à cause de mes arrêts maladie. Il a fallu que je tombe sur un médecin spécialisé pour qu’enfin, on pose un mot sur ce que je vivais depuis si longtemps. Aujourd’hui encore, je me bats pour être entendue, pour adapter mon quotidien, mais j’ai décidé de témoigner pour que d’autres femmes ne perdent pas autant de temps que moi.`)">
                Lire la suite
            </span>
        </p>
    </div>

    {{-- Bientôt : bouton pour écrire son propre témoignage --}}
    <div class="mt-8">
        <button class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 shadow">
            ✍️ Partager mon témoignage (à venir)
        </button>
    </div>
</div>
<!-- Modale invisible -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 ">
    <div class="bg-white max-w-md w-full p-6 rounded shadow-lg relative">
        <button onclick="closeModal()" class="absolute top-2 right-3 text-gray-500 hover:text-gray-800 text-xl">&times;</button>
        <!-- <h3 class="text-lg font-bold text-pink-600 mb-2">Témoignage complet</h3> -->
        <p id="modal-content" class="text-gray-700 leading-relaxed"></p>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function openModal(content) {
        document.getElementById('modal-content').textContent = content;
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
</script>
@endsection