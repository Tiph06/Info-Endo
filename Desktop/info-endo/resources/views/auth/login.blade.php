@extends('layout')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-8 shadow-lg rounded-lg border border-pink-200 transform transition-all duration-700 ease-out opacity-0 translate-y-5 animate-fadeIn">

    <h2 class="text-2xl font-bold text-pink-800 text-center mb-6">Connexion</h2>

    @if (session('error'))
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded text-sm text-center">
        {{ session('error') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="mb-4 text-red-500 text-sm">
        {{ $errors->first() }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-pink-700 font-medium">Adresse e-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                class="w-full mt-1 p-2 border border-pink-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                required autofocus>
        </div>

        <div class="mb-6">
            <label for="password" class="block text-pink-700 font-medium">Mot de passe</label>
            <input id="password" type="password" name="password"
                class="w-full mt-1 p-2 border border-pink-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                required>
        </div>

        <div class="flex items-center justify-between mb-4">
            <label class="flex items-center text-sm text-pink-600">
                <input type="checkbox" name="remember" class="mr-2">
                Se souvenir de moi
            </label>

            <a href="{{ route('password.request') }}" class="text-sm text-pink-600 hover:underline">
                Mot de passe oublié ?
            </a>
        </div>

        <button type="submit"
            class="w-full bg-pink-500 text-white p-2 rounded hover:bg-pink-600 transition">
            Se connecter
        </button>
    </form>
</div>
@endsection


<style>
    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.8s ease-out forwards;
    }
</style>