<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Binafy\LaravelCart\Cartable; 

class Product extends Model implements Cartable 
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'sku',
        'price',
        'stock',
        'image_url',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function getImageUrlAttribute()
    {
        if ($this->attributes['image_url']) {
            return Storage::url($this->attributes['image_url']);
        } else {
            return null;
        }
    }

    public function getPrice(): float 
    { 
        return $this->price; 
    } 
}