<?php

namespace App\Http\Controllers;

use App\Bussiness;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\SiteImage;
use App\Product;
use App\ProductExtraFeatures;
use App\Orders;
use App\Comments;
use App\Reviews;
use App\Cart;
use App\User;
use Auth;


class FrontEndController extends Controller
{
   protected $cart = null;
   private $user;
   public function __construct()
   {
      $this->middleware(function($request,$next){
         // $user = User::where('email', 'admin@admin.com')->first();
         // Auth::login($user);
         $this->user = auth()->check() ? auth()->user() : null;
         if (!empty($this->user)) {
            $this->cart = Cart::with('product','product.images')->where('user_id', $this->user->id)->get();
         }
         return $next($request);
      });
   }

    // Front End Controller
   public function index(){
      $cart = $this->cart;
      $categories = Category::with('subcategories')->get();
      $products = Product::with('images','subCategory', 'subCategory.category')->paginate('10');
      // dd($products);
      return view('front/home', compact('categories','products','cart'));
   }

   public function subcategory($id)
   {
      $cart = $this->cart;
      $products = Product::with('images')->paginate('10');
      return view('front/pages/subcategory', compact('products','cart'));
   }

   public function product($id)
   {
      $cart = $this->cart;
      $products = Product::with('images')->paginate('10');
      return view('front/pages/product-view', compact('products','cart'));
   }

   public function business(){   
   $cart = $this->cart;
   $business = Bussiness::get();
      return view('front/pages/business-around', compact('cart','business'));
   }

}
