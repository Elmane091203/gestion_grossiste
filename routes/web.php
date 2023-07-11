<?php

use App\Events\ProduitSupprimer;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanierController;
use App\Models\Panier;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaniersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PanierGsController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\StockFournisseursController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// route categories
Route::get('/produits/{categorie}/', [HomeController::class, 'categorie'])->name('categorie');


Route::middleware('auth', 'user-access:client')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('acceuil');
    Route::get('/client/facture', function () {
        return view('client.factureClient');
    });
    Route::post('paniers/create', [HomeController::class, 'store'])->name('paniers.create');
    Route::post('paniers/{id}', [HomeController::class, 'destroy'])->name('paniers.delete');
});

Route::middleware('auth', 'user-access:admin')->group(function () {
    // Route::resource('admin',AdminController::class);

    Route::get('/admin', [AdminController::class,'index'])->name('admin.index');
    Route::get('/admin/client', [AdminController::class,'client'])->name('admin.client');
    Route::get('/admin/fournisseur', [AdminController::class,'fournisseur'])->name('admin.fournisseur');
    Route::get('/admin/gestionnaire', [AdminController::class,'gestionnaire'])->name('admin.gestionnaire');
});

Route::middleware('auth', 'user-access:gestionnaire')->group(function () {
    Route::get('/gestionnaire', [GestionnaireController::class,'index'])->name('gestionnaire.index');
    Route::get('/clientCommande', [GestionnaireController::class,'commandeClient'])->name('gestionnaire.client');
    Route::post('/clientCommande/{Action}/{id}', [GestionnaireController::class,'commandeClientA'])->name('gestionnaire.commandeC');
    Route::get('/produit', [ProduitController::class, 'index'])->name('produit');
    Route::post('/produit/store', [ProduitController::class, 'store'])->name('produit.store');
    Route::get('/produit/modif{id}', [ProduitController::class, 'modif'])->name('produit.modif');
    Route::patch('/produit/update/({id}(', [ProduitController::class, 'update'])->name('produit.update');
    Route::delete('SupressionD/destroy({id})',[ProduitController::class,'destroy'])->name('produit.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/creer', [AdminController::class,'createUser'])->name('creer');
Route::post('/creer/store', [AdminController::class,'storeUser'])->name('creer.store');

/*



    //gestionnaire
    Route::get('/gestionnaire', function () {
        return view('gestionnaire.index');
    });


  
    Route::get('/dashboard', function () {
        return view('template.index');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/admin/gestionnaire',[AdminController::class,'gestionnaire']);

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';


*/
//Auth with github & google
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);

Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

require __DIR__ . '/auth.php';
