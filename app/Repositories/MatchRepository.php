<?php

namespace App\Repositories;

use App\Models\Match;
use App\Models\Series;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

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
    public function getAll()
    {
        $matches = Match::join('teams as T1', 'matches.team1', '=', 'T1.id')
                        ->join('teams as T2', 'matches.team2', '=', 'T2.id')
                        ->select('matches.*', 'T1.name as team1name','T2.name as team2name')
                        ->get();
        return $matches;
    }

    //Check match date with Series start date and end date
    public function checkSeriesDates($match_data)
    {
        $seriesDates = Series::find($match_data['series_id'], ['start_date', 'end_date']);
        
        $matchDate = date('Y-m-d', strtotime($match_data['date']));   
        $startDate = date('Y-m-d', strtotime($seriesDates->start_date));
        $endDate = date('Y-m-d', strtotime($seriesDates->end_date));
        
        if(($matchDate >= $startDate) && ($matchDate <= $endDate)){   
            return true;
        }
        return false;
    }
}
