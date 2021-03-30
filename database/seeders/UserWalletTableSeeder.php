<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserWallet;

class UserWalletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  
     * * @return void
     */
    public function run()
    {
        $userWalletArr = [
            ['user_id' => 1,'current_balance' => 200.00,'bonus_amount' => 100.00,'deposit_amount' => 100.00,'previous_balance' => 100.00,'wining_amount' => 0.00,'status' => 1]
        ];

        foreach ($userWalletArr as $wlt) {
            UserWallet::create([
                'user_id' => $wlt['user_id'],
                'current_balance' => $wlt['current_balance'],
                'bonus_amount' => $wlt['bonus_amount'],
                'deposit_amount' => $wlt['deposit_amount'],
                'previous_balance' => $wlt['previous_balance'],
                'wining_amount' => $wlt['wining_amount'],
                'status' => $wlt['status']
            ]);
        }
    }
}
