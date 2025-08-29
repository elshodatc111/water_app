<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateAdminProfileRequest;
use App\Http\Requests\UpdateAdminPasswordProfileRequest;

class AdminProfileController extends Controller{

    public function index(){
        return view('Company.Profile.index');
    }

    public function update(UpdateAdminProfileRequest $request){
        $user = auth()->user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back()->with('success', 'Profil yangilandi!');
    }

    public function update_password(UpdateAdminPasswordProfileRequest $request){
        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Hozirgi parol noto‘g‘ri.');
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return back()->with('success', 'Parol muvaffaqiyatli yangilandi!');
    }

}
