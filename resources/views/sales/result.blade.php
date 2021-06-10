@extends('layouts.app')
@section('content')

<main>
    <div class="container-fluid">
        <h1 class="my-4"><i class="fas fa-table"></i> Sales of 
        @php 
            if(isset($date)){
                echo $date;
            }
            else{
                echo $month;
            }
        @endphp
        
        </h1>
        <div class="row mb-4">
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee </th>
                                <th>Name</th>
                                <th>Payment</th>
                                <th>Total Amount </th>
                                <th>Change</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @can('manage-users')
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->users->name }}</td>
                                        <td>{{ $transaction->orders->name }}</td>
                                        <td>{{ $transaction->paid_amount }}</td> 
                                        <td>{{ $transaction->trans_amount }}</td> 
                                        <td>{{ $transaction->balance }}</td> 
                                        <td>{{ $transaction->trans_date }}</td>
                                    </tr>
                                @endforeach
                            @endcan
                        </tbody>
                    </table>
                    <h3><strong>Total Sales: {{ $sum }}</strong></h3>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection