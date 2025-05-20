@extends('layout')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-pink-50 px-4">
    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8 border border-pink-200">
        <h2 class="text-2xl font-bold text-pink-800 text-center mb-6">Mot de passe oublié</h2>

        @if (session('status'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded text-sm text-center">
            {{ session('status') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="mb-4 text-red-500 text-sm text-center">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-pink-800 mb-1">Adresse e-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent transition duration-200">
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-200">
                    Envoyer le lien de réinitialisation
                </button>
            </div>
        </form>
    </div>
</div>
@endsection