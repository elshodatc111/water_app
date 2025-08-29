<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminSettingCreateRequest;

class AdminSettingController extends Controller{

    public function index(){
        $users = User::where('type','admin')->where('id','!=',auth()->user()->id)->get();
        return view("Company.Setting.index",compact('users'));
    }

    public function show($id){
        return view("Company.Setting.show");
    }

    public function store(AdminSettingCreateRequest $request){
        $data = $request->validated();
        $data['company_id'] = 1;
        $data['type'] = 'admin';
        $data['password'] = Hash::make('password');
        $data['status'] = 'true';
        User::create($data);
        return redirect()->back()->with('success', 'Foydalanuvchi muvaffaqiyatli saqlandi! Yangi parol password');
    }

}
