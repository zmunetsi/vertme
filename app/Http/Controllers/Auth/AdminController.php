<?php

//add admin controller
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use auth
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{ 
    public function login(Request $request)
    {
        return view('auth.admin.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('admin');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    public function  logout ( Request $request) {

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('admin/login');

    }
}