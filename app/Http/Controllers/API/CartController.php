<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Http\Traits\CalculateCart;

class CartController extends Controller
{
    use CalculateCart;
    public function index(){

        $cart = $this->calculateCart(request()->user());
        return response()->json([
            'status' => 'success',
            'msg' => 'Cart Fetched successfully',
            'data' => $cart
            ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request,[
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric'
        ]);
        $cart = Cart::create([
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'user_id' => request()->user()->id
        ]);
        
        return response()->json([
            'status' => 'Cart Updated'
        ]);
    }

    public function increase($id){
        $item = Cart::find($id);
        $item->quantity += 1;
        $item->update();
        
        return response()->json([
            'status' => 'Quantity increased.',
            'quantity' => $item->quantity
        ]);
    }

    public function decrease($id)
    {
        $item = Cart::find($id);
        $item->quantity -= 1;
        $item->update();
        return response()->json([
            'status' => 'Quantity increased.',
            'quantity' => $item->quantity
        ]);
    }

    public function destroy($id)
    {
        if(Cart::find($id)->delete()){
            return response()->json(['status'=>'success']);
        }
        return response()->json(['status'=>'error deleting.'],400);
    }

}
