<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Players;

/**
 * Class Sports
 * @package App\Models
 * @version March 26, 2021, 8:28 am UTC
 *
 * @property string $name
 * @property string $description
 */
class Sports extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    **/
    public function Players()
    {
        return $this->hasMany(Players::class, 'sport_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    **/
    public function Teams()
    {
        return $this->hasMany(Team::class, 'sport_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    **/
    public function Series()
    {
        return $this->hasMany(Series::class, 'sport_id');
    }
}
