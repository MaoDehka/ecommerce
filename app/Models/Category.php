<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'parent_id', 'description'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function allProducts()
    {
        $childrenIds = $this->children()->pluck('id')->toArray();
        return Product::whereIn('category_id', array_merge([$this->id], $childrenIds))->where('active', true);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getBreadcrumb()
    {
        $breadcrumb = collect([]);
        $category = $this;

        while ($category) {
            $breadcrumb->prepend([
                'name' => $category->name,
                'slug' => $category->slug,
                'id' => $category->id
            ]);
            $category = $category->parent;
        }

        return $breadcrumb;
    }
}