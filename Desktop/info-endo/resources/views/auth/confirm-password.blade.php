@extends('layout')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-pink-50 px-4">
    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8 border border-pink-200">
        <h2 class="text-2xl font-bold text-pink-800 text-center mb-6">Confirmer le mot de passe</h2>

        <p class="text-gray-700 mb-6 text-sm text-center">
            Cette action nécessite la confirmation de ton mot de passe. <br>
            Merci de le saisir ci-dessous avant de continuer.
        </p>

        @if ($errors->any())
        <div class="mb-4 text-sm text-red-500 text-center">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-pink-800 mb-1">Mot de passe</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition duration-200">
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-200">
                    Confirmer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection