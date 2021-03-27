<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contest
 * @package App\Models
 * @version March 26, 2021, 11:18 am UTC
 *
 * @property string $name
 * @property tinyinteger $contest_type
 * @property integer $match_id
 * @property number $wining_amount
 * @property number $entry_fee
 * @property number $total_amount
 * @property integer $contest_total_users
 * @property tinyinteger $status
 */
class Contest extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contests';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'match_id' => 'integer',
        'wining_amount' => 'float',
        'entry_fee' => 'float',
        'total_amount' => 'float',
        'contest_total_users' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'contest_type' => 'required',
        'match_id' => 'required',
        'wining_amount' => 'required',
        'entry_fee' => 'required',
        'total_amount' => 'required',
        'contest_total_users' => 'required'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    **/
    public function ContestType()
    {
        return $this->belongsTo(ContestType::class, 'contest_type');
    }  
    
    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    **/
    public function Match()
    {
        return $this->belongsTo(Match::class, 'match_id');
    }
}
