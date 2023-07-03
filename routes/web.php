<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanierController;
use App\Models\Panier;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaniersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PanierGsController;
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

// route acceuil
Route::get('/', [HomeController::class, 'index'])->name('acceuil');

// route categories
Route::get('/produits/{categorie}/', [HomeController::class, 'categorie'])->name('categorie');


Route::middleware('auth', 'user-access:client')->group(function () {

    Route::post('paniers/create', [HomeController::class, 'store'])->name('paniers.create');
    Route::post('paniers/{id}', [HomeController::class, 'destroy'])->name('paniers.delete');
});

Route::resource('admin',[AdminController::class]);
Route::middleware('auth', 'user-access:admin')->group(function () {
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Auth with github & google
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);

Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

require __DIR__ . '/auth.php';
