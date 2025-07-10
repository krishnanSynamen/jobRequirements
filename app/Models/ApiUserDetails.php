<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiUserDetails extends Model
{
    use HasFactory;

    protected $table = 'api_user_details';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
    ];
    public $timestamps = true;
    
}
