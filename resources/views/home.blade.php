@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            {{-- admin user --}}
            @can('manage-users')
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body d-flex">
                                <h3 class="card-title mr-2">
                                    <i class="fas fa-users text-start mr-1"></i>Users
                                </h3>  
                                <h3 class="card-title ml-auto">+ {{ $users->count() }}</h3>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('users.index') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body d-flex">
                                <h3 class="card-title mr-2">
                                    <i class="fas fa-boxes"></i> Products
                                </h3>
                                <h3 class="card-title ml-auto">+ {{ $products->count() }}</h3>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('products.index') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body d-flex">
                                <h3 class="card-title mr-2">
                                    <i class="fas fa-shopping-cart"></i> Order 
                                </h3>
                                <h3 class="card-title ml-auto">+ {{ $orders->count() }}</h3>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('details.index') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card text-white mb-4" style="background-color: orange ;">
                            <div class="card-body d-flex">
                                <h3 class="card-title mr-2">
                                    <i class="fas fa-receipt"></i> Transactions
                                </h3>
                                <h3 class="card-title ml-auto">+ {{ $transactions->count() }}</h3>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('transactions.index') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            {{-- employee user --}}
            @can('user-table')
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body d-flex">
                                <h3 class="card-title mr-2">
                                    <i class="fas fa-shopping-cart"></i> Order 
                                </h3>
                                <h3 class="card-title ml-auto">+ {{ $orderUsers->count() }}</h3>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('details.index') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card text-white mb-4" style="background-color: orange ;">
                            <div class="card-body d-flex">
                                <h3 class="card-title mr-2">
                                    <i class="fas fa-receipt"></i> Transactions
                                </h3>
                                <h3 class="card-title ml-auto">+ {{  $transacUsers->count() }}</h3>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('transactions.index') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-line"></i> Today's Sales
                                </h3>
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                
                                <strong><h1>{{ number_format($amount) }}</h1></strong>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('transactions.index') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card text-white mb-4" style="background-color: indigo;">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title ">
                                    <i class="fas fa-chart-bar"></i> Monthly Sales
                                </h3>
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                <strong><h1>{{ number_format($empAmount) }}</h1></strong>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('transactions.index') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            {{-- admin user --}}
            @can('manage-users')
            <div class="row justify-content-around">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-header d-flex justify-content-center">
                            <h3 class="card-title">
                                <i class="fas fa-chart-line"></i> Daily Sales
                            </h3>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <strong><h1>{{ number_format($dailyAmount) }}</h1></strong>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('transactions.index') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card text-white mb-4" style="background-color: indigo;">
                        <div class="card-header d-flex justify-content-center">
                            <h3 class="card-title ">
                                <i class="fas fa-chart-bar"></i> Monthly Sales
                            </h3>
                        </div>
                        <div class="card-body d-flex justify-content-center ">
                            <strong><h1>{{  number_format($monthlyAmount) }}</h1></strong>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('sales.index') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            
            @endcan
            
        </div>
    </main>
@endsection
