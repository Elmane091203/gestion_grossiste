<?php

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

Route::get('/', function () {
    return view('paniers.index', ['paniers' => Panier::all()]);
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
