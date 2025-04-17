<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerJobs extends Model
{
    use HasFactory;

    protected $table = 'career_jobs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type',
        'title',
        'slug',
        'description',
        'qualification',
        'vacancy',
        'is_active'
    ];


    public function careerApplications() {
        return $this->hasMany(CareerApplication::class, 'job_id');
    }
    
    public function skills() {
        return $this->belongsToMany(Skill::class, 'career_job_skill', 'job_id', 'skills_id');
    }
}
