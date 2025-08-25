<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller{

    public function index(){
        return view('Company.Profile.index');
    }

}
