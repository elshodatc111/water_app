<?php

namespace App\Http\Controllers\Drektor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalansController extends Controller{

    public function index(){
        return view('Drektor.Balans.index');
    }

    public function paymart_history(){
        return view('Drektor.Balans.paymart_history');
    }

    public function order_history(){
        return view('Drektor.Balans.order_history');
    }

}
