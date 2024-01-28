<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'slug',
        'body',
        'image',
        'published_at',
        'user_id',
        'status',
    ];
    protected $guarded = [
        'id', 
        'created_at', 
        'updated_at', 
        'views_count',
    ];
}
