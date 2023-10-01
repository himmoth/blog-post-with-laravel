<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){

        return view('auth.register');
    }


    public function store(Request $request){

    $formFields = $request->validate([

        'name' => 'required|min:2|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
        'profile' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

    ]);
        $formFields['password'] = \bcrypt($formFields['password']);

        if($request->hasFile('profile')){
             $formFields['profile'] = $request->file('profile')->store('profiles','public');
        }
   

    $user = User::create($formFields);

    // Login 
    auth()->login($user);
  

    return \redirect()->route('login')->with('success','Registered Success Please Login');
       
    }

     // Show login form 
    public function login(){

        return view('auth.login');
    }

    public function authenticate(Request $request){

    

        $formFields = $request->validate([
            'email' =>['required','email'],
            'password' =>'required'
        ]);
        
        $remember = $request->has('remember') ? true : false;
      
        if(auth()->attempt($formFields, $remember)){
            $request->session()->regenerate();

            return \redirect()->route('dashboard')->with('success','You are login now !');
        }
        return back()->with('error','Incorrect email or password');

    }

    public function logout(Request $request){
        
        Auth::logout() ;
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return \redirect('/');

    }
}
