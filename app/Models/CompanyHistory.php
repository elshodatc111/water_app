<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyHistory extends Model{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'order_id',
        'paymart',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
