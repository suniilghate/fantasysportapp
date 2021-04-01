/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/assets/js/match.js ***!
  \**************************************/
//let loggedInUserBalance =@json(\Illuminate\Support\Facades\Auth::user()->latestbalance());
$(document).on('click', '.player-lobby', function (event) {
  console.log('11111');
  console.log($(this).attr("#data-id"));
  $('#editProfileUserId').val(loggedInUser.id);
  $('#pfName').val(loggedInUser.name);
  $('#pfEmail').val(loggedInUser.email);
  $('#PlayerLobbyModal').appendTo('body').modal('show');
});
$(document).on('submit', '#addCashWalletForm', function (event) {
  event.preventDefault();
  var userId = $('#userID').val();
  var amount = $('#uwAmount').val();
  var loadingButton = jQuery(this).find('#btnaddCashSave');

  if ($.isNumeric(amount)) {
    $.ajax({
      url: appUrl + '/users/addcash/' + userId,
      type: 'post',
      data: new FormData($(this)[0]),
      processData: false,
      contentType: false,
      success: function success(result) {
        if (result.success) {
          var remoteResponse = $.parseJSON(result.success);
          var options = {
            "key": remoteResponse.key,
            "amount": remoteResponse.amount,
            // Example: 2000 paise = INR 20
            "name": remoteResponse.companyname,
            "description": remoteResponse.description,
            "image": "img/logo.png",
            // COMPANY LOGO
            "handler": function handler(response) {
              // AFTER TRANSACTION IS COMPLETE YOU WILL GET THE RESPONSE HERE.
              console.log(response);

              if (typeof response.razorpay_payment_id == 'undefined' || response.razorpay_payment_id < 1) {
                alert('Failed Transaction');
                var flag = 'Failed';
              } else {
                var flag = 'Success';
              }

              $.ajax({
                url: appUrl + '/users/recordtransaction/' + userId,
                type: 'post',
                data: JSON.stringify({
                  'razorpay_payment_id': response.razorpay_payment_id,
                  'transaction_status': flag,
                  'transaction_amount': $('#uwAmount').val()
                }),
                processData: false,
                contentType: 'application/json',
                //dataType: "text",
                success: function success(result) {
                  console.log(result.success);

                  if (result.success) {
                    $('#UserWalletModal').modal('hide');
                  }
                },
                error: function error(result) {
                  console.log(result);
                },
                complete: function complete() {
                  loadingButton.button('reset');
                }
              });
            },
            "prefill": {
              "name": remoteResponse.prefill.name,
              // pass customer name
              "email": remoteResponse.prefill.email,
              // customer email
              "contact": remoteResponse.prefill.contact //customer phone no.

            },
            "notes": {
              "address": "" //customer address 

            },
            "theme": {
              "color": "#15b8f3" // screen color

            }
          };
          console.log(options);
          var propay = new Razorpay(options);
          propay.open();
        }
      },
      error: function error(result) {
        console.log(result);
      },
      complete: function complete() {
        loadingButton.button('reset');
      }
    });
  } else {
    alert('Enter valid amount'); //$(this).val('');
    //$('#addcashValidationErrorsBox').html('Enter valid amount');
  }
});
/******/ })()
;