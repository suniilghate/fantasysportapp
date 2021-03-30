<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContest extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'user_contests';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'contest_id',
        'combination_id',
        'result',
        'amount',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *  
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'contest_id'  => 'integer',
        'combination_id' => 'integer',
        'result' => 'integer',
        'amount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'contest_id'  => 'required',
        'combination_id' => 'required',
        'result' => 'required',
        'amount' => 'required'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    **/
    public function Users()
    {
        return $this->hasMany(User::class, 'user_d');
    }
}
