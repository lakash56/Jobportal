<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class EmployerRegisterController extends Controller
{
    //
    public function employerRegister(){
        $user = User::create([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type'=>request('user_type') ?? 'employer',
        ]);

        Company::create([
            'user_id'=>$user->id,
            'cname' => request('cname'),
            'slug'=>request('cname')

        ]);
        return redirect()->to('login');
    }
}
