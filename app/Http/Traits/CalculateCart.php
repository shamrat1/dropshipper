<?php
namespace App\Http\Traits;

use App\Cart;
use App\User;

/**
 * New Company User Password notification through email
 */
trait CalculateCart
{

    public function calculateCart(User $user)
    {
        $cartItems = Cart::where('user_id',$user->id)->with('product')->get();
        foreach($cartItems as $item){
            $this->calculateProduct($item);
        }

        return $this->decorateCart($cartItems);
    }

    protected function calculateProduct($item)
    {
        if($item->product->isPublished){
            $item->price = intval($item->product->price) * intval($item->quantity);
        }
    }

    protected function decorateCart($items)
    {
        $cart['products'] = $items;
        $cart['subtotal'] = $items->sum('price');
        $cart['delivery_charge'] = 10;
        $cart['coupon_value'] = 0;
        $cart['coupon'] = null;
        $cart['total'] = $cart['delivery_charge'] + $cart['subtotal'] + $cart['coupon_value'];
        return $cart;
    }
}

?>