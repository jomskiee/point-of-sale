@extends('layouts.app')
@section('content')

<main>
    <div class="container-fluid">
        <h1 class="my-4"><i class="fas fa-table"></i> Transaction Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Transaction Management</li>
        </ol>
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
                                <th></th>
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
                                        <td class="d-inline-flex"> 
                                            <a href="{{ route('transactions.show', $transaction)}}" class="btn btn-primary text-white mx-3"><i class="fa fa-eye" aria-hidden="true"></i> Order Summary</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endcan
                             {{-- for employee table --}}
                            @can('user-table')
                                @foreach ($userTrans as $key => $transaction)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $transaction->users->name }}</td>
                                        <td>{{ $transaction->orders->name }}</td>
                                        <td>{{ $transaction->paid_amount }}</td> 
                                        <td>{{ $transaction->trans_amount }}</td> 
                                        <td>{{ $transaction->balance }}</td> 
                                        <td>{{ $transaction->trans_date }}</td>
                                        <td class="d-inline-flex"> 
                                            @include('transaction.modal')
                                            <a href="{{ route('transactions.show', $transaction)}}" class="btn btn-primary text-white mx-3"><i class="fa fa-eye" aria-hidden="true"></i> Order Summary</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endcan
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection