<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<div id="UserWalletModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Wallet</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <form method="POST" id="addCashWalletForm">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table" id="players-table">
                            <thead>
                                <tr>
                                    <th>Total Balance</th>
                                    <th>Bonus Amount</th>
                                    <th>Deposit Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td id="walletTdCB">0.00</td>
                                <td id="walletTdBA">0.00</td>
                                <td id="walletTdDA">0.00</td>
                            </tr>        
                            </tbody>
                        </table>
                    </div>
                    <div class="alert alert-danger d-none" id="addcashValidationErrorsBox"></div>
                    <input type="hidden" name="user_id" id="userID">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Amount:</label><span class="required">*</span>
                            <input type="text" name="amount" id="uwAmount" class="form-control" required autofocus tabindex="1">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="btnaddCashSave" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..." tabindex="5">Add Cash</button>
                        <button type="button" class="btn btn-light ml-1 edit-cancel-margin margin-left-5"
                                data-dismiss="modal">Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

