<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use App\Models\BalanceHistory;
use App\Models\CompanyItem;
use App\Http\Requests\StoreCompanyItemRequest;
use App\Http\Requests\StoreEmployeeRequest;

class AdminCompanyItemController extends Controller{

    public function company_item($id){
        $CompanyItem = CompanyItem::where('company_id',$id)->get();
        return view('Company.Admin.Item.company_item',compact('id','CompanyItem'));
    }
    public function company_item_create(StoreCompanyItemRequest $request){
        $data = $request->validated();
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('images');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $image->move($destination, $fileName);
            $imagePath = 'images/' . $fileName;
        }
        CompanyItem::create([
            'company_id' => $request->company_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
        ]);
        return redirect()->back()->with('success', 'Mahsulot muvaffaqiyatli saqlandi!');
    }
    public function company_item_setstade(Request $request){
        $company_id = $request->company_id;
        $CompanyItem = CompanyItem::findOrFail($company_id);
        if($CompanyItem->status == 'true'){
            $CompanyItem->status = 'false';
        }else{
            $CompanyItem->status = 'true';
        }
        $CompanyItem->save();
        return redirect()->back()->with('success', 'Mahsulot statusi yangilandi!');
    }

    public function company_hodim($id){
        $Users = User::where('company_id',$id)->where('type','!=','user')->where('type','!=','admin')->get();
        return view('Company.Admin.Item.company_hodim',compact('id','Users'));
    }
    public function company_hodim_setstade(Request $request){
        $user_id = $request->user_id;
        $User = User::findOrFail($user_id);
        if($User->status == 'true'){
            $User->status = 'false';
        }else{
            $User->status = 'true';
        }
        $User->save();
        return redirect()->back()->with('success', 'Hodim yangilandi!');
    }


    public function company_hodim_creates(StoreEmployeeRequest $request){
        $data = $request->validated();
        User::create([
            'company_id' => $data['company_id'],
            'name'       => $data['name'],
            'phone'      => $data['phone'],
            'type'       => $data['type'],
            'email'      => $data['email'],
            'password'   => Hash::make('password'),
            'status'     => true,
        ]);
        return redirect()->back()->with('success', 'Hodim muvaffaqiyatli saqlandi!');
    }


    public function company_paymarts($id){
        $Paymart = BalanceHistory::where('company_id',$id)->get();
        return view('Company.Admin.Item.company_paymarts',compact('id','Paymart'));
    }

    public function company_balans($id){
        return view('Company.Admin.Item.company_balans',compact('id'));
    }

    public function company_orders($id){
        return view('Company.Admin.Item.company_orders',compact('id'));
    }

    public function company_comments($id){
        return view('Company.Admin.Item.company_comments',compact('id'));
    }


}
