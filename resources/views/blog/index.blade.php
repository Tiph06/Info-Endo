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
            <h2 class="text-2xl font-semibold mb-4">Carte interactive sur l'endométriose 🗺️</h2>
            <div class="bg-white rounded-lg shadow-md p-6">
                <p class="text-gray-600 mb-4 text-center">La carte sera affichée ici bientôt !</p>
                <div id="map" class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
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
</script>

@endsection