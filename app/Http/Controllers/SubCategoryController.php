<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SubCategory;


class SubCategoryController extends Controller
{
    
   //  function subcategory($id){
   //    $category = SubCategory::find($id)->category;
   //    $products = Product::whereIn('sub_category_id', $category->subcategories)->get();
   //    // dd($products);
   //    $related_products = Product::where('sub_category_id', '!=', $id)->where('sub_category_id', $products->category_id)->get();
   //    return view('front/pages/subcategory', compact('products', 'related_products')); 
   // }

    function subcategory($id){

      $products = Product::with('images')->paginate('10');
      return view('front/pages/product-view', compact('products'));
   }

}
