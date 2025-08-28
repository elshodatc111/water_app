<?php

namespace App\Http\Controllers\Drektor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreDrektorEmployeeRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateEmploesRequest;
use Illuminate\Support\Facades\Hash;

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
        $user = User::find($id);
        if (!$user || $user->company_id != auth()->user()->company_id) {
            return redirect()->route('error')->with('error', 'Hodim maʼlumotlari topilmadi. Yoki sizning firmangizga tegishli emas.');
        }
        return view('Drektor.Hodimlar.show',compact('user'));
    }

    public function emploes_password_update(UpdatePasswordRequest $request){
        $user = User::find($request->id);
        if (!$user || $user->company_id != auth()->user()->company_id) {
            return redirect()->route('error')->with('error', 'Hodim maʼlumotlari topilmadi. Yoki sizning firmangizga tegishli emas.');
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('success', 'Parol muvaffaqiyatli yangilandi.');
    }

    public function emploes_update(UpdateEmploesRequest $request){
        $user = User::find($request->id);
        if (!$user || $user->company_id != auth()->user()->company_id) {
            return redirect()->route('error')->with('error', 'Hodim maʼlumotlari topilmadi. Yoki sizning firmangizga tegishli emas.');
        }
        $user->update([
            'name'   => $request->name,
            'phone'  => $request->phone,
            'type'   => $request->type,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Foydalanuvchi maʼlumotlari yangilandi.');
    }

}
