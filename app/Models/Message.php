<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    protected $primaryKey = 'id_message'; // Remplacez 'id_message' par le nom de votre clé primaire

    protected $fillable = [
        'id_user_send',
        'id_user_receive',
        'message',
        'statut_message',
        'deleted_by',
    ];

    // Vous pouvez ajouter d'autres propriétés, relations, ou méthodes ici si nécessaire
}
