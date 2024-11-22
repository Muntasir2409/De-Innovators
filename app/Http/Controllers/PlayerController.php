<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Toon het formulier voor het toevoegen van een speler.
     */
    public function create(Team $team)
    {
        return view('players.create', compact('team'));
    }

    /**
     * Sla de nieuwe speler op.
     */
    public function store(Request $request, Team $team)
    {
        // Valideer de invoer
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'positie' => 'required|string|max:255',
            'rugnummer' => 'required|integer|min:1|max:99',
        ]);

        // Voeg de speler toe aan het team
        $team->players()->create($validated);

        // Redirect naar het team met een succesbericht
        return redirect()->route('teams.show', $team)->with('success', 'Speler succesvol toegevoegd!');
    }
}
