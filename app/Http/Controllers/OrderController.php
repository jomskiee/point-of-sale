<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
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
        $orders = Order::all();
        $lastID = OrderDetails::where('user_id', Auth::user()->id)->max('order_id');
        $lastTransac = Transaction::where('user_id', Auth::user()->id)->max('order_id');
        $date = Transaction::max('trans_date');
        $order_receipt = OrderDetails::where('order_id', $lastID)->get();
        $transaction = Transaction::where('order_id', $lastTransac)->get();
        return view('orderMan.order', [
            'products'=> $products,
            'orders' => $orders,
            'order_receipt' => $order_receipt,
            'transaction' => $transaction,
            'lastTransac' => $lastTransac,
            'date' => $date,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        //dd($request->all());
       
        DB::transaction(function() use($request){
            //order 
            $orders = new Order;
            $orders->name = $request->customer;
            $orders->user_id = Auth::user()->id;
            $orders->save();
            $order_id = $orders->id;
            
            //Order Details
            for($product_id = 0; $product_id < count($request->product_id); $product_id++){
                $order_details = new OrderDetails;
                $order_details->order_id = $order_id;
                $order_details->user_id = Auth::user()->id;
                $order_details->product_id = $request->product_id[$product_id];
                $order_details->price = $request->price[$product_id];
                $order_details->quantity = $request->quantity[$product_id];
                $order_details->amount = $request->amount[$product_id];
                $order_details->save();
                
                //update product quantity
                $products = Product::where('id', $order_details->product_id)->first();
                $product_qty = $products->qty_stock;
                $products->qty_stock = $product_qty - $order_details->quantity;
                $products->save();
                
            }
           //total amount
            $totalAmount = OrderDetails::where('order_id', $order_id)->sum('amount');
            //transaction
            $transaction = new Transaction();
            $transaction->order_id = $order_id;
            $transaction->user_id = Auth::user()->id;
            $transaction->balance = $request->balance;
            $transaction->paid_amount = $request->paid_amount;
            $transaction->trans_amount = $totalAmount;
            $transaction->trans_date = date('Y-m-d');
            $transaction->save();

            //products of the order
            $products = Product::all();
            //details of the order
            $order_detail = OrderDetails::where('order_id', $order_id)->get();
            //customer name
            $orderedBy = Order::where('id', $order_id)->get();
            
            return view('orderMan.order',[
                'products' => $products,
                'order_details' => $order_detail,
                'customer_orders' => $orderedBy
            ]);
        });
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orderMan.invoice');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
