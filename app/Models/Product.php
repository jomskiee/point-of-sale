<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'categories' ,'desc' ,'qty_stock' , 'price' , 'alert_stock'];

    public function orderDetails(){
        return $this->hasMany(Product::class);
    }
}
