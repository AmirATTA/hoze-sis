<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'link',
        'image',
        'status',
    ];
    protected $guarded = [
        'id', 
        'created_at', 
        'updated_at', 
    ];
}
