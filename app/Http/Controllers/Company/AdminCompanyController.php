<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\BalanceHistory;
use App\Models\CompanyItem;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\UpdateCompanyImageRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Http\Requests\CompanyPaymentRequest;

class AdminCompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $Company = [];

        foreach ($companies as $key => $company) {
            $Company[$key] = [
                'id'          => $company->id,
                'name'        => $company->name,
                'reyting'     => "{$company->star} ({$company->star_count})",
                'balance'     => number_format($company->balance, 0, '.', ' ') . " ({$company->price})",
                'user_count'  => User::where('company_id', $company->id)
                                    ->whereNotIn('type', ['admin', 'user'])
                                    ->count(),
                'item_count'  => CompanyItem::where('company_id', $company->id)
                                    ->where('status', 'true')
                                    ->count(),
                'status'      => $company->status === 'true' ? 'Aktiv' : 'Block',
            ];
        }

        return view('Company.Admin.index', compact('Company'));
    }

    public function create()
    {
        return view('Company.Admin.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        $data = $request->validated();
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

        $companyData = [
            'name'        => $data['name'],
            'phone'       => $data['phone'],
            'order_price' => $data['order_price'],
            'image'       => $imagePath,
            'description' => $data['description'],
            'star'        => 5,
            'star_count'  => 0,
            'balance'     => 0,
            'price'       => $data['price'],
            'status'      => 'true',
        ];

        try {
            $company = Company::create($companyData);
            return redirect()->route('admin_company_show', $company->id)->with('success', 'Kompaniya muvaffaqiyatli qo‘shildi');
        } catch (\Exception $e) {
            if ($imagePath && file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
            return redirect()->back()->withInput()->with('error', 'Kompaniya saqlashda xatolik: ' . $e->getMessage());
        }
    }

    public function show($id){
        $Company = Company::findOrFail($id);
        return view('Company.Admin.show', compact('Company'));
    }

    public function updateImage(UpdateCompanyImageRequest $request){
        $company = Company::findOrFail($request->id);
        if ($company->image && file_exists(public_path($company->image))) {
            unlink(public_path($company->image));
        }

        $image = $request->file('image');
        $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $fileName);
        $company->image = 'images/' . $fileName;
        $company->save();
        return redirect()->route('admin_company_show', $request->id)->with('success', 'Rasm muvaffaqiyatli yangilandi!');
    }

    public function update(CompanyUpdateRequest $request){
        $data = $request->validated();
        $company = Company::findOrFail($data['id']);
        $company->update($data);

        return redirect()->route('admin_company_show', $company->id)->with('success', 'Kompaniya muvaffaqiyatli yangilandi!');
    }

    public function toggleStatus(Request $request){
        $company = Company::findOrFail($request->id);
        $company->status = $company->status == 'true' ? 'false' : 'true';
        $company->save();
        $users = User::where('company_id', $request->id)->whereNotIn('type', ['admin', 'user'])->get();
        foreach ($users as $user) {
            if ($company->status == 'true') {
                if ($user->type == 'direktor') {
                    $user->status = true;
                }
            } else {
                $user->status = 'false';
            }
            $user->save();
        }
        return redirect()->back()->with('success', 'Kompaniya statusi yangilandi!');
    }

    public function paymart_store(CompanyPaymentRequest $request)
    {
        $data = $request->validated();

        BalanceHistory::create($data);

        $company = Company::findOrFail($data['company_id']);
        $company->increment('balance', $data['amount']);

        return redirect()->back()->with('success', 'To‘lov muvaffaqiyatli amalga oshirildi!');
    }
}
