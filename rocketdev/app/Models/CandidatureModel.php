<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CandidatureModel extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'candidatures';
    protected $fillable = [
        'nom','prenom','email','cv','lettre_motivation','tel','projet_id'
    ];
    public function projet()
    {
        return $this->belongsTo(projetModel::class, 'projet_id');
    }
    
}
