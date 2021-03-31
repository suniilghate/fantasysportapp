<div id="PlayerLobbyModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Player Lobby</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <form method="POST" id="selectLobyPlayers">
                <input type="hidden" name="user_id" id="plUserId">
                <input type="hidden" name="match_id" id="plMatchId">
                <input type="hidden" name="contest_id" id="plContestId">
                <input type="hidden" name="entry_fee" id="plEntryFee">
                <div class="modal-body">
                    <div class="table-responsive">
                    <h6>Select total 11 players from team1 and team2. Your final 11 should have min 4 from each team and max 7 from each team.</h6>
                        <table class="table" id="players-table" width="100%">
                            <thead>
                                <tr>
                                    <th width="25%">Batsman [1-3]</th>
                                    <th width="25%">WicketKeeper[1-3]</th>
                                    <th width="25%">All Rounder[3-6]</th>
                                    <th width="25%">Bowler[3-6]</th>
                                </tr>
                            </thead>
                            
                            <tbody id="tdBody"></tbody>
                        </table>
                    </div>
                    <div class="alert alert-danger d-none" id="addcashValidationErrorsBox"></div>
                    {{csrf_field()}}
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="btnuserCombinationSave" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..." tabindex="5">Create Combination</button>
                        <button type="button" class="btn btn-light ml-1 edit-cancel-margin margin-left-5" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>