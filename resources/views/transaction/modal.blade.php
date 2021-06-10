<div onload="printPromot()" class="modal fade" id="printReceipt{{ $transaction->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Official Receipt</h5>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="d-flex">
                        <h3><strong>Invoice</strong>: {{ $transaction->id }}</h3>
                    </div>
                    <p> {{ htmlspecialchars_decode(date('jS F Y', strtotime($transaction->trans_date))) }}</p>
                    <span class="overline-title">Invoice To</span>
                    <div class="invoice-contact-info mt-2 mb-3">
                        <h4 class="title mx-5"><strong>{{ $transaction->orders->name }}</strong></h4>
                    </div>
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
                            @foreach ($transaction->orders as $order)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Total</td>
                                <td></td>
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
                    <div class="nk-notes ff-italic fs-12px text-soft">  </div>
                </div>
            </div>
            <div class="modal-footer">
                <p class="text-center">Invoice was created on a computer and is valid without the signature and seal.</p>
            </div>
        </div>
    </div>
</div>

