<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['product','user'])->paginate(20);
        return view('admin.reviews.index',compact([
            'reviews'
        ]));
    }

    public function approvalToggle($id)
    {
        $review = Review::findOrFail($id);
        $review->isApproved = !$review->isApproved;
        $review->update();
        return redirect()->back()->with('success','Review Updated');
    }

    public function delete($id)
    {
        Review::findOrFail($id)->delete();
        return redirect()->back()->with('success','Review Deleted');

    }

}
