<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    use HasFactory;
    protected $table = 'candidatures';
    protected $fillable = [
        'nom','prenom','email','tel','event_id'
    ];
    public function event()
    {
        return $this->belongsTo(Events::class, 'event_id');
    }
}
