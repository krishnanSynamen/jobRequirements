<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationDetails extends Model
{
    use HasFactory;

    protected $table = 'application_details';
    protected $primaryKey = 'application_details_id';
    protected $guarded = [];

    public $timestamps = false;

    public static function storeResume($data)
    {
        return self::create($data);
    }

    public static function getAplicationData()
    {
        return self::where('status', '!=', 'D')
                        ->orderBy('application_details_id', 'desc')
                        ->get()->toArray();
    }

    public static function updateAplicationData($id, $updateData)
    {
        return self::where('application_details_id', $id)
                        ->update($updateData);
    }
}
