<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        
        if (!$product || !$product->active) {
            abort(404);
        }
        
        if ($product->slug !== $slug) {
            return redirect()->route('product.show', $product->slug);
        }
        
        $breadcrumb = $product->getBreadcrumb();
        $similarProducts = $product->getSimilarProducts();
        
        return view('product', compact('product', 'breadcrumb', 'similarProducts'));
    }
}