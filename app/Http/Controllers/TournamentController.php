<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TournamentController extends Controller
{
    // Afficher la liste des tournois
    public function index()
    {
        $tournaments = Tournament::all();
        return view('tournaments.index', compact('tournaments'));
    }

    // Afficher le formulaire pour créer un nouveau tournoi
    public function create()
    {
        return view('tournaments.create');
    }

    // Enregistrer un nouveau tournoi dans la base de données
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nameTournament' => 'required|string',
                'type' => 'required|in:basket,football',
                'type_tournoi' => 'required|in:interclasse,national',
                'description' => 'nullable|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);
    
            $tournament = Tournament::create($request->all());
    
            if ($request->type === 'basket') {
                return redirect()->route('matches.basketball.create', ['tournament_id' => $tournament->id])
                                 ->with('success', 'Le tournoi a été créé avec succès !');
            } else if ($request->type === 'football') {
                return redirect()->route('matches.football.create', ['tournament_id' => $tournament->id])
                                 ->with('success', 'Le tournoi a été créé avec succès !');
            }
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du tournoi : ' . $e->getMessage());
        }
    }
    

    // Afficher les détails d'un tournoi
    public function show($id)
    {
        $tournament = Tournament::findOrFail($id);
        return view('tournaments.show', compact('tournament'));
    }

    // Afficher le formulaire pour modifier un tournoi existant
    public function edit($id)
    {
        $tournament = Tournament::findOrFail($id);
        return view('tournaments.edit', compact('tournament'));
    }

    // Mettre à jour les informations d'un tournoi dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'nameTournament' => 'required|string',
            'type' => 'required|in:basket,football', // Ajout de la validation pour le type
            'type_tournoi' => 'required|in:interclasse,national',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        $tournament = Tournament::findOrFail($id);
        $tournament->update($request->all());
    
        return redirect()->route('tournaments.index')->with('success', 'Le tournoi a été mis à jour avec succès !');
    }
    

    // Supprimer un tournoi de la base de données
    public function destroy($id)
    {
        $tournament = Tournament::findOrFail($id);
        $tournament->delete();

        return redirect()->route('tournaments.index')->with('success', 'Le tournoi a été supprimé avec succès !');
    }
}
