<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;
    protected $table = 'reponse';
    protected $fillable = [
        'reclamation_id', 
        'content', // Contenu de la réponse
        'response_date', // Date de la réponse
        'response_status', // État de la réponse
        'piece_jointe', // Pièces jointes de la réponse
    ];

    public function reclamation()
    {
        return $this->belongsTo(Reclamation::class);
    }

}
