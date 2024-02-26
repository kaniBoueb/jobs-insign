<?php

use App\Http\Controllers\ContratController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\ProcessusController;
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
    return view('frontend.welcome');
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

    Route::get('/supprimer-offre/{id}', [OffreController::class, 'destroy'])->name('offre.delete');

    // Routes extras
    Route::controller(PosteController::class)->group(function(){
        Route::get('/les-postes', 'AllPostes')->name('all.postes');
        Route::get('/nouveau-poste', 'AddPostes')->name('add.poste');
        Route::post('/nouveau-poste', 'AddPoste')->name('poste.store');
        // Route::get('/edit/poste/{id}', 'EditPoste')->name('poste.edit');
        // Route::post('update/poste', 'UpdatePoste')->name('poste.update');
        Route::get('/supprimer-poste/{id}', 'DeletePoste')->name('poste.delete');
    });

    Route::controller(CountryController::class)->group(function(){
        Route::get('/les-pays', 'AllCountries')->name('all.countries');
        Route::get('/nouveau-pays', 'AddCountries')->name('add.country');
        Route::post('/nouveau-pays', 'AddCountry')->name('country.store');
        // Route::get('/edit/poste/{id}', 'EditPoste')->name('poste.edit');
        // Route::post('update/poste', 'UpdatePoste')->name('poste.update');
        Route::get('/supprimer-pays/{id}', 'DeleteCountry')->name('country.delete');
    });

    Route::controller(ContratController::class)->group(function(){
        Route::get('/les-contrats', 'AllContrats')->name('all.contrats');
        Route::get('/nouveau-contrat', 'AddContrats')->name('add.contrat');
        Route::post('/nouveau-contrat', 'AddContrat')->name('contrat.store');
        // Route::get('/edit/poste/{id}', 'EditPoste')->name('poste.edit');
        // Route::post('update/poste', 'UpdatePoste')->name('poste.update');
        Route::get('/supprimer-contrat/{id}', 'DeleteContrat')->name('contrat.delete');
    });

    Route::controller(ProcessusController::class)->group(function(){
        Route::get('/les-process', 'AllProcess')->name('all.process');
        Route::get('/nouveau-process', 'AddProcess')->name('add.process');
        Route::post('/nouveau-process', 'AddProcessus')->name('process.store');
        Route::get('/supprimer-process/{id}', 'DeleteProcessus')->name('process.delete');
    });

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
