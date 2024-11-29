<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    // Protect all routes to ensure only authenticated users can access them
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Toon alle teams die de ingelogde gebruiker bezit
    public function index()
    {
        // Fetch only the teams that belong to the authenticated user
        $teams = Team::where('user_id', Auth::id())->get();

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

        // Create a new team and associate it with the authenticated user
        $team = new Team();
        $team->name = $validated['name'];
        $team->user_id = Auth::id(); // Associate team with the logged-in user
        $team->save();

        return redirect()->route('teams.index')->with('success', 'Team succesvol aangemaakt!');
    }

    // Toon het formulier voor het bewerken van een team
    public function edit(Team $team)
    {
        // Ensure the user owns the team before showing the edit form
        $this->authorize('update', $team);

        return view('teams.edit', compact('team'));
    }

    // Werk het team bij
    public function update(Request $request, Team $team)
    {
        // Ensure the user owns the team before updating
        $this->authorize('update', $team);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $team->update($validated);

        return redirect()->route('teams.index')->with('success', 'Team succesvol bijgewerkt!');
    }

    // Toon een specifiek team
    public function show(Team $team)
    {
        // Ensure the user owns the team before showing it
        $this->authorize('view', $team);

        return view('teams.show', compact('team'));
    }

    // Verwijder het team
    public function destroy(Team $team)
    {
        // Ensure the user owns the team before deleting it
        $this->authorize('delete', $team);

        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team succesvol verwijderd!');
    }
}
