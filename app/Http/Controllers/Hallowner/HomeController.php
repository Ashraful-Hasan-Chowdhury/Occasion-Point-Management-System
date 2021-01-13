<?php

namespace App\Http\Controllers\Hallowner;

use App\Http\Controllers\Controller;
use App\Models\Hallowner;

class HomeController extends Controller
{

    protected $redirectTo = '/hallowner/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('hallowner.auth:hallowner');
    }

    /**
     * Show the Hallowner dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('hallowner.home');
        $hallowner = Hallowner::findorfail(auth('hallowner')->id());
        return view('hallowner.profile.profile', compact('hallowner'));
    }
}
