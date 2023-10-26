<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerSkill extends Model
{
    protected $fillable = [
        'Skill_Name',
        'Proficiency',
    ];

    // Define the relationship with the FreelancerResume model
    public function resume()
    {
        return $this->belongsTo(FreelancerResume::class);
    }
}