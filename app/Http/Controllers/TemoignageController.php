<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temoignage;

class TemoignageController extends Controller
{
    public function destroy($id)
    {
        $temoignage = Temoignage::findOrFail($id);
        $temoignage->delete();

        return redirect()->route('temoignages.index')->with('success', 'Témoignage supprimé 🗑️');
    }
}
