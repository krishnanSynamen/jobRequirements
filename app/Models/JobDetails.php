<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetails extends Model
{
    use HasFactory;

    protected $table = 'job_details';
    protected $primaryKey = 'job_details_id';
    protected $guarded = [];

    public $timestamps = false;

    public static function storeJobDetails($data)
    {
        return self::create($data);
    }

    public static function jobJobDetails()
    {
        return self::where('status', 'A')->get()->toArray();
    }

    public static function getSelectedJobDetails($jobId)
    {
        return self::where('status', 'A')
                        ->where('job_details_id', $jobId)
                        // ->get()
                        ->First();
    }
}
