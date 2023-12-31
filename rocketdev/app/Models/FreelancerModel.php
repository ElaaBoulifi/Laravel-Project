<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerModel extends Model
{
    use HasFactory;
    protected $table = 'freelancers';
    protected $fillable = ['nom', 'prenom', 'specialite', 'disponibilite'];
}