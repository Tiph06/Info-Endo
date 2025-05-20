<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostTemoignage;
use Illuminate\Support\Facades\Auth;


class PostTemoignageController extends Controller

{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'categorie' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        \App\Models\PostTemoignage::create([
            'categorie' => $validated['categorie'],
            'contenu' => $validated['contenu'],
            'auteur' => $request->has('anonyme') ? 'Anonyme' : Auth::user()->name,
        ]);

        return redirect()->route('temoignages.index')->with('success', 'Témoignage envoyé 💌');
    }
    public function index()
    {
        $posts = \App\Models\Post::latest()->get();
        return view('blog.temoignages.temoignages', compact('posts'));
    }

    public function create()
    {
        return view('blog.temoignages.create');
    }


    public function destroy($id)
    {
        $temoignage = PostTemoignage::findOrFail($id);
        $temoignage->delete();

        return redirect()->route('temoignages.index')->with('success', 'Témoignage supprimé 🗑️');
    }
}
