<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCombination extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $table = 'user_combinations';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'match_id',
        'team1_player_id',
        'team2_player_id',
        'player_type',
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
        'match_id'  => 'integer',
        'team1_player_id' => 'integer',
        'team2_player_id' => 'integer',
        'player_type' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'match_id'  => 'required',
        'team1_player_id' => 'required',
        'team2_player_id' => 'required',
        'player_type' => 'required'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    **/
    public function Users()
    {
        return $this->hasMany(User::class, 'user_d');
    }
}
