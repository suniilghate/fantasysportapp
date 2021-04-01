<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserCombination;

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

    public function joinContest($data){
        //fetch the current wallet data
        $userWallet = Auth::user()->latestbalance();
        
        $bonus_amount = $userWallet->bonus_amount;
        $deposit_amount = $userWallet->deposit_amount;
        $previous_balance = $userWallet->previous_balance;
        $wining_amount = $userWallet->wining_amount;
        $current_balance = $userWallet->current_balance;

        if($userWallet->deposit_amount == 0 ){
            if($userWallet->wining_amount == 0) {
                $bonus_amount = $userWallet->bonus_amount - $data['entry_fee'];    
            } else {
                $wining_amount = $userWallet->wining_amount - $data['entry_fee'];
            }
        } else {
            $deposit_amount = $userWallet->deposit_amount - $data['entry_fee'];
        }
        $previous_balance = $userWallet->current_balance;
        $current_balance = $deposit_amount + $wining_amount + $bonus_amount;

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
                'transaction_id' => $data['contest_id'] . '-' . $data['match_id'],
                'transaction_type' => 2,
                'transaction_amount' => $data['entry_fee'],
                'transaction_message' => 'Debited Contest Entry Fee Rs. ' . $data['entry_fee']
            ]);

            // Commit the transaction
            DB::commit();
        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();

            return $e;
        }
        
        foreach($data['players'] as $k => $vl){
            $insert = UserCombination::create([
                'user_id' => Auth::user()->id,
                'match_id' => $data['match_id'],
                'team1_player_id' => ($vl['team'] == 'Team1') ? $vl['player_id'] : 0, 
                'team2_player_id' => ($vl['team'] == 'Team2') ? $vl['player_id'] : 0,
                'player_type' => $vl['type']
            ]);
        }
        
        return $insert;
    }

    public function updateWallet($data){
        //fetch the current wallet data
        $userWallet = Auth::user()->latestbalance();
        
        $bonus_amount = (isset($userWallet->bonus_amount)) ? $userWallet->bonus_amount : 0.00;
        $deposit_amount = (isset($userWallet->deposit_amount)) ? $userWallet->deposit_amount + $data['transaction_amount'] : $data['transaction_amount'];
        $previous_balance = (isset($userWallet->current_balance)) ? $userWallet->current_balance : 0.00;
        $wining_amount = (isset($userWallet->wining_amount)) ? $userWallet->wining_amount : 0.00;
        $current_balance = $bonus_amount + $deposit_amount + $wining_amount;

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
