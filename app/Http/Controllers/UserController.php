<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\User;
use Auth;
use Hash;
class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function signup()
    {
        return view('signup');
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $new = new User();
        $new->name=$request->name;
        $new->email=$request->email;
        $new->password=Hash::make($request->password);
        $new->save();
        return redirect()->back()->with('success','add');
    }  
    public function doLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|max:16'
        ],
        [
            'email.required'=>'Email is Required',
            'email.email'=>'Please Enter Valid Email',
            'password.required'=>'Password is Required',
            'password.min'=>'Password Minimum 8 Characters',
            'password.max'=>'Password Maximum 16 Characters',
        ]
        );

        $check=$request->only('email','password');
        if(Auth::guard('register')->attempt($check)) {
            return redirect()->route('user.dashboard')->with('success','Welcome to home page');
        }
        else {
            return redirect()->back()->with('error','email and password invalid');
        }
    }
    public function logout()
    {
        if(Auth::guard('register')->user())
        {
            Auth::guard('register')->logout();
        }
        return redirect()->route('login-page');
    }
    public function dashboard()
    {
        return view('home');
    }
    public function admin_profile()
    {
        $data=null;
        return view('admin_profile',compact('data'));
    }

}