<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;
use Validator;

class ReviewController extends Controller
{
    public function store(Request $request,$productID)
    {
        $validator = Validator::make($request,[
            'review' => 'required|string|min:6',
            'rating' => 'required|numeric|between:1,5'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 'failed',
                'msg' => 'New review creation failed',
                'data' => $validator->errors()
            ],422);
        }
        $user = request()->user();
        Review::create([
            'user_id' => $user->id,
            'product_id' => $productID,
            'review' => $request->review,
            'rating' => $request->rating,
            'isApproved' => false
        ]);
        return response()->json([
            'status' => 'success',
            'msg' => 'New review creation succeded',
            'data' => []
        ],200);
    }
}
