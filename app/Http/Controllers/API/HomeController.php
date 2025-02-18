<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class HomeController extends Controller{

    public function index()
    {
        $categories = Category::with('image')->get();
        $products = Product::with('images')->latest()->take(20)->get();
        $justForYou = Product::with('images')->inRandomOrder()->take(20)->get();
        return response()->json([
            'categories' => $categories,
            'products' => $products,
            'featured_products' => $justForYou
        ], 200);
    }
}