<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('searchInput');

        // 🔍 Pour l’instant, on simule un résultat :
        return response()->json([
            'status' => 'success',
            'query' => $query,
            'location' => [
                'lat' => 48.8566,
                'lng' => 2.3522,
                'name' => 'Clinique fictive spécialisée – ' . $query,
            ],
        ]);
    }
}
