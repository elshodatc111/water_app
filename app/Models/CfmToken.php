<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CfmToken extends Model{
    use HasFactory;

    protected $fillable = ['user_id', 'cfm_token'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
