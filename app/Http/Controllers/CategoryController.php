<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        
        if (!$category) {
            abort(404);
        }
        
        if ($category->slug !== $slug) {
            return redirect()->route('category.show', $category->slug);
        }
        
        $breadcrumb = $category->getBreadcrumb();
        $childCategories = $category->children;
        
        $products = $category->allProducts()->paginate(12);
        
        return view('category', compact('category', 'breadcrumb', 'childCategories', 'products'));
    }
}
