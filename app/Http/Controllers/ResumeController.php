<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCVDetail;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    //
    public function __construct(){
        $this->middleware('seeker');
    }

    public function index(){
        $users = UserCVDetail::where('user_id',auth()->user()->id)->get();
        //dd($users);
        return view('myresume',compact('users'));
    }
    public function download(){
        $users = UserCVDetail::where('user_id',auth()->user()->id)->get();
        $pdf = \PDF::loadView('myresume', compact('users'));
        return $pdf->download('resume.pdf');
    }
}

