<?php

namespace App\Http\Controllers\Parlour;

use App\Http\Controllers\Controller;
use App\Models\Parlour;

class HomeController extends Controller
{

    protected $redirectTo = '/parlour/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('parlour.auth:parlour');
    }

    /**
     * Show the Parlour dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('parlour.home');
        $parlour = Parlour::findorfail(auth('parlour')->id());
        return view('parlour.profile.profile', compact('parlour'));
    }
}
