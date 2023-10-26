<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    protected $table = 'reclamations';
    protected $fillable = [
        'sujet', 'description', 'date_soumission','categorie','evaluation','piece_jointe', 'etat',
    ];

    public function reponse()
    {
        return $this->hasOne(Reponse::class);
    }


}
