<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable{

    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'company_id',
        'name',
        'phone',
        'type',
        'email',
        'password',
        'code',
        'status',
    ];
    protected $hidden = ['password'];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function confirmationTokens(){
        return $this->hasMany(CfmToken::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function comments(){
        return $this->hasMany(CompanyComment::class);
    }

    public function currentItems(){
        return $this->hasMany(CurrentItem::class);
    }
}
