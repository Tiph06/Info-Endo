@extends('layout')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-pink-50 px-4">
    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8 border border-pink-200 text-center">
        <h2 class="text-2xl font-bold text-pink-800 mb-4">Vérifie ton adresse e-mail</h2>

        @if (session('status') === 'verification-link-sent')
        <div class="mb-4 text-sm text-green-600">
            Un nouveau lien de vérification a été envoyé à votre adresse e-mail.
        </div>
        @endif

        <p class="text-gray-700 mb-6">
            Avant de continuer, merci de vérifier votre e-mail pour valider votre adresse. <br>
            Si tu n’as pas reçu d’e-mail, clique sur le bouton ci-dessous pour en recevoir un nouveau.
        </p>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                class="bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-200">
                Renvoyer le lien de vérification
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit"
                class="text-sm text-gray-600 underline hover:text-gray-800 transition duration-200">
                Se déconnecter
            </button>
        </form>
    </div>
</div>
@endsection