<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Toon alle teams
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    // Toon het formulier voor het aanmaken van een team
    public function create()
    {
        return view('teams.create');
    }

    // Sla het nieuwe team op in de database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Team::create($validated);

        return redirect()->route('teams.index')->with('success', 'Team succesvol aangemaakt!');
    }

    // Toon het formulier voor het bewerken van een team
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    // Werk het team bij
    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $team->update($validated);

        return redirect()->route('teams.index')->with('success', 'Team succesvol bijgewerkt!');
    }

    // Toon een specifiek team
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    // Verwijder het team
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team succesvol verwijderd!');
    }
}
