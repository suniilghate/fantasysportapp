<?php

namespace App\Repositories;

use App\Models\Players;
use App\Repositories\BaseRepository;

/**
 * Class PlayersRepository
 * @package App\Repositories
 * @version March 26, 2021, 11:24 am UTC
*/

class PlayersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'sport_id',
        'age',
        'gender_id',
        'type',
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
        return Players::class;
    }
    
}
