<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\formationModel;
class Inscription extends Model
{

    use HasFactory;
    protected $table = 'inscription';
    protected $fillable = [
        'nom','prenom','email','date_insription','etat','id_formation'
    ];
    public function formation()
    {
        return $this->belongsTo(formationModel::class, 'id_formation');
    }
}
