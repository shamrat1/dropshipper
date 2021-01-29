<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user'])->paginate(15);
        return view('admin.orders.index',compact('orders'));
    }
}
