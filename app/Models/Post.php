<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $guarded = [];

    protected $casts = [
        'tags' =>'array'
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
