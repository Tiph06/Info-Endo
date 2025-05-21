@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold text-pink-800 mb-6">Mentions Légales</h1>

    <h2 class="text-2xl text-pink-700 font-semibold mt-6 mb-2">Éditeur du site</h2>
    <p class="mb-4">
        Le site Info-Endo est édité à titre personnel. Il s'agit d'un blog informatif et de sensibilisation autour de l'endométriose.
    </p>

    <h2 class="text-2xl text-pink-700 font-semibold mt-6 mb-2">Hébergement</h2>
    <p class="mb-4">
        Le site est hébergé par :<br>
        <strong>Nom de l’hébergeur :</strong> [à compléter]<br>
        <strong>Adresse :</strong> [à compléter]<br>
        <strong>Téléphone :</strong> [à compléter]
    </p>

    <h2 class="text-2xl text-pink-700 font-semibold mt-6 mb-2">Responsabilité</h2>
    <p class="mb-4">
        L’éditeur du site Info-Endo décline toute responsabilité en cas d’erreur, d’inexactitude ou d’omission dans les informations diffusées. Les contenus sont à visée informative uniquement.
    </p>

    <h2 class="text-2xl text-pink-700 font-semibold mt-6 mb-2">Propriété intellectuelle</h2>
    <p class="mb-4">
        Le contenu du site (textes, images, logo) est protégé par le droit d’auteur. Toute reproduction totale ou partielle est interdite sans autorisation.
    </p>

    <p class="mt-6 text-sm text-gray-500">
        Dernière mise à jour : {{ now()->format('d/m/Y') }}
    </p>
</div>
@endsection