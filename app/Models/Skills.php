<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    public function getCareerJob()
    {
        return $this->belongsToMany(CareerJobs::class, careerJobSkill::class);
    }
}
