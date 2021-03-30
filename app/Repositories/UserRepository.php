<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version March 26, 2021, 8:40 am UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'mobile',
        'joining_date',
        'last_login'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    public function updateWallet($data){
        //fetch the current wallet data
        $userWallet = Auth::user()->latestbalance();
        
        $bonus_amount = $userWallet->bonus_amount;
        $deposit_amount = $userWallet->deposit_amount + $data['transaction_amount'];
        $previous_balance = $userWallet->current_balance;
        $wining_amount = $userWallet->wining_amount;
        $current_balance = $deposit_amount + $wining_amount + $deposit_amount;

        try {
            // Begin a transaction
            DB::beginTransaction();

            $insert = Auth::user()->UserWallets()->create([
                'user_id' => Auth::user()->id,
                'current_balance' => $current_balance,
                'bonus_amount' => $bonus_amount,
                'deposit_amount' => $deposit_amount,
                'previous_balance' => $previous_balance,
                'wining_amount' => $wining_amount
            ]);
            
            $transaction = Auth::user()->UserTransaction()->create([
                'user_id' => Auth::user()->id,
                'transaction_id' => $data['razorpay_payment_id'],
                'transaction_type' => 1,
                'transaction_amount' => $data['transaction_amount'],
                'transaction_message' => 'Deposited Rs. ' . $data['transaction_amount']
            ]);

            // Commit the transaction
            DB::commit();
        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();

            return $e;
        }
    
        return $insert;
    }
}
