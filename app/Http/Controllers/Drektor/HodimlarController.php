<?php

namespace App\Http\Controllers\Drektor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HodimlarController extends Controller{

    public function index(){
        return view('Drektor.Hodimlar.index');
    }

}
