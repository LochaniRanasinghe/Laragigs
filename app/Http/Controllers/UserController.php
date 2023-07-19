<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show Register/Create Form
    public function create(){
        return view('users.register');
    }

    //Create a new user
    public function store(Request $request){
        $formFields = $request->validate([
        'name' => ['required', 'min:3'],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => ['required', 'min:6', 'confirmed'],
    ]);

        //Hashpassword
        $formFields['password']=bcrypt($formFields['password']);

        //Create user
        $user=User::create($formFields);
    
        //Login user
        auth()->login($user);

        //Redirect
        return redirect('/')->with('message','User Created and logged in Successfully');
    }

    //Logout user
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('message','User Logged out Successfully');
    }

    //Show Login Form
    public function login(){
        return view('users.login');
    }

    //Save loigin details
    public function authenticate(Request $request){
        
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to login
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            // Redirect
            return redirect('/')->with('message', 'User Logged in Successfully');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}