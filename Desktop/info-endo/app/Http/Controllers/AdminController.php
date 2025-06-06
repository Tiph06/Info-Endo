<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Affiche le formulaire de connexion admin
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Gère la connexion admin
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (auth()->user()->is_admin) {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Accès réservé à l’administrateur.']);
            }
        }

        return back()->withErrors(['email' => 'Identifiants invalides.']);
    }

    // Tableau de bord admin
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Déconnexion admin
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
