<?php

namespace App\Http\Controllers\Drektor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreDrektorEmployeeRequest;

class HodimlarController extends Controller{

    public function index(){
        $users = User::where('company_id',auth()->user()->company_id)->where('type','!=','admin')->where('type','!=','user')->get();
        return view('Drektor.Hodimlar.index',compact('users'));
    }

    public function create(StoreDrektorEmployeeRequest $request){
        User::create([
            'company_id' => auth()->user()->company_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'type' => $request->type,
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'true',
        ]);
        return redirect()->back()->with('success', 'Hodim muvaffaqiyatli saqlandi!');
    }

    public function show($id){
        return view('Drektor.Hodimlar.show');
    }

}
