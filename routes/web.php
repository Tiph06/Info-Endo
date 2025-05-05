<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTemoignageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemoignageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\PostTemoignage;
use App\Models\Temoignage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return redirect()->route('blog.index');
});


//Authentification 

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
//
// 🔒 AUTHENTIFICATION ADMIN ?
//

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//
// 📌 TÉMOIGNAGES
//
// Nouvelle page statique pour les témoignages
Route::get('/temoignages', function () {
    $posts = PostTemoignage::latest()->get(); // tu récupères tous les témoignages
    return view('blog.temoignages.temoignages', compact('posts'));
})->name('temoignages.index');


// Page pour creer un témoignage
Route::get('/temoignages/create', [PostController::class, 'create'])->name('temoignages.create');

Route::delete('/temoignages/{id}', [PostTemoignageController::class, 'destroy'])->name('temoignages.destroy');

// Page Enregistrement du témoignage (formulaire POST)
Route::post('/temoignages', [PostController::class, 'store'])->name('temoignages.store');

//
// 📄 ARTICLE (avec extrait Wikipédia)
//

// Page Article 
Route::get('/article', function () {
    $response = Http::get('https://fr.wikipedia.org/api/rest_v1/page/summary/Endométriose');

    $wiki = null;
    if ($response->successful()) {
        $wiki = [
            'title' => $response['title'],
            'extract' => $response['extract'],
            'url' => $response['content_urls']['desktop']['page'],
        ];
    }

    return view('blog.article.article', compact('wiki'));
})->name('article');


// Page pour créer un article
Route::get('/create', function () {
    return view('blog.article.create');
})->name('create');

// Traitement du formulaire
Route::post('/store', function (Request $request) {
    $validated = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
    ]);

    $post = new Post();
    $post->title = $validated['title'];
    $post->slug = Str::slug($validated['title']);
    $post->content = $validated['content'];
    $post->save();

    return redirect()->route('blog.index')->with('success', 'Article publié avec succès 💫');
})->name('store');


// Page pour éditer un article
Route::get('/{id}/edit', function ($id) {
    $post = \App\Models\Post::findOrFail($id);
    return view('blog.article.edit', compact('post'));
})->name('edit');

Route::put('/{id}', function (Request $request, $id) {
    $validated = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
    ]);

    $post = \App\Models\Post::findOrFail($id);
    $post->title = $validated['title'];
    $post->slug = Str::slug($validated['title']);
    $post->content = $validated['content'];
    $post->save();

    return redirect()->route('blog.index')->with('success', 'Article mis à jour avec succès ✨');
})->name('update');


// Suppression d’un article
Route::delete('/{id}', function ($id) {
    $post = \App\Models\Post::findOrFail($id);
    $post->delete();

    return redirect()->route('blog.index')->with('success', 'Article supprimé avec succès 🗑️');
})->name('destroy');


// Page de détail d’un article
Route::get('/{slug}--{id}', function ($slug, $id) {
    $post = \App\Models\Post::findOrFail($id);

    $response = Http::get('https://api.unsplash.com/photos/random', [
        'query' => 'endometriosis',
        'client_id' => env('UNSPLASH_ACCESS_KEY'), // Clé d’accès à l’API Unsplash
        'orientation' => 'landscape',
    ]);

    // Vérification de la réponse
    $image = null;
    if ($response->successful()) {
        $image = $response['urls']['regular'];
    }
    return view('blog.artcile.show', compact('post', 'image', 'stat'));
})
    ->where(['slug' => '[a-z0-9\-]+', 'id' => '[0-9]+'])
    ->name('show');


//
// 📝 BLOG
//

Route::prefix('blog')->name('blog.')->group(function () {

    // Page d’accueil du blog
    Route::get('/', function () {
        $posts = Post::latest()->get();

        // Statistiques dynamiques
        $stats = [
            "1 femme sur 10 est atteinte d’endométriose dans le monde.",
            "Le délai moyen de diagnostic est de 7 ans.",
            "30 à 40 % des femmes atteintes d’endométriose ont des difficultés à concevoir.",
            "Environ 2 millions de femmes en France seraient concernées.",
            "Plus de 190 millions de personnes vivent avec l’endométriose dans le monde (source OMS)."
        ];

        $stat = $stats[array_rand($stats)];

        return view('blog.index', compact('posts', 'stat'));
    })->name('index'); // <= C’EST CETTE LIGNE QUI NOMME LA ROUTE blog.index

    // Page pour créer un article
    Route::get('/create', function () {
        return view('blog.create');
    })->name('create');

    // Traitement du formulaire
    Route::post('/store', function (Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->slug = Str::slug($validated['title']);
        $post->content = $validated['content'];
        $post->save();

        return redirect()->route('blog.index')->with('success', 'Article publié avec succès 💫');
    })->name('store');


    // Page pour éditer un article
    Route::get('/{id}/edit', function ($id) {
        $post = \App\Models\Post::findOrFail($id);
        return view('blog.edit', compact('post'));
    })->name('edit');

    Route::put('/{id}', function (Request $request, $id) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = \App\Models\Post::findOrFail($id);
        $post->title = $validated['title'];
        $post->slug = Str::slug($validated['title']);
        $post->content = $validated['content'];
        $post->save();

        return redirect()->route('blog.index')->with('success', 'Article mis à jour avec succès ✨');
    })->name('update');


    // Suppression d’un article
    Route::delete('/{id}', function ($id) {
        $post = \App\Models\Post::findOrFail($id);
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Article supprimé avec succès 🗑️');
    })->name('destroy');


    // Page de détail d’un article
    Route::get('/{slug}--{id}', function ($slug, $id) {
        $post = \App\Models\Post::findOrFail($id);

        $response = Http::get('https://api.unsplash.com/photos/random', [
            'query' => 'endometriosis',
            'client_id' => env('UNSPLASH_ACCESS_KEY'), // Clé d’accès à l’API Unsplash
            'orientation' => 'landscape',
        ]);

        // Vérification de la réponse
        $image = null;
        if ($response->successful()) {
            $image = $response['urls']['regular'];
        }
        return view('blog.show', compact('post', 'image', 'stat'));
    })
        ->where(['slug' => '[a-z0-9\-]+', 'id' => '[0-9]+'])
        ->name('show');
});
