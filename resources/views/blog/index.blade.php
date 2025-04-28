@extends('layout')

@section('title', 'Accueil – Info-Endo')

@section('content')
<div class="container mx-auto px-4 py-8">

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

        @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
            {{ session('success') }}
        </div>
        @endif

        <!-- 🌍 Carte interactive -->
        <section>
            <div class="mb-4">
                <label for="regionSelect" class="block mb-2 text-gray-700">Filtrer par région :</label>
                <select id="regionSelect" class="p-2 border rounded">
                    <option value="">Toutes les régions</option>
                    <option value="Île-de-France">Île-de-France</option>
                    <option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
                    <option value="Provence-Alpes-Côte d’Azur">Provence-Alpes-Côte d’Azur</option>
                    <option value="Occitanie">Occitanie</option>
                    <option value="Pays de la Loire">Pays de la Loire</option>
                    <option value="Hauts-de-France">Hauts-de-France</option>
                </select>
            </div>

            <h2 class="text-2xl font-semibold mb-4">Carte interactive sur l'endométriose 🗺️</h2>
            <div class="bg-white rounded-lg shadow-md p-6">
                <p class="text-gray-600 mb-4 text-center">La carte sera affichée ici bientôt !</p>
                <div id="map" class="w-full h-140 bg-gray-200 rounded-lg flex items-center justify-center">
                    <span class="text-gray-500">[ Carte en construction ]</span>
                </div>
            </div>
        </section>

</div>
@endsection



<!-- Les donuts -->

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Chart(document.getElementById('chart1'), {
            type: 'doughnut',
            data: {
                labels: ['Touchées', 'Non touchées'],
                datasets: [{
                    data: [10, 90],
                    backgroundColor: ['#f472b6', '#5ba3c1'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });

        new Chart(document.getElementById('chart2'), {
            type: 'bar',
            data: {
                labels: ['Années de retard'],
                datasets: [{
                    label: 'Temps moyen de diagnostic',
                    data: [7],
                    backgroundColor: '#fbbf24'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 10
                    }
                }
            }
        });

        new Chart(document.getElementById('chart3'), {
            type: 'doughnut',
            data: {
                labels: ['Avec difficultés', 'Sans difficultés'],
                datasets: [{
                    data: [35, 65],
                    backgroundColor: ['#f472b6', '#5ba3c1'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    });

    // Les graphique 

    const ctxInteractive = document.getElementById('interactiveChart').getContext('2d');
    let chartData = {
        labels: ['France', 'Europe', 'Monde'],
        datasets: [{
            label: 'Femmes concernées (en millions)',
            data: [2, 10, 190],
            backgroundColor: '#f472b6'
        }]
    };
    const interactiveChart = new Chart(ctxInteractive, {
        type: 'bar',
        data: {
            labels: ['France', 'Europe', 'Monde'],
            datasets: [{
                label: 'Femmes concernées (en millions)',
                data: [2, 10, 190],
                backgroundColor: '#f472b6'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    document.querySelectorAll('[data-chart-type]').forEach(button => {
        button.addEventListener('click', () => {
            const type = button.getAttribute('data-chart-type');

            if (type === 'regions') {
                interactiveChart.data.labels = ['France', 'Europe', 'Monde'];
                interactiveChart.data.datasets[0].label = 'Femmes concernées (en millions)';
                interactiveChart.data.datasets[0].data = [2, 10, 190];
                interactiveChart.data.datasets[0].backgroundColor = '#f472b6';
            } else if (type === 'formes') {
                interactiveChart.data.labels = ['Superficielle', 'Ovarienne', 'Profonde'];
                interactiveChart.data.datasets[0].label = 'Répartition des formes (%)';
                interactiveChart.data.datasets[0].data = [40, 30, 30];
                interactiveChart.data.datasets[0].backgroundColor = '#facc15';
            } else if (type === 'ages') {
                interactiveChart.data.labels = ['15-25', '26-35', '36+'];
                interactiveChart.data.datasets[0].label = 'Tranche d’âge au diagnostic (%)';
                interactiveChart.data.datasets[0].data = [25, 50, 25];
                interactiveChart.data.datasets[0].backgroundColor = '#5ba3c1';
            }

            interactiveChart.update();
        });
    });

    // La carte interactive

    document.addEventListener('DOMContentLoaded', function() {
        var map = L.map('map').setView([46.6034, 1.8883], 6); // Centrage sur la France

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Centres et spécialistes en France
        var centers = [{
                name: "Hôpital Paris Saint-Joseph",
                address: "185 Rue Raymond Losserand, 75014 Paris",
                coords: [48.82963720202146, 2.311622302824082],
                region: "Île-de-France"
            },
            {
                name: "Institut de la femme et de l’Endométriose",
                address: "5 allée Arnaud Beltrame,75003 Paris",
                coords: [48.85723699195826, 2.3668469279770226],
                region: "Île-de-France"
            },
            {
                name: "CHU de Nice – Hôpital de l'Archet",
                address: "151 Route de Saint-Antoine, 06200 Nice",
                coords: [43.69659696127434, 7.226779437733042],
                region: "Provence-Alpes-Côte d’Azur"
            },
            {
                name: "Centre Lyonnais de l'Endométriose",
                address: "Hôpital Femme Mère Enfant, 59 Boulevard Pinel, 69003 Lyon",
                coords: [45.7456032249776, 4.901172395535287],
                region: "Auvergne-Rhône-Alpes"
            },
            {
                name: "Centre Endométriose Marseille",
                address: "Hôpital de la Timone, 264 Rue Saint-Pierre, 13005 Marseille",
                coords: [43.270337390805885, 5.385967940513273],
                region: "Provence-Alpes-Côte d’Azur"
            },
            {
                name: "Centre Hospitalier Universitaire de Toulouse",
                address: "2 Rue Viguerie, 31059 Toulouse",
                coords: [43.59955201901712, 1.4362110619577042],
                region: "Occitanie"
            },
            {
                name: "Centre Endométriose Nantes",
                address: "Hôpital de la Cavale Blanche, 2 Rue de la Cavale Blanche, 44000 Nantes",
                coords: [47.20061623481171, -1.5268485391554418],
                region: "Pays de la Loire"
            },
            {
                name: "Centre Hospitalier de Lille",
                address: "2 Rue du Professeur Langevin, 59000 Lille",
                coords: [50.61106477989332, 3.0345872875000923],
                region: "Hauts-de-France"
            }
        ];

        // Ajoute les icons sur la carte
        var pinkIcon = new L.Icon({
            iconUrl: 'https://img.icons8.com/?size=100&id=ENrlMUJ4BgyP&format=png&color=000000',
            iconSize: [35, 35], // Plus grand
            iconAnchor: [15, 30], // Bien centré
            popupAnchor: [0, -30] // Le popup se positionne proprement
        });

        centers.forEach(function(center) {
            L.marker(center.coords, {
                    icon: pinkIcon
                })
                .addTo(map)
                .bindPopup('<b>' + center.name + '</b>');
        });
    });
    var markers = [];

    function updateMap(region = '') {
        markers.forEach(marker => map.removeLayer(marker));
        markers = [];

        centers.forEach(function(center) {
            if (region === '' || center.region === region) {
                var marker = L.marker(center.coords, {
                        icon: pinkIcon
                    })
                    .addTo(map)
                    .bindPopup('<b>' + center.name + '</b>');
                markers.push(marker);
            }
        });
    }

    document.getElementById('regionSelect').addEventListener('change', function() {
        var selectedRegion = this.value;
        updateMap(selectedRegion);
    });

    // Appel initial pour tout afficher
    updateMap();
</script>

@endsection