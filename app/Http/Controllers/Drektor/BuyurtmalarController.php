<?php

namespace App\Http\Controllers\Drektor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyurtmalarController extends Controller{

    public function index(){
        return view('Drektor.Buyurtmalar.index');
    }

    public function index_pedding(){
        return view('Drektor.Buyurtmalar.pedding');
    }

    public function index_success(){
        return view('Drektor.Buyurtmalar.success');
    }

    public function show($id){
        return view('Drektor.Buyurtmalar.show');
    }


}
