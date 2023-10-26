<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FreelancerWorkExperience extends Model
{
    protected $fillable = [
        'Company_Name',
        'Title',
        'Date_From',
        'Date_To',
        'Description',
    ];

    // Define the relationship with the FreelancerResume model
    public function resume()
    {
        return $this->belongsTo(FreelancerResume::class);
    }
}