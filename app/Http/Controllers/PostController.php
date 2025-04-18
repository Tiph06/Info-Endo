<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = \App\Models\Post::latest()->get();
        return view('blog.temoignages.temoignages', compact('posts'));
    }

    public function create()
    {
        return view('blog.temoignages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'categorie' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        \App\Models\Temoignage::create([
            'categorie' => $validated['categorie'],
            'contenu' => $validated['contenu'],
            'auteur' => 'Anonyme' // pour l’instant, car pas encore d’auth
        ]);

        return redirect()->route('temoignages.index')->with('success', 'Témoignage envoyé 💌');
    }
}
