<?php

namespace App\Repositories;

use App\Models\Contest;
use App\Repositories\BaseRepository;

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
}
