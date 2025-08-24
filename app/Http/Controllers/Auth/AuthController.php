<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{

    public function login(){
        return view('Auth.login');
    }

    public function postLogin(Request $request): RedirectResponse{
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->withSuccess('You have Successfully logged in');
        }
        return redirect("login")->withError('Oops! You have entered invalid credentials');
    }

    public function index(){
        if(Auth::check()){
            return view('index');
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function logout(Request $request): RedirectResponse{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->withSuccess('You have Successfully logged out');
    }



}
