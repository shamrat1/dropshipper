<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('productable')->orderBy('id', 'desc')->paginate(50);
        return view('admin.products.index', compact('products'));
    }
}
