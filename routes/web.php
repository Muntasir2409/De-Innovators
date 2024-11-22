<?php

use App\Http\Controllers\ProfileController;
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
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;


Route::get('teams/index', [TeamController::class, 'index'])->name('teams.index');    // Lijst van teams
Route::get('teams/create', [TeamController::class, 'create'])->name('teams.create');    // Formulier voor het aanmaken van een team
Route::post('teams', [TeamController::class, 'store'])->name('teams.store');    // Sla nieuw team op
Route::get('teams/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit');    // Formulier om team te bewerken
Route::put('teams/{team}', [TeamController::class, 'update'])->name('teams.update');    // Update team
Route::get('teams/{team}', [TeamController::class, 'show'])->name('teams.show');    // Toon team
Route::delete('teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');    // Verwijder team

// Route voor het toevoegen van een speler
Route::get('/teams/{team}/players/create', [PlayerController::class, 'create'])->name('players.create');

// Route voor het opslaan van een speler
Route::post('/teams/{team}/players', [PlayerController::class, 'store'])->name('players.store');


Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
