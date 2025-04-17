<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    use HasFactory;

    protected $table = 'career_applications';

    protected $fillable = [
        'user_id',
        'job_id',
        'track_id',
        'name',
        'email',
        'cover_letter',
        'current_ctc',
        'expected_ctc',
        'notice_period',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id');
    }

    public function careerJob() {
        return $this->belongsTo(CareerJobs::class, 'id');
    }
}
