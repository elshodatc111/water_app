<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'order_price',
        'image',
        'description',
        'star',
        'star_count',
        'balance',
        'price',
        'status',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function items(){
        return $this->hasMany(CompanyItem::class);
    }

    public function comments(){
        return $this->hasMany(CompanyComment::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function histories(){
        return $this->hasMany(CompanyHistory::class);
    }

    public function balanceHistories(){
        return $this->hasMany(BalanceHistory::class);
    }

}
