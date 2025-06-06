<?php




use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTemoignageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

// 🏠 Accueil
Route::get('/', function () {
    return view('blog.index');
})->name('home');

// 📄 Page Article (Wikipedia)
Route::get('/article', [ArticleController::class, 'show'])->name('article');

// ✍️ Création d'article
Route::get('/create', [PostController::class, 'create'])->name('create');
Route::post('/store', [PostController::class, 'store'])->name('store');

// 🗃️ Liste et affichage d’un article
Route::get('/show/{slug}', [PostController::class, 'show'])->name('show');
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [PostController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('delete');

// 📋 Témoignages
Route::get('/temoignages', [PostTemoignageController::class, 'index'])->name('temoignages.index');
Route::get('/temoignages/create', [PostTemoignageController::class, 'create'])->name('temoignages.create');
Route::post('/temoignages', [PostTemoignageController::class, 'store'])->name('temoignages.store');
Route::delete('/temoignages/{id}', [PostTemoignageController::class, 'destroy'])->name('temoignages.destroy');

// 🔐 Tableau de bord sécurisé
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 🧾 Pages légales
Route::view('/cgu', 'legal.cgu')->name('cgu');
Route::view('/confidentialite', 'legal.confidentialite')->name('confidentialite');
Route::view('/mentions-legales', 'legal.mentions')->name('mentions');

// ✅ Auth routes générées par Breeze (Breeze comme il est utilisé)
require __DIR__ . '/auth.php';
