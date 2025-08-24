<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\CompanyItem;
use App\Http\Requests\CompanyStoreRequest;


class AdminCompanyController extends Controller{
    public function index(){
        $Company = [];
        foreach (Company::get() as $key => $value) {
            $Company[$key]['id'] = $value->id;
            $Company[$key]['name'] = $value->name;
            $Company[$key]['reyting'] = $value->star."(".$value->star_count.")";
            $Company[$key]['balance'] = number_format($value->balance, 0, '.', ' ')." (".$value->price.")";
            $Company[$key]['user_count'] = count(User::where('company_id',$value->id)->where('type','!=','admin')->where('type','!=','user')->get());
            $Company[$key]['item_count'] = count(CompanyItem::where('company_id',$value->id)->where('status','true')->get());
            $Company[$key]['status'] = $value->status=='true'?"Aktiv":"Block";
        }
        return view('Company.Admin.index',compact('Company'));
    }
    public function create(){
        return view('Company.Admin.create');
    }
    public function store(CompanyStoreRequest $request){
        $data = $request->validated();
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('image');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $image->move($destination, $fileName);
            $imagePath = 'image/' . $fileName;
        }
        $companyData = [
            'name'       => $data['name'],
            'phone'      => $data['phone'],
            'order_price'=> $data['order_price'],
            'image'      => $imagePath,
            'description'=> $data['description'],
            'star'       => 5,
            'star_count' => 0,
            'balance'    => 0,
            'price'      => $data['price'],
            'status'     => 'true',
        ];
        try {
            $company = Company::create($companyData);
        } catch (\Exception $e) {
            if ($imagePath && file_exists(public_path($imagePath))) {
                @unlink(public_path($imagePath));
            }
            return redirect()->back()->withInput()->with('error', 'Kompaniya saqlashda xatolik: ' . $e->getMessage());
        }
        return redirect()->route('admin_company_show', $company->id)->with('success', 'Kompaniya muvaffaqiyatli qo‘shildi');
    }
    public function show($id){
        return $id;
    }
}
