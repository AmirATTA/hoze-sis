<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'featured',
        'title',
        'subtitle',
        'summary',
        'slug',
        'body',
        'image',
        'published_at',
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

    protected $appends = ['image_url'];
    
    public function getImageUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->attributes['image']);
    }

    public function attachTags(?array $tagNames, $onUpdate = false)
    {
        if($tagNames != null) {
            $tagIds = [];
    
            foreach ($tagNames as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
    
                $tagIds[] = $tag->id;
                
                if($onUpdate == true) {
                    $this->tags()->sync($tagIds);
                } else {
                    $this->tags()->attach($tag->id);
                }
            }
        }
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
