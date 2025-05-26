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

        <section class="px-6 py-6">
            <div class="bg-white p-4 rounded shadow my-3">
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

            <!-- <div class="mb-8">
                <x-search-input />
            </div> -->
        </section>
        <x-scroll-reveal
            title="Qu’est-ce que l’endométriose ?"
            subtitle="L’endométriose est une maladie complexe qui peut récidiver dans certains cas et générer des douleurs chroniques">
            L’endométriose, touche 1 femme sur 10 ou 1 personne menstruée sur 10. Maladie longtemps ignorée, parfois très difficile à vivre au quotidien, l’endométriose se définit comme la présence en dehors de la cavité utérine de tissu semblable à la muqueuse utérine* qui subira, lors de chacun des cycles menstruels ultérieurs, l’influence des modifications hormonales. Si la physiopathologie de l’endométriose n’est pas univoque et fait intervenir de nombreuses hypothèses (métaplasie, induction, métastatique, immunologique, génétique, épigénétique et environnementale, cellules souches…), il est impossible de comprendre cette maladie sans prendre en compte la théorie de la régurgitation dite « théorie de l’implantation ». Lors de la menstruation, sous l’effet des contractions utérines, une partie du sang est régurgité dans les trompes pour arriver dans la cavité abdomino-pelvienne. Cette théorie expliquerait la majorité des atteintes d’endométriose.<br>

            Ce sang contient des cellules endométriales, des fragments de muqueuse utérine, qui, au lieu d’être détruits par le système immunitaire, vont s’implanter puis, sous l’effet des stimulations hormonales ultérieures, proliférer sur les organes de voisinage (péritoine, ovaire, trompe, intestin, vessie, uretère, diaphragme…).<br>

            L’endométriose est ainsi responsable de douleurs pelviennes parfois particulièrement invalidantes mais aussi de beaucoup d’autres symptômes en fonction de la localisation des lésions. Dans certains cas, l’endométriose est aussi responsable d’infertilité. Les symptômes ont un impact considérable sur la qualité de vie des personnes atteintes avec un retentissement important sur leur vie personnelle et conjugale mais également professionnelle et sociale<br><br>

            Extrait de l’introduction du Professeur Charles Chapron dans Les idées reçues sur l’endométriose – Avril 2024 Editions le Cavalier bleu.<br>

            *Les différents médecins interrogés sur la question « endomètre ou pas? » répondent ceci : histologiquement, le résultat de l’analyse pathologique indique qu’il s’agit d’endomètre. Mais pour s’adapter à son « nouvel environnement », la cellule endométriale se modifie pour se greffer sur les organes. Il s’agit d’un endomètre modifié qui sera différent de l’endomètre tel qu’on le trouve dans l’utérus… d’où le fait que l’on parle de « cellules semblables à l’endomètre » mais c’est un tissu endométrial (glandes + stroma) qui se comporte de la même façon en réagissant aux variations hormonales. Voir le site de l’Inserm également sur l’endométriose.
        </x-scroll-reveal>


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