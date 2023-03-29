<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login() {
        if(Auth::check()) return view('dashboard');
        return view('login');
    }

    public function register() {
        if(Auth::check()) return view('dashboard');
        return view('register');
    }

    public function dashboard() {
        return view('dashboard');
    }
}
