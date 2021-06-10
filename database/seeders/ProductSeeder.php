<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $laptop = Product::create([
            'name'=> 'Acer Aspire 3',
            'desc'=> 'intel Core i3 2GB and 500 HDD',
            'qty_stock'=> '15',
            'price'=> '2000',
            'categories'=>'Laptop'
        ]);

        $smartphone = Product::create([
            'name'=> 'Apple iPhone X',
            'desc' => 'A11 Bionic chip with 64-bit architecture 64GB lasts up to 2 hours longer than iPhone 7',
            'qty_stock' => '20',
            'price'=> '4000',
            'categories'=>'smartphone'
        ]);
        $smartphone1 = Product::create([
            'name'=> 'Samsung Galaxy s10',
            'desc' => ' 64-bit architecture 64GB',
            'qty_stock' => '20',
            'price'=> '3000',
            'categories'=>'smartphone'
        ]);
        $smartphone2 = Product::create([
            'name'=> 'Samsung Galaxy s7',
            'desc' => ' 64-bit architecture 64GB',
            'qty_stock' => '20',
            'price'=> '10000',
            'categories'=>'smartphone'
        ]);
        $smartphone3 = Product::create([
            'name'=> 'iPhone 12',
            'desc' => ' 64-bit architecture 64GB',
            'qty_stock' => '200',
            'price'=> '50000',
            'categories'=>'smartphone'
        ]);
    }
}
