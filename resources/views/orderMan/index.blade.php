
@extends('layouts.app')
@section('content')

<main>
    <div class="container-fluid">
        <h1 class="my-4"><i class="fas fa-table"></i> Order Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Order Management</li>
        </ol>
        <div class="row mb-4">
            <div class="col-lg-2 col-md-3">
                <div class="card card-stats">
                    <div class="card-header bg-success d-flex">
                        <a href="{{ route('orders.index') }}" class="text-decoration-none text-dark">
                            <h5 class="px-1"> <i class="fas fa-cash-register fa-lg"></i> Cashier</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name </th>
                                <th>Product Purchased</th>
                                <th>Quantity</th>
                                <th>Price </th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @can('manage-users')
                                @foreach ($order_details as $key => $order)
                                <tr>
                                    <td>{{ $key + 1}}</td>
                                    <td>{{ $order->orders->name }}</td>
                                    <td> 
                                        {{ $order->products->name }}
                                    </td>
                                    <td>{{ $order->quantity }}
                                    </td> 
                                    <td>{{ $order->price }}
                                    </td> 
                                    <td>
                                        {{ $order->amount }}
                                    </td> 
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                                @endforeach
                            @endcan
                            @can('user-table')
                                @foreach ($orderUsers as $key => $order)
                                <tr>
                                    <td>{{ $key + 1}}</td>
                                    <td>{{ $order->orders->name }}</td>
                                    <td> 
                                        {{ $order->products->name }}
                                    </td>
                                    <td>{{ $order->quantity }}
                                    </td> 
                                    <td>{{ $order->price }}
                                    </td> 
                                    <td>
                                        {{ $order->amount }}
                                    </td> 
                                    <td>{{ $order->created_at }}</td>
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