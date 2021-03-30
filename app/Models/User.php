<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'joining_date',
        'last_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    **/
    /*public function UserWallet()
    {
        return $this->belongsTo(UserWallet::class, 'user_id');
    }*/

    /**
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    **/
    public function UserWallets()
    {
        return $this->hasMany(UserWallet::class, 'user_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    **/
    public function UserTransaction()
    {
        return $this->belongsTo(UserTransaction::class, 'user_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    **/
    public function UserCombination()
    {
        return $this->belongsTo(UserCombination::class, 'user_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    **/
    public function UserContest()
    {
        return $this->belongsTo(UserContest::class, 'user_id');
    }

    public function latestbalance(){
        return $balance = Auth::user()->UserWallets()->select(['current_balance','bonus_amount', 'deposit_amount', 'previous_balance', 'wining_amount'])->orderBy('id', 'DESC')->get()->first();
    }

    

    
}
