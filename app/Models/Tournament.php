<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = ['nameTournament', 'description','type','type_tournoi', 'start_date', 'end_date'];

    // Vous pouvez ajouter d'autres propriétés et méthodes au modèle si nécessaire

    // Exemple d'une méthode pour récupérer tous les tournois
    public static function getAllTournaments()
    {
        return self::all();
    }
}
