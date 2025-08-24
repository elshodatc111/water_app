<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\BalanceHistory;
use App\Models\CompanyItem;

class AdminCompanyItemController extends Controller{

    public function company_item($id){
        return view('Company.Admin.Item.company_item',compact('id'));
    }

    public function company_hodim($id){
        return view('Company.Admin.Item.company_hodim',compact('id'));
    }

    public function company_paymarts($id){
        return view('Company.Admin.Item.company_paymarts',compact('id'));
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
