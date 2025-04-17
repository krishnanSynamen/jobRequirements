<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = [
        'name'
    ];

    public function jobs() {
        return $this->belongsToMany(CareerJobs::class, 'career_job_skill', 'skills_id', 'job_id');
    }
}
