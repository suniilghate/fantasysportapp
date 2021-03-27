<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Gender;
use App\Models\Sports;
use App\Models\PlayerType;

/**
 * Class Players
 * @package App\Models
 * @version March 26, 2021, 11:24 am UTC
 *
 * @property string $name
 * @property integer $sport_id
 * @property integer $age
 * @property tinyinteger $gender
 * @property tinyinteger $type
 * @property tinyinteger $status
 */
class Players extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'players';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'sport_id',
        'age',
        'gender_id',
        'type',
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
        'age' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'sport_id' => 'required',
        'type' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     **/
    /*public function gender()
    {
        return $this->hasOne(\App\Models\Gender::class);
    }*/

    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    **/
    public function Gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    **/
    public function Sports()
    {
        return $this->belongsTo(Sports::class, 'sport_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    **/
    public function PlayerType()
    {
        return $this->belongsTo(PlayerType::class, 'type');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
    **/
    public function Teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
