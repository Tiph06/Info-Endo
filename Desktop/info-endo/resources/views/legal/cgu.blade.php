@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold text-pink-800 mb-6">Conditions Générales d'Utilisation</h1>

    <p class="mb-4">
        Les présentes Conditions Générales d’Utilisation (CGU) encadrent juridiquement l’utilisation du site Info-Endo accessible à l’adresse <a href="{{ url('/') }}" class="text-pink-600 hover:underline">{{ url('/') }}</a>.
    </p>

    <h2 class="text-2xl font-semibold text-pink-700 mt-6 mb-2">1. Objet</h2>
    <p class="mb-4">
        Le site Info-Endo a pour but de fournir des informations et des témoignages liés à l’endométriose. L’accès et l’utilisation du site impliquent l’acceptation sans réserve des présentes CGU.
    </p>

    <h2 class="text-2xl font-semibold text-pink-700 mt-6 mb-2">2. Accès au site</h2>
    <p class="mb-4">
        Le site est accessible gratuitement à tout utilisateur disposant d’un accès à Internet. Les frais liés à l’accès au site sont à la charge de l’utilisateur.
    </p>

    <h2 class="text-2xl font-semibold text-pink-700 mt-6 mb-2">3. Propriété intellectuelle</h2>
    <p class="mb-4">
        Le contenu du site (textes, images, logos, etc.) est protégé par le droit d’auteur. Toute reproduction, représentation ou exploitation partielle ou totale est interdite sans autorisation préalable.
    </p>

    <h2 class="text-2xl font-semibold text-pink-700 mt-6 mb-2">4. Données personnelles</h2>
    <p class="mb-4">
        Aucune donnée personnelle n’est collectée sans votre consentement. Le site respecte la réglementation en vigueur sur la protection des données (RGPD).
    </p>

    <h2 class="text-2xl font-semibold text-pink-700 mt-6 mb-2">5. Témoignages</h2>
    <p class="mb-4">
        Les témoignages publiés sur Info-Endo sont partagés de manière volontaire. L’utilisateur accepte que ses contributions soient modérées et diffusées anonymement.
    </p>

    <h2 class="text-2xl font-semibold text-pink-700 mt-6 mb-2">6. Responsabilité</h2>
    <p class="mb-4">
        Info-Endo met tout en œuvre pour assurer la fiabilité des informations publiées, mais ne garantit pas leur exactitude ou leur exhaustivité. Les contenus n’ont pas de valeur médicale et ne remplacent pas un avis professionnel.
    </p>

    <h2 class="text-2xl font-semibold text-pink-700 mt-6 mb-2">7. Modification des CGU</h2>
    <p class="mb-4">
        Info-Endo se réserve le droit de modifier les présentes CGU à tout moment. Les utilisateurs seront informés de toute mise à jour par le biais du site.
    </p>

    <h2 class="text-2xl font-semibold text-pink-700 mt-6 mb-2">8. Droit applicable</h2>
    <p class="mb-4">
        Les présentes CGU sont soumises au droit français. Tout litige sera porté devant les juridictions compétentes.
    </p>

    <p class="mt-6 text-sm text-gray-500">
        Dernière mise à jour : {{ now()->format('d/m/Y') }}
    </p>
</div>
@endsection