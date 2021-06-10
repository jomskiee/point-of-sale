@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-between g-3">
                    <div class="d-flex justify-content-between mt-5">
                        <h3 class="nk-block-title page-title">Invoice <strong class="text-primary small">{{ $transaction->id }}</strong></h3>
                        <button onclick="printReceipt()"class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" type="button"><i class="fas fa-print"></i></button>
                    </div>
                    <div class="nk-block-des text-soft">
                        <ul class="list-inline">
                            <span>Date</span>: <span>{{ htmlspecialchars_decode(date('jS F Y', strtotime($transaction->trans_date))) }}</span>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="content">
                <div class="invoice">
                    <div class="invoice-wrap">
                        <div class="invoice-head">
                            <div class="invoice-contact">
                                <span class="overline-title">Invoice To</span>
                                <div class="invoice-contact-info mt-2 mb-3">
                                    <h4 class="title mx-5"><strong>{{ $transaction->orders->name }}</strong></h4>
                                </div>
                            </div>
                        </div><!-- .invoice-head -->
                        <div class="invoice-bills">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="w-150px">Item ID</th>
                                            <th class="w-60">Product Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{$order->products->id }}</td>
                                                <td>{{$order->products->name }}</td>
                                                <td>{{ number_format($order->price, 2) }}</td>
                                                <td>{{$order->quantity }}</td>
                                                <td>{{ number_format($order->amount, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">Total</td>
                                            <td>{{ number_format($orders->sum('amount'), 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">Paid Amount</td>
                                            <td>{{ number_format($transaction->paid_amount, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">Change</td>
                                            <td>{{ number_format($transaction->balance, 2) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="nk-notes ff-italic fs-12px text-soft text-center"> Invoice was created on a computer and is valid without the signature and seal. </div>
                            </div>
                        </div><!-- .invoice-bills -->
                    </div><!-- .invoice-wrap -->
                </div><!-- .invoice -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
<script>
    function printReceipt() {
        window.print();
    }
</script>
@endsection