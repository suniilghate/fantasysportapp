<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Match
 * @package App\Models
 * @version March 26, 2021, 8:40 am UTC
 *
 * @property string $name
 * @property integer $series_id
 * @property integer $team1
 * @property integer $team2
 * @property string $date
 * @property tinyinteger $status
 * @property tinyinteger $result
 */

class Match extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'matches';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'series_id',
        'team1',
        'team2',
        'date',
        'status',
        'result'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'series_id' => 'integer',
        'team1' => 'integer',
        'team2' => 'integer',
        'date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'series_id' => 'required',
        'team1' => 'required',
        'team2' => 'required|unique:matches,team1',
        'date' => 'required|unique:matches'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    **/
    public function Series()
    {
        return $this->belongsTo(Series::class, 'series_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    **/
    public function Contests()
    {
        return $this->hasMany(Contest::class, 'match_id');
    }
}
