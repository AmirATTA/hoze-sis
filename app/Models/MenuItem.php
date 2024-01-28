<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'menu_group_id',
        'link',
        'linkable_id',
        'linkable_type',
        'order',
        'new_tab',
        'status',
    ];
    protected $guarded = [
        'id', 
        'created_at', 
        'updated_at', 
    ];
    
    public function menuGroups()
    {
        return $this->belongsTo(MenuGroup::class, 'menu_group_id');

    }
}
