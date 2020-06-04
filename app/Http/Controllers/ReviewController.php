<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function index(){
        $reviews = Review::with(['user','post'])->paginate();
        return view('admin.reviews.reviews')->with([
            'reviews' => $reviews
        ]);
    }
    public function show($id){
        $review = Review::with(['post','user'])->find($id);
        return view('admin.reviews.review')->with([
            'review' => $review
        ]);
    }
}
