<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyComment extends Model{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
        'star',
        'description',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
