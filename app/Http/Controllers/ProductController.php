<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function _construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('ProductMan.index')->with([
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {   
        return view('ProductMan.create')->with([
            'product'=> $product,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $this->validate($request,[
            'name' => ['required'],
            'categories' => ['required'],
            'price' => ['required'],
            'qty_stock' => ['required', 'integer'],
            'desc' => ['required', 'string'],
        ]);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty_stock = $request->qty_stock;
        $product->desc = $request->desc;
        $product->categories = $request->categories;
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('ProductMan.edit')->with([
            'product'=> $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        
        $this->validate($request,[
            'name' => ['required'],
            'categories' => ['required'],
            'price' => ['required'],
            'qty_stock' => ['required', 'integer'],
            'desc' => ['required', 'string'],
        ]);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty_stock = $request->qty_stock;
        $product->desc = $request->desc;
        $product->categories = $request->categories;
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
