<?php

namespace App\Http\Controllers\Hallowner;

use App\Http\Controllers\Controller;
use App\Models\Hallowner;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function show()
    {
        $hallowner = Hallowner::findorfail(auth('hallowner')->id());
        $halls = $hallowner->halls()->orderBy('id', 'DESC')->get();
        return view('hallowner.review.show', compact('halls'));
    }
}
