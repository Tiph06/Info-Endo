@extends('layout')

@section('title', 'Créer un article – Info-Endo')

@section('content')
<h2 class="text-2xl font-bold mb-4 text-pink-800">Créer un nouvel article</h2>

@if ($errors->any())
<div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
    <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('blog.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block font-semibold text-gray-700">Titre</label>
        <input type="text" name="title" class="w-full border border-pink-300 rounded p-2" required>
    </div>

    <div>
        <label class="block font-semibold text-gray-700">Contenu</label>
        <textarea name="content" rows="8" class="w-full border border-pink-300 rounded p-2" required></textarea>
    </div>

    <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700">
        Publier l'article
    </button>
</form>
@endsection