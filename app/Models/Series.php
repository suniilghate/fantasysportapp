<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Series
 * @package App\Models
 * @version March 26, 2021, 8:40 am UTC
 *
 * @property string $name
 * @property integer $sport_id
 * @property string $start_date
 * @property string $end_date
 * @property tinyinteger $status
 */

class Series extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'series';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'sport_id',
        'start_date',
        'end_date',
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
        'sport_id' => 'integer',
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'sport_id' => 'required',
        'start_date' => 'required|date|after:today',
        'end_date' => 'required|date|after_or_equal:start_date'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    **/
    public function Sports()
    {
        return $this->belongsTo(Sports::class, 'sport_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    **/
    public function Matches()
    {
        return $this->hasMany(Match::class, 'series_id');
    }
}