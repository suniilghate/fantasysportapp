<?php

namespace App\Repositories;

use App\Models\Sports;
use App\Repositories\BaseRepository;

/**
 * Class SportsRepository
 * @package App\Repositories
 * @version March 26, 2021, 8:28 am UTC
*/

class SportsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
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
        return Sports::class;
    }
}
