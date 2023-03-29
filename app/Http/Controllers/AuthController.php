<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function signIn(Request $request) {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials))
        return redirect('dashboard')->with('message', 'User loggedin Successfully');

        return redirect('/')->with('message', 'Invalid Credentials');
    }

    public function signUp(Request $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        return redirect('/')->with('message', 'User Created Successfully');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
