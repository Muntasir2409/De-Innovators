<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AdminController;
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
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\GameController;

Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/generate-games', [GameController::class, 'generateGames'])->name('games.generate');

Route::post('/games/{id}/update', [GameController::class, 'updateScore'])->name('games.update');

Route::get('/standings', [GameController::class, 'standings'])->name('games.standings');


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


// General Public Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.index');
});



require __DIR__ . '/auth.php';

// Team Routes
Route::get('teams/index', [TeamController::class, 'index'])->name('teams.index');
Route::get('teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::post('teams', [TeamController::class, 'store'])->name('teams.store');
Route::get('teams/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit');
Route::put('teams/{team}', [TeamController::class, 'update'])->name('teams.update');
Route::get('teams/{team}', [TeamController::class, 'show'])->name('teams.show');
Route::delete('teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');

// Player Routes
Route::get('/teams/{team}/players/create', [PlayerController::class, 'create'])->name('players.create');
Route::post('/teams/{team}/players', [PlayerController::class, 'store'])->name('players.store');

//Admin Routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.users');
Route::put('/admin/users/{user}/update-role', [AdminController::class, 'updateRole'])->name('admin.users.updateRole');

// Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
