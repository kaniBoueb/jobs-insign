<?php

use App\Http\Controllers\OffreController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    //routes offres 
    Route::get('/les-offres', [OffreController::class, 'index'])->name('offre.index');
    Route::get('/offre/{id}', [OffreController::class, 'show'])->name('offre.show');

    Route::get('/nouvelle-offre', [OffreController::class, 'create'])->name('offre.create');
    Route::post('/nouvelle-offre', [OffreController::class, 'store'])->name('offre.store');

    Route::get('/modifier-offre/{id}', [OffreController::class, 'edit'])->name('offre.edit');
    Route::post('/modifier-offre/{id}', [OffreController::class, 'update'])->name('offre.update');

    Route::post('/supprimer-offre/{id}', [OffreController::class, 'destroy'])->name('offre.destroy');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
