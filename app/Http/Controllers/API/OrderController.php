<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // dd(Order::where('user_id',request()->user())->latest());
        $orders = Order::where('user_id',request()->user())->latest()->paginate(15);
        return response()->json([
            'status' => 'success',
            'msg' => 'Recent Orders Fetched.',
            'data' => $orders
        ]);
    }

    public function show($no)
    {
        # code...
    }
}
