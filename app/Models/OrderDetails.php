<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = ['order_id', 'product_id' ,'quantity' , 'price' , 'amount' , 'user_id'];

    public function orders(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
}
