<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\UserCVDetail;

class UserprofileController extends Controller
{
    //
    public function __construct(){
        $this->middleware('seeker');
    }
    public function index(){
        return view('profile.index');
    }

    public function createcv(){
        return view('profile.mycvbuilder');
    }
    public function storecv(Request $request){
        //dd($request->all());
        UserCVDetail::create($request->all());
        return back();

    }

    public function store(Request $request){
        //request('address');

        /* validation */
        $this->validate($request,[
            'address'=>'required',
            'experience'=>'required|min:20',
            'bio'=>'required|min:20',
            'phone_number'=>'required|min:10|numeric'
            //'phone_number'=>'required|regex:/(98)[09]{8}'
        ]);


        $user_id =auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'experience'=>request('experience'),
            'bio'=>request('bio'),
            'phone_number'=>request('phone_number'),
        ]);
        return redirect()->back()->with('message','profile Sucessfully updated!');
    }

    public function coverletter(Request $request){

        $this->validate($request,[
            'cover_letter'=>'required|mimes:pdf,doc,docx|max:20000'
        ]);

        $user_id =auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'cover_letter' => $cover
        ]);
        return redirect()->back()->with('message','Cover Letter Sucessfully updated!');

    }

    public function resume(Request $request){

        $this->validate($request,[
            'resume'=>'required|mimes:pdf,doc,docx|max:20000'
        ]);
        $user_id =auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'resume' => $resume
        ]);
        return redirect()->back()->with('message','Resume Sucessfully updated!');

    }
/* ------------------------------- */
/* function for avatar */
/* ------------------------------- */
    public function avatar(Request $request){

        $this->validate($request,[
            'avatar'=>'required|mimes:jpg,jpeg,png|max:20000'
        ]);

        $user_id =auth()->user()->id;
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('upload/avatar/',$filename);

            Profile::where('user_id',$user_id)->update([
                'avatar' => $filename
            ]);
            return redirect()->back()->with('message','Profile picture Sucessfully updated!');
        }

    }


}

