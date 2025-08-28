<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller{
    public function index(){
        return view('dashboard');
    }

    public function error(){
        return view('error.index');
    }

}
