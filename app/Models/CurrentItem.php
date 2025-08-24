<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CurrentItem extends Model{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'star',
        'star_description',
        'waiting_date',
        'success_date',
    ];

    protected $casts = [
        'waiting_date' => 'datetime',
        'success_date' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

}
