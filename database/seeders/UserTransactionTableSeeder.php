<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserTransaction;

class UserTransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  
     * * @return void
     */
    public function run()
    {
        $userTransactionArr = [
            ['user_id' => 1,'transaction_id' => 'test345','transaction_type' => 1,'transaction_amount' => 100.00,'transaction_message' => 'Deposited Rs.100','status' => 1]
        ];

        foreach ($userTransactionArr as $trns) {
            UserTransaction::create([
                'user_id' => $trns['user_id'],
                'transaction_id' => $trns['transaction_id'],
                'transaction_type' => $trns['transaction_type'],
                'transaction_amount' => $trns['transaction_amount'],
                'transaction_message' => $trns['transaction_message'],
                'status' => $trns['status']
            ]);
        }
    }
}
