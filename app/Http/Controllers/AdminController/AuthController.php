<?php

namespace App\Http\Controllers\AdminController;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // dd($request);
        $incomingField = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        // dd($incomingField);
        $user= User::where('firstName', $incomingField['name'])->first();
        if(!$user){
            dd('this user doesnt exist');
        }
        else{
            // dd(auth()->check());
            dd(auth()->attempt($incomingField));
            if (auth()->attempt($incomingField) && $user->role == "admin") {
            return "Logged in";
        } else {
            return "Attempt failed";
        }
        }
        // dd( $userrole);
    }
}