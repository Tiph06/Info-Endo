import Chart from 'chart.js/auto';


document.addEventListener('DOMContentLoaded', function () {
    // Graphiques statiques
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
        options: { responsive: true }
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
            scales: { y: { beginAtZero: true, max: 10 } }
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
        options: { responsive: true }
    });

    // Graphique interactif
    const ctxInteractive = document.getElementById('interactiveChart').getContext('2d');
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
            scales: { y: { beginAtZero: true } }
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

    // Initialisation de la carte
    window.myMap = L.map('map').setView([46.6034, 1.8883], 6);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(window.myMap);

    const centers = [{
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
    }]; 
    window.myCenters = centers;

    const pinkIcon = new L.Icon({
        iconUrl: 'https://img.icons8.com/?size=100&id=ENrlMUJ4BgyP&format=png&color=000000',
        iconSize: [35, 35],
        iconAnchor: [15, 30],
        popupAnchor: [0, -30]
    });

    centers.forEach(center => {
        L.marker(center.coords, { icon: pinkIcon })
            .addTo(window.myMap)
            .bindPopup('<b>' + center.name + '</b>');
    });

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
    
    window.myMarkers = [];

    window.updateMap = function (region = '') {
        window.myMarkers.forEach(marker => window.myMap.removeLayer(marker));
        window.myMarkers = [];

        centers.forEach(center => {
            if (region === '' || center.region === region) {
                const marker = L.marker(center.coords, { icon: pinkIcon })
                    .addTo(window.myMap)
                    .bindPopup('<b>' + center.name + '</b>');
                window.myMarkers.push(marker);
            }
        });
    };

    window.updateMap();

    // Recherche localisée
    window.searchLocation = function () {
        const input = document.getElementById('searchInput').value;
        if (!input) return;

        fetch(`/search?searchInput=${encodeURIComponent(input)}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const coords = [data.location.lat, data.location.lng];
                    L.marker(coords).addTo(window.myMap)
                        .bindPopup(data.location.name)
                        .openPopup();
                    window.myMap.setView(coords, 13);
                }
            });
    };
});
