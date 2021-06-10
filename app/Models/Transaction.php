<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = ['order_id', 'paid_amount' ,'balance' , 'user_id' , 'trans_date', 'trans_amount'];
    
    public function orders(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
