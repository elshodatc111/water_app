<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceHistory extends Model{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'amount',
        'paymart_type',
        'description',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

}
