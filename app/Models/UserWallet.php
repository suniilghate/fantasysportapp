<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'user_wallets';
    
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'current_balance',
        'bonus_amount',
        'deposit_amount',
        'previous_balance',
        'wining_amount',
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
        'current_balance' => 'float',
        'bonus_amount' => 'float',
        'deposit_amount' => 'float',
        'previous_balance' => 'float',
        'wining_amount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'current_balance' => 'required',
        'bonus_amount' => 'required',
        'deposit_amount' => 'required',
        'previous_balance' => 'required',
        'wining_amount' => 'required'
    ];
    
    /**
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    **/
    /*public function Users()
    {
        return $this->hasMany(User::class, 'user_d');
    }*/
    public function Users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
