<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projetModel extends Model
{
    use HasFactory;
    protected $table = 'projets';
    protected $fillable = [
        'titre','description','duree','date_debut','prix'
    ];
    public function candidatures()
    {
        return $this->hasMany(CandidatureModel::class, 'projet_id');
    }
}
