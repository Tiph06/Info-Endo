@extends('layout')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-8 shadow-lg rounded-lg border border-pink-200">
    <h2 class="text-2xl font-bold text-pink-800 text-center mb-6">Créer un compte</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-pink-700 font-medium">Nom</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
                class="w-full mt-1 p-2 border border-pink-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                required autofocus autocomplete="name">
            @error('name')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-pink-700 font-medium">Adresse e-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                class="w-full mt-1 p-2 border border-pink-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                required autocomplete="email">
            @error('email')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-pink-700 font-medium">Mot de passe</label>
            <input id="password" type="password" name="password"
                class="w-full mt-1 p-2 border border-pink-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                required autocomplete="new-password">
            @error('password')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-pink-700 font-medium">Confirmer le mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                class="w-full mt-1 p-2 border border-pink-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                required autocomplete="new-password">
            @error('password_confirmation')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <a class="text-sm text-pink-600 hover:underline" href="{{ route('login') }}">
                Déjà inscrit ?
            </a>

            <button type="submit"
                class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 transition">
                S'inscrire
            </button>
        </div>
    </form>
</div>
@endsection