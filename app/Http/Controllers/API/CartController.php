<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Http\Traits\CalculateCart;

class CartController extends Controller
{
    use CalculateCart;

    protected $user;

    private function getUser()
    {
        return request()->user();
    }

    public function index(){

        $cart = $this->calculateCart($this->getUser());
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
        Cart::create([
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'user_id' => request()->user()->id
        ]);
        
        return response()->json([
            'status' => 'success',
            'msg' => 'Cart data fetched',
            'data' => $this->calculateCart($this->getUser())
        ]);
    }

    public function increase($id){
        $item = Cart::find($id);
        $item->quantity += 1;
        $item->update();
        
        return response()->json([
            'status' => 'success',
            'msg' => 'Cart data increased',
            'data' => $this->calculateCart($this->getUser())
        ]);
    }

    public function decrease($id)
    {
        $item = Cart::find($id);
        $item->quantity -= 1;
        $item->update();

        return response()->json([
            'status' => 'success',
            'msg' => 'Cart data decrease',
            'data' => $this->calculateCart($this->getUser())
        ]);
    }

    public function destroy($id)
    {
        if(Cart::find($id)->delete()){
            return response()->json([
                'status' => 'success',
                'msg' => 'Cart data Deleted',
                'data' => $this->calculateCart($this->getUser())
            ]);
        }
        return response()->json(['status'=>'error deleting.'],400);
    }

}
