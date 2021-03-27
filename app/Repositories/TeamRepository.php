<?php

namespace App\Repositories;

use App\Models\Team;
use App\Repositories\BaseRepository;

/**
 * Class TeamRepository
 * @package App\Repositories
 * @version March 26, 2021, 11:21 am UTC
*/

class TeamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'sport_id',
        'country',
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
        return Team::class;
    }
}
