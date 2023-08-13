<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameTeam',
        'idPlayer1',
        'idPlayer2',
        'idPlayer3',
        'idPlayer4',
        'idPlayer5',
        'idPlayer6',
        'idPlayer7',
        'idPlayer8',
        'idPlayer9',
        'idPlayer10',
        'idPlayer11',
        'idPlayer12',
        'idPlayer13',
        'idPlayer14',
        'idPlayer15',
        'idPlayer16',
        'idPlayer17',
        'idPlayer18',
    ];

    // Ajoutez des relations avec d'autres modèles ici si nécessaire
}
