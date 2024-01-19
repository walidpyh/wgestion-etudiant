<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\FiliereController;
use App\Http\Controllers\EtudiantController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::group(['middleware' => ['auth', 'checkUserRole']], function () {

    Route::resource('filieres', FiliereController::class);
    Route::resource('etudiants', EtudiantController::class);

    Route::get('/filieres-with-etudiant-count', [FiliereController::class, 'filiereWithEtudiantCount'])->name('filieres.with.etudiant.count');

/*     Route::get('/filieres', [FiliereController::class, 'index'])->name('filieres.index');
    Route::get('/filieres/create', [FiliereController::class, 'create'])->name('filieres.create');
    Route::post('/filieres', [FiliereController::class, 'store'])->name('filieres.store');
    Route::get('/filieres/{id}', [FiliereController::class, 'show'])->name('filieres.show');
    Route::get('/filieres/{id}/edit', [FiliereController::class, 'edit'])->name('filieres.edit');
    Route::put('/filieres/{id}', [FiliereController::class, 'update'])->name('filieres.update');
    Route::delete('/filieres/{id}', [FiliereController::class, 'destroy'])->name('filieres.destroy');

    Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');
    Route::get('/etudiants/create', [EtudiantController::class, 'create'])->name('etudiants.create');
    Route::post('/etudiants', [EtudiantController::class, 'store'])->name('etudiants.store');
    Route::get('/etudiants/{id}', [EtudiantController::class, 'show'])->name('etudiants.show');
    Route::get('/etudiants/{id}/edit', [EtudiantController::class, 'edit'])->name('etudiants.edit');
    Route::put('/etudiants/{id}', [EtudiantController::class, 'update'])->name('etudiants.update');
    Route::delete('/etudiants/{id}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy'); */

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
