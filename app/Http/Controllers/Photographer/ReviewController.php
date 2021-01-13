<?php

namespace App\Http\Controllers\Photographer;

use App\Http\Controllers\Controller;
use App\Models\Photographer;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function show()
    {
        $photographer = Photographer::findorfail(auth('photographer')->id());
        $reviews = $photographer->reviews()->orderBy('id', 'DESC')->get();
        return view('photographer.review.show', compact('reviews'));
    }
}
