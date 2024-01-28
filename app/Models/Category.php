<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'status',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
