<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'titre','lieu','desc','image'
    ];


    public function participants()
    {
        return $this->hasMany(Participate::class, 'event_id');
    }
}
