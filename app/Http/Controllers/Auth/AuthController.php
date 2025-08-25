<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller{

    public function login(){
        return view('Auth.login');
    }

    public function postLogin(Request $request): RedirectResponse{
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user || !Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('login')->withError('Email yoki parol xato.');
        }
        if ($user->status !== 'true') {
            Auth::logout();
            return redirect()->route('login')->withError('Sizning tizimga kirishga bloklangansiz.');
        }
        if (in_array($user->type, ['user', 'currer'])) {
            Auth::logout();
            return redirect()->route('login')->withError('Siz tizimga kirishga ruxsat berilmagan.');
        }
        $request->session()->regenerate();
        return redirect()->intended('dashboard')->withSuccess('Tizimga muvaffaqiyatli kirdingiz.');
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
