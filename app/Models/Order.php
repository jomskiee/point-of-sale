<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['name','user_id'];
    
    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
