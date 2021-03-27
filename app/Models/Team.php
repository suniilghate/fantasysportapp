<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Team
 * @package App\Models
 * @version March 26, 2021, 11:21 am UTC
 *
 * @property string $name
 * @property string $description
 * @property integer $sport_id
 * @property string $country
 * @property tinyinteger $status
 */
class Team extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'teams';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'sport_id',
        'country',
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
        'description' => 'string',
        'sport_id' => 'integer',
        'country' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'sport_id' => 'required'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    **/
    public function Sports()
    {
        return $this->belongsTo(Sports::class, 'sport_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
    **/
    public function Players()
    {
        return $this->belongsToMany(Players::class);
    }
    
}
