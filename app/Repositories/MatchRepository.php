<?php

namespace App\Repositories;

use App\Models\Match;
use App\Repositories\BaseRepository;

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

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getAll()
    {
        $matches = Match::join('teams as T1', 'matches.team1', '=', 'T1.id')
                        ->join('teams as T2', 'matches.team2', '=', 'T2.id')
                        ->select('matches.*', 'T1.name as team1name','T2.name as team2name')
                        ->get();
        return $matches;
    }
}
