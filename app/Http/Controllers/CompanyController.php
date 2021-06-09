<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index($id, Company $company){
        return view('company.index', compact('company'));
    }
    public function create(){
        return view('company.create');
    }


    public function store(Request $request){
        //request('address');

        /* validation */
      /*   $this->validate($request,[
            'address'=>'required',
            'experience'=>'required|min:20',
            'bio'=>'required|min:20',
            'phone_number'=>'required|min:10|numeric' */
            //'phone_number'=>'required|regex:/(98)[09]{8}'
       /*  ]); */


        $user_id =auth()->user()->id;
        Company::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'website'=>request('website'),
            'slogan'=>request('slogan'),
            'description'=>request('description'),
            'phone'=>request('phone'),
        ]);
        return redirect()->back()->with('message','Company Sucessfully updated!');
    }



    public function coverphoto(Request $request){

        $user_id =auth()->user()->id;
        if($request->hasfile('cove_photo')){
            $file = $request->file('cove_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('upload/coverphoto/',$filename);

            Company::where('user_id',$user_id)->update([
                'cover_photo' => $filename
            ]);
            return redirect()->back()->with('message','Cover Photo Sucessfully updated!');
        }

    }

    public function companylogo(Request $request){

        $user_id =auth()->user()->id;
        if($request->hasfile('logo')){
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('upload/logo/',$filename);

            Company::where('user_id',$user_id)->update([
                'logo' => $filename
            ]);
            return redirect()->back()->with('message','Logo Sucessfully updated!');
        }

    }

}
