<?php

namespace App\Repositories;

use App\Models\Series;
use App\Repositories\BaseRepository;

/**
 * Class SeriesRepository
 * @package App\Repositories
 * @version March 26, 2021, 8:40 am UTC
*/

class SeriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'sport_id',
        'start_date',
        'end_date',
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
        return Series::class;
    }
}
