<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;

class CartController extends Controller
{
    public function index(){
        $items = Cart::with(['product','user'])->latest()->paginate(15);
        return view('admin.cart.index',compact('items'));
    }
}
