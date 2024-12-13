<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\Standing;
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
    public function updateScore(Request $request, $id)
    {
        // Valideer de input
        $request->validate([
            'score_team1' => 'required|integer',
            'score_team2' => 'required|integer',
        ]);

        // Haal de game op
        $game = Game::findOrFail($id);

        // Update de scores van de teams
        $game->score_team1 = $request->score_team1;
        $game->score_team2 = $request->score_team2;

        // Bereken de punten voor elk team
        if ($game->score_team1 > $game->score_team2) {
            $game->points_team1 = 3;
            $game->points_team2 = 0;
        } elseif ($game->score_team1 < $game->score_team2) {
            $game->points_team1 = 0;
            $game->points_team2 = 3;
        } else {
            $game->points_team1 = 1;
            $game->points_team2 = 1;
        }

        // Sla de game op
        $game->save();

        // Werk de stand bij (na opslaan van de game)
        $this->updateStandings($game->team1_id);
        $this->updateStandings($game->team2_id);

        return redirect()->route('games.index')->with('success', 'Score succesvol bijgewerkt!');
    }

    public function updatestandings()
{
    // Haal alle teams op en bereken hun totale punten
    $teams = Team::withSum('gamesAsTeam1 as total_points_team1', 'points_team1') // Som van team1 punten
                ->withSum('gamesAsTeam2 as total_points_team2', 'points_team2') // Som van team2 punten
                ->get();

    // Voeg de punten van beide teams samen en werk het team bij
    foreach ($teams as $team) {
        $team->total_points = $team->total_points_team1 + $team->total_points_team2;
    }

    return view('standings', compact('teams'));
}
public function standings()
{
    // Haal alle teams op en bereken hun totale punten
    $teams = Team::withSum('gamesAsTeam1 as total_points_team1', 'points_team1') // Som van team1 punten
                ->withSum('gamesAsTeam2 as total_points_team2', 'points_team2') // Som van team2 punten
                ->get();

    // Voeg de punten van beide teams samen en werk het team bij
    foreach ($teams as $team) {
        $team->total_points = $team->total_points_team1 + $team->total_points_team2;
    }

    return view('standings', compact('teams'));
}

}
