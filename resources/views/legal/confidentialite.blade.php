@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold text-pink-800 mb-6">Politique de Confidentialité</h1>

    <p class="mb-4">
        Le site Info-Endo respecte votre vie privée et s'engage à protéger les données personnelles des utilisateurs.
    </p>

    <h2 class="text-2xl text-pink-700 font-semibold mt-6 mb-2">1. Données collectées</h2>
    <p class="mb-4">
        Les données collectées se limitent à celles nécessaires au bon fonctionnement du site, notamment lors de la publication d’un témoignage (catégorie et contenu).
    </p>

    <h2 class="text-2xl text-pink-700 font-semibold mt-6 mb-2">2. Finalité de la collecte</h2>
    <p class="mb-4">
        Les données sont utilisées uniquement pour publier les témoignages ou améliorer le contenu du site. Aucune donnée n’est cédée à des tiers.
    </p>

    <h2 class="text-2xl text-pink-700 font-semibold mt-6 mb-2">3. Stockage et sécurité</h2>
    <p class="mb-4">
        Les données sont stockées de manière sécurisée dans la base de données du site hébergé par un prestataire tiers. Des mesures de protection sont mises en place pour garantir leur sécurité.
    </p>

    <h2 class="text-2xl text-pink-700 font-semibold mt-6 mb-2">4. Vos droits</h2>
    <p class="mb-4">
        Conformément à la loi Informatique et Libertés et au RGPD, vous disposez d’un droit d’accès, de rectification et de suppression de vos données. Pour exercer vos droits, contactez-nous via le formulaire du site.
    </p>

    <h2 class="text-2xl text-pink-700 font-semibold mt-6 mb-2">5. Cookies</h2>
    <p class="mb-4">
        Le site peut utiliser des cookies à des fins statistiques ou de fonctionnement. Vous pouvez les refuser ou les supprimer via les paramètres de votre navigateur.
    </p>

    <p class="mt-6 text-sm text-gray-500">
        Dernière mise à jour : {{ now()->format('d/m/Y') }}
    </p>
</div>
@endsection