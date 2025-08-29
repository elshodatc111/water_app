<?php

namespace App\Http\Controllers\Drektor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\DCompanyUpdateRequest;
use App\Http\Requests\DCompanyItemsUpdateRequest;

class SettingController extends Controller{

    public function index(){
        $item = Company::find(auth()->user()->company_id); 
        if (!$item || $item->id != auth()->user()->company_id) {
            return redirect()->route('error')->with('error', 'Sozlamalar mavjud emas. Qaytadan urinib ko\'ring.');
        }
        return view('Drektor.Setting.index',compact('item'));
    }

    public function update(DCompanyUpdateRequest $request){
        $data = $request->validated();
        $company = Company::findOrFail($data['id']);
        $company->update($data);
        return redirect()->back()->with('success', 'Firma maʼlumotlari yangilandi!');
    }

    public function updateImage(DCompanyItemsUpdateRequest $request){
        $data = $request->validated();
        $company = Company::findOrFail($data['id']);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('images'); // Standard folder
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $image->move($destination, $fileName);
            $imagePath = 'images/' . $fileName;
        }
        $company->update([
            'image' => $imagePath,
        ]);
        return redirect()->back()->with('success', 'Rasm muvaffaqiyatli yangilandi!');
    }

}
