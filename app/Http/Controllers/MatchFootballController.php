<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatchFootball;
use App\Models\Team;
use App\Models\Tournament;

class MatchFootballController extends Controller
{
    public function create()
    {
        // Récupérer les équipes et les tournois pour les utiliser dans le formulaire de création
        $teams = Team::all();
        $tournaments = Tournament::all();

        return view('matches_football.create', compact('teams', 'tournaments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teamA_id' => 'required|exists:teams,id',
            'teamB_id' => 'required|exists:teams,id',
            'tournament_id' => 'required|exists:tournaments,id',
            'dateOfMatch' => 'required|date',
            // Ajoutez d'autres règles de validation en fonction de vos besoins
        ]);

        MatchFootball::create($request->all());

        return redirect()->route('tournaments.show', $request->tournament_id)
            ->with('success', 'Le match de football a été créé avec succès !');
    }
}
