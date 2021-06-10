
@extends('layouts.app')
@section('content')

<main>
    <div class="container-fluid">
        <h1 class="my-4"><i class="fas fa-shopping-cart"></i> Order Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/orders')}}">Order Management</a></li>
            <li class="breadcrumb-item active">Order Product</li>
        </ol>
        <div class="row">
            <div class="col-md-4 sticky-top">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">TOTAL:</h3>
                    </div>
                    <div class="card-body p-2 mt-1">
                        <form action="" class=" mb-4">
                            <input type="text" placeholder="Customer Name" class="form-control @error('customer') is-invalid @enderror" name="customer"  required >
                        </form>
                        <div class="d-flex ">
                            <h6 class="text-left">Subtotal:</h6>
                            <hr/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6>Total:</h6>
                            <hr/>
                        </div>
                        <div class="">
                            <label for="payment">Payment</label>
                            <input type="text"  class="form-control @error('payment') is-invalid @enderror mb-2" name="payment"  required >
                            <label for="payment">Change</label>
                            <input type="text"  class="form-control" name="change"  readonly>
                        </div>
                        <div class=" justify-content-center">
                            <button type="submit" class="btn btn-success col-md-12 mt-3 ">Submit</button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Search product --}}
            
            <div class="col-md-8 ">
                <form class="d-none d-md-inline-block form-inline mr-auto col-xl-10 p-2">
                    <div class="input-group">
                        <form action="{{ route('order.search') }}" method="GET" role="search">
                            {{ csrf_field() }}
                            <input name="search" id="search"class="form-control" type="text" placeholder="Find product" aria-label="Search" aria-describedby="basic-addon2" />
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-10 ml-4 mt-3">
                        <div class="table-responsive">
                            <table class="table "  width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td> 
                                        <td class="">
                                            <input id="order_qty" type="number" class="form-control @error('order_qty') is-invalid @enderror" name="order_qty" required>
                                        </td>
                                        <td></td>                   
                                        <td class="d-inline-flex"> 
                                            <form action="#" method="POST">
                                                @csrf
                                                {{ method_field('DELETE')}}
                                                <button type="submit" class="btn btn-sm btn-danger ml-2"><i class="fas fa-trash pr-1" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>   
    </div>
</main>
<script>
    $('#listingData').dataTable({
        responsive: true,
        "bFilter": true
    });
    $("#listingData_filter").addClass("hidden");
    
    $("#search").on("input", function(e){
        e.preventDefault();
        $('#listingData').DataTable().search($(this).val()).draw();

    });
</script>
@endsection