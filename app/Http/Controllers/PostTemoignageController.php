<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostTemoignage;

class PostTemoignageController extends Controller

{
    public function destroy($id)
    {
        $temoignage = PostTemoignage::findOrFail($id);
        $temoignage->delete();

        return redirect()->route('temoignages.index')->with('success', 'Témoignage supprimé 🗑️');
    }
}
