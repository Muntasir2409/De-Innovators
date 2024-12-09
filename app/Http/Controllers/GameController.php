<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;

class GameController extends Controller
{
    // Index om alle wedstrijden weer te geven
    public function index()
    {
        // Haal alle games op met hun teams
        $games = Game::with(['team1', 'team2'])->get();
        return view('games.index', compact('games'));
    }

    // Genereer de wedstrijden
    public function generateGames()
    {
        // Haal alle teams op
        $teams = Team::all();

        // Maak een lege array voor de wedstrijden
        $games = [];

        // Genereer wedstrijden door teams willekeurig te koppelen
        for ($i = 0; $i < count($teams) / 2; $i++) {
            $team1 = $teams->random();
            $team2 = $teams->where('id', '!=', $team1->id)->random();

            // Maak een nieuwe wedstrijd aan
            $game = Game::create([
                'team1_id' => $team1->id,
                'team2_id' => $team2->id,
                'date' => now()->addDays(rand(1, 30)), // Willekeurige datum tussen nu en 30 dagen
            ]);

            $games[] = $game; // Voeg de wedstrijd toe aan de lijst
        }

        // Redirect naar de games.index met een succesbericht
        return redirect()->route('games.index')->with('success', 'Wedstrijden zijn succesvol gegenereerd!');
    }
}
