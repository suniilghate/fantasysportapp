<?php

namespace App\Repositories;

use App\Models\Contest;
use App\Models\PlayerTeam;
use App\Models\Match;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ContestRepository
 * @package App\Repositories
 * @version March 26, 2021, 11:18 am UTC
*/

class ContestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'contest_type',
        'match_id',
        'wining_amount',
        'entry_fee',
        'total_amount',
        'contest_total_users',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Contest::class;
    }

    //Check contest type and entry fee
    public function checkData($contest_data)
    {
        $returnMsg = [];
        $returnMsg['flag'] = true;

        if($contest_data['contest_type'] == 2 && ($contest_data['entry_fee'] > 0 || $contest_data['total_amount'] > 0)){
                $returnMsg['flag'] = false;
                $returnMsg['message'] = 'No Entry fee is applicable for this contest since this is a Free Contest';
                
                return $returnMsg;
        } 
        
        return $returnMsg;
    }

    public function fetchPlayers($match) {
        list('team1' => $team1Id, 'team2' => $team2Id) = Match::find($match);

        $matchPlayers = PlayerTeam::join('players as P', 'players_team.players_id', '=', 'P.id')
                                    ->select('players_team.players_id', 'players_team.team_id','P.name','P.type')
                                    ->whereIn('players_team.team_id', array($team1Id,$team2Id))
                                    ->orderBy('P.type')
                                    ->get();

        $returnMatchPlayers = array();
        foreach($matchPlayers as $k => $mpValue){
            //if($mpValue['type'] == 2){
                $teamBelongsTo = Match::select(DB::raw("(CASE WHEN team1='" . $mpValue->team_id . "' THEN 'Team1' WHEN team2='" . $mpValue->team_id . "' THEN 'Team2' END) as team"))->where('id','=',$match)->get()->first()->toArray();
                $returnMatchPlayers[$mpValue->type][] = ['player' => $mpValue, 'team' => $teamBelongsTo['team']];
            //}
        }

        return $returnMatchPlayers;
    }
}
