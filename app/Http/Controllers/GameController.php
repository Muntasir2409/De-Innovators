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
        $teams = Team::all();

        // Controleer of er voldoende teams zijn om wedstrijden te maken
        if ($teams->count() < 2) {
            return redirect()->route('games.index')->with('error', 'Niet genoeg teams om wedstrijden te genereren.');
        }

        // Willekeurige volgorde van teams om wedstrijden te mixen
        $shuffledTeams = $teams->shuffle();
        $games = [];

        // Koppel teams in paren
        for ($i = 0; $i < $shuffledTeams->count() - 1; $i += 2) {
            $team1 = $shuffledTeams[$i];
            $team2 = $shuffledTeams[$i + 1];

            $games[] = [
                'team1_id' => $team1->id,
                'team2_id' => $team2->id,
                'date' => now()->addDays(rand(1, 7)), // Datum binnen de komende week
            ];
        }

        // Als er een oneven aantal teams is, krijgt het laatste team een 'bye'
        if ($shuffledTeams->count() % 2 !== 0) {
            $lastTeam = $shuffledTeams->last();
            $games[] = [
                'team1_id' => $lastTeam->id,
                'team2_id' => null, // Vrije ronde
                'date' => now()->addDays(rand(1, 7)),
            ];
        }

        // Wedstrijden opslaan in de database
        foreach ($games as $game) {
            Game::create($game);
        }

        return redirect()->route('games.index')->with('success', 'Wedstrijden succesvol gegenereerd!');
    }
}
