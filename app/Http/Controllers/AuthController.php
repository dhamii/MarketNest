<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register(){
        return view('auth.signup');
    }

    public function registerpost(Request $request){
        $incomingField = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNo' => 'required||max:12',
            'password' => 'required|min:8',
            'email' => 'required'
        ]);

        $incomingField['password'] = bcrypt($request->password);
        User::create($incomingField);
        return "Done";
    }
}
