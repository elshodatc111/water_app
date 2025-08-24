<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model{

    use HasFactory;

    protected $fillable = [
        'order_id',
        'company_id',
        'company_item_id',
        'item_count',
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function companyItem(){
        return $this->belongsTo(CompanyItem::class);
    }

}
