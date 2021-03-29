<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\Match;

class MatchResult extends Model
{
    use HasFactory;

    //public $table = 'players_team';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'match_id',
        'team1_id',
        'team2_id',
        'team1_runs_scored',
        'team1_wickets_falled',
        'team2_runs_scored',
        'team2_wickets_falled',
        'team1_result',
        'team2_result',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'match_id' => 'integer',
        'team1_id' => 'integer',
        'team2_id' => 'integer',
        'team1_runs_scored' => 'integer',
        'team1_wickets_falled' => 'integer',
        'team2_runs_scored' => 'integer',
        'team2_wickets_falled' => 'integer',
        'team1_result' => 'integer',
        'team2_result' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'match_id' => 'required',
        'team1_id' => 'required',
        'team2_id' => 'required',
        'team1_runs_scored' => 'required',
        'team1_wickets_falled' => 'required',
        'team2_runs_scored' => 'required',
        'team2_wickets_falled' => 'required',
        'team1_result' => 'required',
        'team2_result' => 'required'
    ];
    
}
