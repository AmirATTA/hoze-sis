<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'slug',
        'body',
        'image',
        'resource_label',
        'resource_url',
        'category_id',
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
