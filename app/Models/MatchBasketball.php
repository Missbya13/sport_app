<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchBasketball extends Model
{
    use HasFactory;

    protected $table = 'matches_basketball';

    protected $fillable = [
        'idTeamA',
        'idTeamB',
        'scoreTeamA',
        'scoreTeamB',
        'dateOfMatch',
        'id_tournoi',
    ];

    public function teamA()
    {
        return $this->belongsTo(Team::class, 'idTeamA');
    }

    public function teamB()
    {
        return $this->belongsTo(Team::class, 'idTeamB');
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class, 'id_tournoi');
    }
}
