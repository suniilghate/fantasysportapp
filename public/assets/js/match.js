/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/assets/js/match.js ***!
  \**************************************/
//let loggedInUserBalance =@json(\Illuminate\Support\Facades\Auth::user()->latestbalance());
$(document).on('click', '.player-lobby', function (event) {
  console.log('222222');
  console.log($(this).attr("data-id"));
  var matchtId = $(this).attr("data-id");
  var contestId = $(this).attr("data-id-1");
  var entryFee = $(this).attr("data-id-2");
  $('#plUserId').val(loggedInUser.id);
  $('#plMatchId').val(matchtId);
  $('#plContestId').val(contestId);
  $('#plEntryFee').val(entryFee);
  $.get('/contests/getcontestplayers/' + matchtId, function (response) {
    var tableResponse = response;
    var tbody = '';
    console.log(tableResponse);

    for (var key in tableResponse) {
      tbody += '<td style="vertical-align:top" width="25%">';

      for (var k in tableResponse[key]) {
        tbody += '<table width="100%"><tr><td width="100%">';

        if (tableResponse[key][k]['player'].type == 1) {
          tbody += '<input type="checkbox" id="batsman" name="batsman[]" value="' + tableResponse[key][k]['player'].players_id + '" data-id="' + tableResponse[key][k]['player'].team_id + '" data-id-1="' + tableResponse[key][k]['player'].type + '" data-id-2="' + tableResponse[key][k]['player'].name + '" data-id-3="' + tableResponse[key][k]['team'] + '">';
        }

        if (tableResponse[key][k]['player'].type == 2) {
          tbody += '<input type="checkbox" id="wicketkeeper" name="wicketkeeper[]" value="' + tableResponse[key][k]['player'].players_id + '" data-id="' + tableResponse[key][k]['player'].team_id + '" data-id-1="' + tableResponse[key][k]['player'].type + '" data-id-2="' + tableResponse[key][k]['player'].name + '" data-id-3="' + tableResponse[key][k]['team'] + '">';
        }

        if (tableResponse[key][k]['player'].type == 3) {
          tbody += '<input type="checkbox" id="allrounder" name="allrounder[]" value="' + tableResponse[key][k]['player'].players_id + '" data-id="' + tableResponse[key][k]['player'].team_id + '" data-id-1="' + tableResponse[key][k]['player'].type + '" data-id-2="' + tableResponse[key][k]['player'].name + '" data-id-3="' + tableResponse[key][k]['team'] + '">';
        }

        if (tableResponse[key][k]['player'].type == 4) {
          tbody += '<input type="checkbox" id="bowler" name="bowler[]" value="' + tableResponse[key][k]['player'].players_id + '" data-id="' + tableResponse[key][k]['player'].team_id + '" data-id-1="' + tableResponse[key][k]['player'].type + '" data-id-2="' + tableResponse[key][k]['player'].name + '" data-id-3="' + tableResponse[key][k]['team'] + '">';
        }

        tbody += tableResponse[key][k]['player'].name;
        tbody += '</td></tr></table>';
      }

      tbody += '</td>';
    }

    $('#tdBody').empty().html(tbody);
    $('#PlayerLobbyModal').appendTo('body').modal('show');
  });
});
$(document).on('submit', '#selectLobyPlayers', function (event) {
  event.preventDefault();
  var userId = $('#plUserId').val();
  var contestId = $('#plContestId').val();
  var matchId = $('#plMatchId').val();
  var entryFee = $('#plEntryFee').val();
  var loadingButton = jQuery(this).find('#btnuserCombinationSave');
  var myCheckboxes = new Array();
  $("input:checked").each(function () {
    myCheckboxes.push({
      'player_id': $(this).val(),
      'team_id': $(this).attr('data-id'),
      'type': $(this).attr('data-id-1'),
      'name': $(this).attr('data-id-2'),
      'team': $(this).attr('data-id-3')
    });
  });
  var flagCheck = true;
  var team1Players = [];
  var team2Players = [];
  var pbatsman = [];
  var pwicketkeeper = [];
  var pallrounder = [];
  var pbowler = [];

  if (myCheckboxes.length < 11) {
    flagCheck = false;
  } else {
    $.each(myCheckboxes, function (index, value) {
      if (value.team == 'Team1') {
        team1Players.push(value);
      } else if (value.team == 'Team2') {
        team2Players.push(value);
      }

      if (value.type == '1') {
        pbatsman.push(value);
      }

      if (value.type == '2') {
        pwicketkeeper.push(value);
      }

      if (value.type == '3') {
        pallrounder.push(value);
      }

      if (value.type == '4') {
        pbowler.push(value);
      }
    });

    if (team1Players.length < 4 || team1Players.length > 7) {
      flagCheck = false;
    }

    if (team2Players.length < 4 || team2Players.length > 7) {
      flagCheck = false;
    }

    flagCheck = pbatsmanStatus = checkCount(pbatsman.length, 1, 3);
    flagCheck = pwicketkeeperStatus = checkCount(pwicketkeeper.length, 1, 3);
    flagCheck = pallrounderStatus = checkCount(pallrounder.length, 3, 6);
    flagCheck = pbowlerStatus = checkCount(pbowler.length, 3, 6);
  }

  console.log(flagCheck);
  console.log(myCheckboxes);
  console.log(team1Players);
  console.log(team2Players);
  console.log(pbatsman);
  console.log(pwicketkeeper);
  console.log(pallrounder);
  console.log(pbowler);
  console.log(pbatsmanStatus);
  console.log(pwicketkeeperStatus);
  console.log(pallrounderStatus);
  console.log(pbowlerStatus); //console.log(pbatsman.length);

  if (flagCheck) {
    $.ajax({
      url: appUrl + '/users/savelobyyplayers/' + userId,
      type: 'post',
      data: JSON.stringify({
        'players': myCheckboxes,
        'match_id': matchId,
        'user_id': userId,
        'contest_id': contestId,
        'entry_fee': entryFee
      }),
      processData: false,
      contentType: 'application/json',
      success: function success(result) {
        if (result.success) {
          console.log(result.success);
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
    alert('Please check the Player Combination conditions');
  }
});

function checkCount(cnt, Start, End) {
  if (cnt >= Start && cnt <= End) return true;else return false;
}
/******/ })()
;