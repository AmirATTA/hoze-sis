<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'subtitle',
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
