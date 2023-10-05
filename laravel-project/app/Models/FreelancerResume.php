<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class FreelancerResume extends Model
{
    protected $fillable = [
        'Name',
        'Email',
        'Profession_Title',
        'Location',
        'Web',
        'Per_Hour',
        'Age',
    ];

    // Define relationships with other tables
    public function education()
    {
        return $this->hasMany(FreelancerEducation::class);
    }

    public function workExperience()
    {
        return $this->hasMany(FreelancerWorkExperience::class);
    }

    public function skills()
    {
        return $this->hasMany(FreelancerSkill::class);
    }
}