@extends('layouts.app')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="my-4"><i class="fas fa-users"></i> Sales Management</h1>
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ url('/home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Sales Management</li>
            </ol>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mx-3 my-4">
                            <div class="card-header bg-success text-white ">
                                <h4 class="card-title"><i class="fa fa-money-bill-alt" aria-hidden="true"></i> View by day</h4>
                            </div>
                            <div class="card-body">
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <form action="{{ route('sales.store') }}" method="POST">
                                                @csrf
                                                    <label> Take a Date </label>
                                                    <input type="date" class="form-control" name="date"> 
                                                    <br>
                                                    <button type="submit" class="btn btn-success md-1 ">View</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>         
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mx-3 my-4">
                            <div class="card-header bg-success text-white ">
                                <h4 class="card-title"><i class="fa fa-money-bill-alt" aria-hidden="true"></i> View by Month</h4>
                            </div>
                            <div class="card-body">
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <form action="{{ route('sales.store') }}" method="POST">
                                                @csrf
                                                    <label> Select Month </label>
                                                    <select class="form-control" name="month">
                                                        <option value="02-2021">January</option>
                                                        <option value="02-2021">February</option>
                                                        <option value="03-2021">March</option>
                                                        <option value="04-2021">April</option>
                                                        <option value="05-2021">May</option>
                                                        <option min="2021-06-10" value="2021-06-10" max="2021-06-30">June</option>
                                                        <option value="07-2021">July</option>
                                                        <option value="08-2021">August</option>
                                                        <option value="09-2021">September</option>
                                                        <option value="10-2021">October</option>
                                                        <option value="11-2021">November</option>
                                                        <option value="12-2021">December</option>
                                                    </select>
                                                    <br>
                                                    <button type="submit" class="btn btn-success md-1 ">View</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
