<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
        'price',
        'status',
        'paymart_type',
        'create_date',
        'cancel_data',
        'cancel_user_id',
        'cancel_description',
        'address',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'create_date' => 'datetime',
        'cancel_data' => 'datetime',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cancelUser(){
        return $this->belongsTo(User::class, 'cancel_user_id');
    }

    public function items(){
        return $this->hasMany(OrderItem::class);
    }

    public function currentItems(){
        return $this->hasMany(CurrentItem::class);
    }

    public function histories(){
        return $this->hasMany(CompanyHistory::class);
    }
}
