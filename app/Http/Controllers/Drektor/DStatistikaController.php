<?php

namespace App\Http\Controllers\Drektor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DStatistikaController extends Controller{

    public function index(){
        return view('Drektor.Statistika.index');
    }

}
