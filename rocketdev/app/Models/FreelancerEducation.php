<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class FreelancerEducation extends Model
{
    protected $fillable = [
        'Degree',
        'Field_of_Study',
        'School',
        'From',
        'To',
        'Description',
    ];

    // Define the relationship with the FreelancerResume model
    public function resume()
    {
        return $this->belongsTo(FreelancerResume::class);
    }
}