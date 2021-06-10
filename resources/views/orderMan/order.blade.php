<style type="text/css" media="print">
    .noPrint{
        display: none;
        }
</style>
@extends('layouts.app')
@section('content')
@include('orderMan.invoice')
<main>
    <div id="nonPrintable" class="container-fluid">
        <h1 class="my-4"><i class="fas fa-cash-register fa-lg"></i>Cashier</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/details')}}">Order Management</a></li>
            <li class="breadcrumb-item active">Cashier</li>
        </ol>
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
            </div>
        @endif
        <form class="row"action="{{ route('orders.store') }}" method="POST">
            @csrf          
            <div class="col-md-4 shadow-mb-4 sticky-top">
                <div class="card">
                    <div class="card-header bg-dark d-inline-flex justify-content-between">
                        <h3 class="text-white">TOTAL: </h3>
                        <h3 class="text-white"><b class="total">0.00</b></h3>
                    </div>
                    <div class="card-body p-2 mt-1 mb-4">
                            <input id=""type="text" placeholder="Customer Name" class="form-control @error('customer') is-invalid @enderror" name="customer"  required >
                        <div class=" mt-4">
                            <label for="payment">Payment</label>
                            <input id="paid_amount"type="text"  class="form-control @error('payment') is-invalid @enderror mb-2 paid_amount" name="paid_amount"  required >
                            <label for="payment">Change</label>
                            <input id="balance" type="text" readonly  class="form-control balance" name="balance"  >
                        </div>
                        <div class=" justify-content-center">
                            <button type="submit" class="btn btn-success col-md-12 mt-3 ">Submit</button>
                            <hr />
                            <button type="button" data-toggle="modal" data-target="#printReceipt" class="btn btn-danger col-md-12  text-white mt-3">
                                <i class="fa fa-print" aria-hidden="true"></i> Print Invoice
                            </button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order Table -->
            <div class="col-md-8 ">
                <div class="table-responsive">
                    <table class="table"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Amount</th>
                                <th class="text-right"><a href="#" class="btn btn-sm btn-primary addMore"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                            </tr>
                        </thead>
                        <tbody class="addMoreProduct">
                            <form action="{{ route('orders.store')}}" method="post">
                                @csrf
                            <tr>
                                <td>1</td>
                                <td>
                                    <select name="product_id[]" class="form-control product_id col-xl-12">
                                        <option value="">Select Items</option>
                                         @foreach ($products as $product)
                                            <option data-price="{{ $product->price }}" 
                                                value="{{ $product->id }}">
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="quantity[]" id="quantity" class="quantity form-control"  required>
                                </td> 
                                <td>
                                    <input type="number" name="price[]" id="price" class="price form-control"  required>
                                </td>
                                <td>
                                    <input type="number" name="amount[]" id="amount"  class="amount form-control" required>
                                </td>                   
                                <td> 
                                    <a href="" class="btn btn-sm btn-danger delete"><i class="fas fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>   
        </form>       
    </div>
</main>
@endsection
@section('script')   
<script>
    //add tr
    $('.addMore').on('click', function(){
        var product = $('.product_id').html();
        var numberOfRow =  ($('.addMoreProduct tr').length - 0) + 1;
        var tr = '<tr><td class="no">' + numberOfRow + '</td>' +
                '<td><select class="form-control product_id" name="product_id[]">'+ product +
                ' </select></td>' +
                '<td><input type="number" name="quantity[]" class="form-control quantity"></td>' +
                '<td><input type="number" name="price[]" class="form-control price"></td>' +
                '<td><input type="number" name="amount[]" class="form-control amount"></td>' +
                '<td><a class="btn btn-sm btn-danger delete"><i class="fas fa-trash"></a></td>';
                $('.addMoreProduct').append(tr);
    });

    //remove tr
    $('.addMoreProduct').delegate('.delete', 'click', function(){
        $(this).parent().parent().remove();
    });
    function TotalAmount(){

        var total = 0;
        $('.amount').each(function(i, e){
            var amount = $(this).val() -0;
            total += amount;
        });
        $('.total').html(total);
    }
    $('.addMoreProduct').delegate('.product_id', 'change', function(){
        var tr = $(this).parent().parent();
        var price = tr.find('.product_id option:selected').attr('data-price');
        tr.find('.price').val(price);
        var qty = tr.find('.quantity').val() - 0;
        var price = tr.find('.price').val() - 0;
        var amount = (qty * price);
        tr.find('.amount').val(amount);
        TotalAmount();
    });
    $('.addMoreProduct').delegate('.quantity', 'keyup', function(){
        var tr= $(this).parent().parent();
        var qty = tr.find('.quantity').val() - 0;
        var price = tr.find('.price').val() - 0;
        var amount = (qty * price);
        tr.find('.amount').val(amount);
        TotalAmount();
    });
    $('#paid_amount').keyup(function(){
        var total = $('.total').html();
        var paid_amount = $(this).val();
        var tot = paid_amount - total;
        $('#balance').val(tot).toFixed(2);
    });
</script>
@endsection
