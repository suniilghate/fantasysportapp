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
}
