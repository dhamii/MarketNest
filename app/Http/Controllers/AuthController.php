<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        $pageTitle = "Login";
        return view('auth.login', compact('pageTitle'));
    }

    public function register(){
        $pageTitle = "Register";
        return view('auth.signup', compact("pageTitle"));
    }

    public function registerpost(Request $request){
        $incomingField = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNo' => 'required|max:12',
            'password' => 'required|min:8',
            'email' => 'required'
        ]);

        $incomingField['password'] = bcrypt($request->password);
        // dd($incomingField);
        User::create($incomingField);
        return "Done";
    }

    public function loginpost(Request $request){
        $incomingField = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // dd($incomingField);
        if(auth()->attempt($incomingField)){
            return "In";
        }
        else{
            return "Out";
        }
    }
}
