<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'user_transactions';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'transaction_id',
        'transaction_type',
        'transaction_amount',
        'transaction_message',
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
        'transaction_id' => 'integer',
        'transaction_type' => 'integer',
        'transaction_amount' => 'float',
        'transaction_message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'transaction_id' => 'required',
        'transaction_type' => 'required',
        'transaction_amount' => 'required',
        'transaction_message' => 'required'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    **/
    public function Users()
    {
        return $this->hasMany(User::class, 'user_d');
    }
}
