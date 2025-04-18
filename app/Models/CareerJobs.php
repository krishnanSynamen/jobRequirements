<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerJobs extends Model
{
    use HasFactory;

    public function getSkillS()
    {
        return $this->belongsToMany(Skills::class, careerJobSkill::class);
    }
}
