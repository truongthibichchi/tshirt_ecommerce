<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class userController extends Controller
{
    public function Login(){
        if(Auth::user()) 
            return redirect('admin/');
        else
            return view('admin.login');
    }

    public function LoginAuth(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return redirect('admin/');
        else
            return redirect('admin/login')->with('message','Log in failed!');
    }

    public function Logout(){
        Auth::logout();
        return redirect('admin/login');
    }
}
