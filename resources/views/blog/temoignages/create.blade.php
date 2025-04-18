@extends('layout')

@section('title', 'Partager mon témoignage – Info-Endo')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-pink-700">Partager mon témoignage ✍️</h2>

    <form action="{{ route('temoignages.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Catégorie -->
        <div>
            <label for="categorie" class="block text-sm font-medium text-gray-700">Catégorie</label>
            <select name="categorie" id="categorie" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                <option value="">-- Choisir une catégorie --</option>
                <option value="Diagnostique">Diagnostique</option>
                <option value="Symptômes">Symptômes</option>
            </select>
        </div>

        <!-- Contenu -->
        <div>
            <label for="contenu" class="block text-sm font-medium text-gray-700">Votre témoignage</label>
            <textarea name="contenu" id="contenu" rows="6" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500"></textarea>
        </div>

        <!-- Bouton -->
        <div class="text-right">
            <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700 shadow">
                Envoyer 💌
            </button>
        </div>
    </form>
</div>
@endsection