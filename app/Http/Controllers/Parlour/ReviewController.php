<?php

namespace App\Http\Controllers\Parlour;

use App\Http\Controllers\Controller;
use App\Models\Parlour;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function show()
    {
        $parlour = Parlour::findorfail(auth('parlour')->id());
        $reviews = $parlour->reviews()->orderBy('id', 'DESC')->get();
        return view('parlour.review.show', compact('reviews'));
    }
}
