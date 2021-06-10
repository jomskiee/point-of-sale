<div class="modal fade" id="printReceipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Official Receipt</h5>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="d-flex justify-content-between">
                        <h3><strong>Invoice</strong>: {{ $lastTransac }}</h3>
                        <button onclick="printReceipt()"class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" type="button"><i class="fas fa-print"></i></button>
                    </div>
                    <p> {{ htmlspecialchars_decode(date('jS F Y', strtotime($date))) }}</p>
                    @foreach ($transaction as $transac)
                        <h6>Name: <strong></strong> {{$transac->orders->name }}</h6>
                    @endforeach
                <div class="table-responsive mt-3">
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
                            @foreach ($order_receipt as $receipt)
                                <tr>
                                    <td>{{ $receipt->products->id }}</td>
                                    <td>{{ $receipt->products->name }}</td>
                                    <td>{{ number_format($receipt->price, 2) }}</td>
                                    <td>{{ $receipt->quantity }}</td>
                                    <td>{{ number_format($receipt->amount, 2) }}</td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Total</td>
                                <td>{{ number_format($order_receipt->sum('amount'), 2) }}</td>
                            </tr>
                            @foreach ($transaction as $transac)
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Paid Amount</td>
                                    <td>{{ number_format($transac->paid_amount, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Change</td>
                                    <td>{{ number_format($transac->balance, 2) }}</td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    <div class="nk-notes ff-italic fs-12px text-soft">  </div>
                </div>
            </div>
            <div class="modal-footer">
                <p class="text-center">Invoice was created on a computer and is valid without the signature and seal.</p>
            </div>
        </div>
    </div>
</div>
<script>
    function printReceipt() {
        document.getElementById("nonPrintable").className += "noPrint";
        window.print();
    }
</script>
