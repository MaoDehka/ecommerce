<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('active', true)
            ->inRandomOrder()
            ->limit(5)
            ->get();
        
        $rootCategories = Category::whereNull('parent_id')->get();
        
        return view('home', compact('featuredProducts', 'rootCategories'));
    }
}
