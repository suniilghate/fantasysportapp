/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/assets/js/profile.js ***!
  \****************************************/
$(document).on('click', '.edit-profile', function (event) {
  $('#editProfileUserId').val(loggedInUser.id);
  $('#pfName').val(loggedInUser.name);
  $('#pfEmail').val(loggedInUser.email);
  $('#EditProfileModal').appendTo('body').modal('show');
});
$(document).on('click', '.my-wallet', function (event) {
  $('#userID').val(loggedInUser.id);
  $('#walletTdCB').html((typeof loggedInUserBalance.current_balance !== 'undefined') ? loggedInUserBalance.current_balance : 0.00 );
  $('#walletTdBA').html((typeof loggedInUserBalance.bonus_amount !== 'undefined') ? loggedInUserBalance.bonus_amount : 0.00 );
  $('#walletTdDA').html((typeof loggedInUserBalance.deposit_amount !== 'undefined') ? loggedInUserBalance.deposit_amount : 0.00 );
  $('#UserWalletModal').appendTo('body').modal('show');
});
$(document).on('change', '#pfImage', function () {
  var ext = $(this).val().split('.').pop().toLowerCase();

  if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
    $(this).val('');
    $('#editProfileValidationErrorsBox').html('The profile image must be a file of type: jpeg, jpg, png.').show();
  } else {
    displayPhoto(this, '#edit_preview_photo');
  }
});

window.displayPhoto = function (input, selector) {
  var displayPreview = true;

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var image = new Image();
      image.src = e.target.result;

      image.onload = function () {
        $(selector).attr('src', e.target.result);
        displayPreview = true;
      };
    };

    if (displayPreview) {
      reader.readAsDataURL(input.files[0]);
      $(selector).show();
    }
  }
};

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
$(document).on('submit', '#editProfileForm', function (event) {
  event.preventDefault();
  var userId = $('#editProfileUserId').val();
  var loadingButton = jQuery(this).find('#btnPrEditSave');
  loadingButton.button('loading');
  $.ajax({
    url: usersUrl + '/' + userId,
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      if (result.success) {
        $('#EditProfileModal').modal('hide');
        setTimeout(function () {
          location.reload();
        }, 1500);
      }
    },
    error: function error(result) {
      console.log(result);
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});
/******/ })()
;