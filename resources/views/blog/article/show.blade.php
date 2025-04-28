@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6 bg-white rounded shadow">

    @if($image)
    <div class="mb-6">
        <img src="{{ $image }}" alt="Image sur l’endométriose" class="rounded-lg shadow max-w-full">
    </div>
    @endif

    <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>

    <p class="text-lg mb-4">{{ $post->content }}</p>

    <p class="text-sm text-gray-500 mb-6">Publié le {{ $post->created_at->format('d/m/Y') }}</p>

    <div class="flex justify-end space-x-4">
        <a href="{{ route('blog.edit', $post->id) }}"
            class="flex items-center text-sm text-blue-600 hover:underline hover:text-blue-800">
            ✏️ <span class="ml-1">Modifier</span>
        </a>

        <form action="{{ route('blog.destroy', $post->id) }}" method="POST"
            onsubmit="return confirm('Tu veux vraiment supprimer cet article ?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="flex items-center text-sm text-red-600 hover:underline hover:text-red-800">
                🗑️ <span class="ml-1">Supprimer</span>
            </button>
        </form>
    </div>

</div>
@endsection