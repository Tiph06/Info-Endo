@extends('layout')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-pink-50 px-4">
    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8 border border-pink-200">
        <h2 class="text-2xl font-bold text-pink-800 text-center mb-6">Réinitialisation du mot de passe</h2>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Token caché -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-pink-800 mb-1">Adresse e-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus
                    class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition duration-200">
                @error('email')
                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-pink-800 mb-1">Nouveau mot de passe</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition duration-200">
                @error('password')
                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmation -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-pink-800 mb-1">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition duration-200">
                @error('password_confirmation')
                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-200">
                    Réinitialiser le mot de passe
                </button>
            </div>
        </form>
    </div>
</div>
@endsection