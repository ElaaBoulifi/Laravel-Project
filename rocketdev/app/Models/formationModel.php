<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formationModel extends Model
{
    use HasFactory;
    protected $table = 'formation';
    protected $fillable = [
        'titre','description','date_debut','date_fin','image','gategorie','prix'
    ];
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'id_formation');
    }
}
