@extends('layouts.guest')

@section('content')
<div class="w-full max-w-md mx-auto p-6 bg-white rounded shadow mt-10">
    <h1 class="text-2xl font-bold text-center mb-6">Connexion Admin</h1>

    @if ($errors->any())
    <div class="mb-4 text-sm text-red-600">
        {{ $errors->first() }}
    </div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Mot de passe" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                Se connecter
            </x-primary-button>
        </div>
    </form>
</div>
@endsection