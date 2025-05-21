@extends('layout')

@section('title', 'Accueil – Info-Endo')


@section('content')

@if(session('welcome'))
<div id="popup-welcome" class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-pink-100 border border-pink-300 text-pink-800 px-4 py-2 rounded shadow-lg z-50 transition-opacity duration-500">
    {{ session('welcome') }}
</div>

<script>
    setTimeout(() => {
        const popup = document.getElementById('popup-welcome');
        if (popup) popup.style.opacity = '0';
    }, 4000);
</script>
@endif


<div class="container mx-auto px-4 py-8 z-10">

    <h1 class="text-3xl font-bold mb-6 text-center">Bienvenue sur Info-Endo 💛</h1>
    <p class="text-center text-gray-600 mb-12">
        Ce blog est dédié à mieux comprendre l’endométriose. Retrouvez ici nos derniers articles, nos ressources et des témoignages.
    </p>


    <!-- Section Statistiques dynamiques -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">Chiffres clés sur l'endométriose 📊</h2>

        @if($stat)
        <div class="bg-yellow-100 text-yellow-900 p-4 rounded-md mb-6 shadow">
            <strong>Statistiques:</strong><br>
            {{ $stat }}
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-8 px-4">
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-bold mb-2">1 femme sur 10</h3>
                <canvas id="chart1" class="w-full h-64"></canvas>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-bold mb-2">Retard de diagnostic</h3>
                <canvas id="chart2" class="w-full h-64"></canvas>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-bold mb-2">Problèmes de fertilité</h3>
                <canvas id="chart3" class="w-full h-64"></canvas>
            </div>
        </div>

        <section class="px-6 py-10">
            <div class="bg-white p-4 rounded shadow my-8">
                <h3 class="font-bold mb-4">Explorer les chiffres</h3>

                <div class="flex gap-2 mb-4 flex-wrap">
                    <button data-chart-type="regions"
                        class="px-4 py-2 rounded-full text-white font-semibold shadow"
                        style="background-color: #f472b6;"
                        onmouseover="this.style.backgroundColor='#ec4899'"
                        onmouseout="this.style.backgroundColor='#f472b6'">
                        🌍 Par régions
                    </button>

                    <button data-chart-type="formes"
                        class="px-4 py-2 rounded-full text-white font-semibold shadow bg-yellow-400 hover:bg-yellow-500 transition duration-300 ease-in-out hover:scale-105">
                        🩺 Formes
                    </button>

                    <button data-chart-type="ages"
                        class="px-4 py-2 rounded-full text-white font-semibold shadow"
                        style="background-color: #5ba3c1;"
                        onmouseover="this.style.backgroundColor='#4994b7'"
                        onmouseout="this.style.backgroundColor='#5ba3c1'">
                        🎂 Tranches d’âge
                    </button>
                </div>

                <canvas id="interactiveChart" class="w-full h-80"></canvas>
            </div>

            <div class="mb-8">
                <x-search-input />
            </div>
        </section>

        <section class="bg-white p-4 rounded shadow my-8">
            <h2 class="text-xl font-semibold mb-4">Carte interactive sur l'endométriose 🗺️</h2>
            <div id="map" class="rounded-lg shadow relative" style="height: 400px;">
                <!-- La carte sera chargée ici -->
            </div>
        </section>

        @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
            {{ session('success') }}
        </div>
        @endif

        @endsection