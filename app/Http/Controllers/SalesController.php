<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Auth;
use DB;


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales.index');
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
        if($request->date){
            $date = date('y-m-d',strtotime($request->date));
            $user = Auth::user();
            $transactions = Transaction::where('trans_date',$date)->get();
            
            $total_order = DB::table('transactions')->where('trans_date',$date)->get();
            $sum = DB::table('transactions')->where('trans_date',$date)->sum('trans_amount');

            return view('sales.result',compact('total_order','sum','date'))->with([
                'user'=> $user,
                'transactions'=> $transactions,
            ]);
        }
        else if($request->month){
            //$month = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();
           // $monthL = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
            //$revenueLastMonth = Callback::whereBetween(DB::raw('date(created_at)'), [$fromDate, $tillDate])->get();
            //$month = date('Y-m-d', strtotime("+30 days",strtotime( $request->month)));
            $month = $request->month;   
            $user = Auth::user();
            $transactions = Transaction::where('trans_date',$month)->get();
            
            $total_order = DB::table('transactions')->where('trans_date',$month)->get();
            $sum = DB::table('transactions')->where('trans_date',$month)->sum('trans_amount');

            return view('sales.result',compact('total_order','sum','month'))->with([
                'user'=> $user,
                'transactions'=> $transactions,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
