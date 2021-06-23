<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified','auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->user_type=='employer'){
            return redirect('/company/create');
            }
        $adminRole = Auth::user()->user_type=='admin';
        if(Auth::user()->user_type=='admin'){
        return redirect('/dashboard');
        }

        $jobs=Auth::user()->favourites;
        return view('home',compact('jobs'));
    }
}
