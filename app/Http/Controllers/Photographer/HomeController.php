<?php

namespace App\Http\Controllers\Photographer;

use App\Http\Controllers\Controller;
use App\Models\Photographer;

class HomeController extends Controller
{

    protected $redirectTo = '/photographer/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('photographer.auth:photographer');
    }

    /**
     * Show the Photographer dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('photographer.home');
        $photographer = Photographer::findorfail(auth('photographer')->id());
        return view('photographer.profile.profile', compact('photographer'));
    }
}
