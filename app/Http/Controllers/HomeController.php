<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        //admin dailyAmount || FOR ADMIN ||
        $dailyAmount = Transaction::whereDate('trans_date', Carbon::today())->sum('trans_amount'); 
        //admin monthlyAmount
         //get the date for today
        $startDate = date('Y-m-d', strtotime("-1 months",strtotime(Carbon::now())));
        $monthlyAmount = Transaction::whereBetween('created_at',[$startDate, Carbon::now()])->sum('trans_amount'); 
        //dailyAmount || FOR CASHIER||  
        $amount = Transaction::where('user_id', Auth::user()->id)->whereDate('trans_date', Carbon::today())->sum('trans_amount'); 
        //monthlyAmount || FOR CASHIER||
        $empAmount = Transaction::where('user_id', Auth::user()->id)->whereBetween('created_at',[$startDate, Carbon::now()])->sum('trans_amount');
        //get the user  || FOR CASHIER||
        $user = Auth::id();
        //get the order  which user ordered
        $orderUsers = Order::where('user_id', $user)->get();
        //get the transaction which user transact
        $transacUsers = Transaction::where('user_id', $user)->get();
        //get all users, products, orders and transactions || FOR ADMIN ||
        $users = User::all();
        $products= Product::all();
        $orders = Order::all();
        $transactions = Transaction::all();

        return view('home', compact('users' , 'products' , 'transactions', 'orders'
                    ,'orderUsers', 'transacUsers','dailyAmount', 'monthlyAmount', 'amount', 'empAmount'));
    }
}
