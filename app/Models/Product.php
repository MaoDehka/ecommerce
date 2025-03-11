<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'price', 'active', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getBreadcrumb()
    {
        $breadcrumb = $this->category->getBreadcrumb();
        
        $breadcrumb->push([
            'name' => $this->name,
            'slug' => $this->slug,
            'id' => $this->id
        ]);

        return $breadcrumb;
    }

    public function getSimilarProducts($limit = 5)
    {
        return Product::where('category_id', $this->category_id)
            ->where('id', '!=', $this->id)
            ->where('active', true)
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }
}