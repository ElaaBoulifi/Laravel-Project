<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;
    protected $table = 'reponses';
    protected $fillable = [
        'reclamation_id', 
        'contenu', // Contenu de la réponse
        'date_reponse', // Date de la réponse
        'piece_jointe', // Pièces jointes de la réponse
    ];

    public function reclamation()
    {
        return $this->belongsTo(Reclamation::class, 'reclamation_id');
    }
    

}
