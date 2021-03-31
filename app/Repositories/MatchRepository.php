<?php

namespace App\Repositories;

use App\Models\Match;
use App\Models\Series;
use App\Models\Contest;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use function App\Models\Contests;

/**
 * Class MatchRepository
 * @package App\Repositories
 * @version March 26, 2021, 8:40 am UTC
*/

class MatchRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'series_id',
        'team1',
        'team2',
        'date',
        'status',
        'result'
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
        return Match::class;
    }

    //Fetch team1 and team2 names
    public function getAll($id = null)
    {
        $perPage = (env('PAGINATION_ROWS')) ? env('PAGINATION_ROWS') : 20;
        $matches = Match::join('teams as T1', 'matches.team1', '=', 'T1.id')
                        ->join('teams as T2', 'matches.team2', '=', 'T2.id')
                        ->select('matches.*', 'T1.name as team1name','T2.name as team2name');
                        
        if(is_null($id)){
            $matches = $matches->simplePaginate($perPage);
        } else{
            $matches = $matches->where('matches.id','=',$id)->get()->first();
        }                        
        return $matches;
    }

    //Fetch team1 and team2 names
    public function fetch_contest_users($id = null)
    {
        $contests = DB::table('contests')
                        ->leftjoin('user_contests', 'user_contests.contest_id', '=', 'contests.id')
                        ->select('contests.id','contests.name','contests.match_id','contests.contest_type','contests.wining_amount','contests.entry_fee','contests.contest_total_users', 'user_contests.user_id')
                        ->where([['contests.id','=',$id],['contests.status','=',2]])
                        ->get()->toArray();
        
        /*
        $contests = DB::table('contests')
                        ->leftjoin('user_contests', 'user_contests.contest_id', '=', 'contests.id')
                        ->select('contests.id', 'contests.name', 'contests.wining_amount', 'user_contests.contest_id', 'user_contests.user_id', DB::raw("count(user_contests.contest_id) as cnt"))->groupBy('contests.id')
                        ->where('contests.id','=',$id)
                        ->get()->toArray();*/
        
                            return $contests;
    }

    //Check match date with Series start date and end date
    public function checkData($match_data)
    {
        $returnMsg = [];

        if($match_data['team1'] != $match_data['team2']){
            $seriesDates = Series::find($match_data['series_id'], ['start_date', 'end_date']);
            
            $matchDate = date('Y-m-d', strtotime($match_data['date']));   
            $startDate = date('Y-m-d', strtotime($seriesDates->start_date));
            $endDate = date('Y-m-d', strtotime($seriesDates->end_date));
            
            if(($matchDate >= $startDate) && ($matchDate <= $endDate)){   
                $returnMsg['flag'] = true;
                return $returnMsg;
            }
            $returnMsg['flag'] = false;
            $returnMsg['message'] = 'Match date should be between Series start date and end date';
        } else {
            $returnMsg['flag'] = false;
            $returnMsg['message'] = 'Team1 and Team2 should be different';
        }
        
        return $returnMsg;
    }
}
