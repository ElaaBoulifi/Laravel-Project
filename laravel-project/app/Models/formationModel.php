<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formationModel extends Model
{
    use HasFactory;
    protected $table = 'formation';
    protected $fillable = [
        'titre','description','duree','date_debut','image','prix'
    ];
}
