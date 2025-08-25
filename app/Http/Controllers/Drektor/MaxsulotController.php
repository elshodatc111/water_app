<?php

namespace App\Http\Controllers\Drektor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyItem;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DCompanyItemCreateRequest;
use App\Http\Requests\DCompanyUpdateImageRequest;

class MaxsulotController extends Controller{

    public function index(){
        $items = CompanyItem::where('company_id',Auth()->user()->company_id)->where('status','true')->get();
        return view('Drektor.Maxsulotlar.index',compact('items'));
    }

    public function store(DCompanyItemCreateRequest $request){
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
            'company_id' => Auth()->User()->company_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
        ]);
        return redirect()->back()->with('success', 'Mahsulot muvaffaqiyatli saqlandi!');
    }

    public function delete(Request $request){
        $item = CompanyItem::find($request->id);
        if (!$item) {
            return redirect()->back()->with('error', 'Mahsulot topilmadi.');
        }
        if ($item->company_id !== Auth::user()->company_id) {
            return redirect()->back()->with('error', 'Sizda bu mahsulotni o‘chirishga ruxsat yo‘q.');
        }
        $item->status = 'false';
        $item->save();
        return redirect()->back()->with('success', 'Mahsulot muvaffaqiyatli o‘chirildi!');
    }

    public function show($id){
        $item = CompanyItem::find($id);
        if (!$item || $item->company_id !== Auth::user()->company_id) {
            return redirect()->route('d_maxsulot')->with('error', 'Mahsulot topilmadi yoki sizga tegishli emas.');
        }
        return view('Drektor.Maxsulotlar.show',compact('item'));
    }

    public function update(Request $request){
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);
        $item = CompanyItem::findOrFail($request->id);
        $item->update($validated);
        return redirect()->back()->with('success', 'Mahsulot muvaffaqiyatli yangilandi!');
    }

    public function updateImage(DCompanyUpdateImageRequest $request){
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
        $item = CompanyItem::findOrFail($request->id);
        $item->image = $imagePath;
        $item->save();
        return redirect()->back()->with('success', 'Mahsulot rasmi muvaffaqiyatli yangilandi!');
    }

}
