<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyItem extends Model{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'price',
        'image',
        'status',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
