<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contest;
use Carbon\Carbon;

class ContestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contestArr = [
            ['name' => 'Pool1', 'contest_type' => 1, 'match_id' => 1, 'wining_amount' => 100.00, 'entry_fee' => 20.00, 'total_amount' => 120.00, 'contest_total_users' => 6, 'status' => 1],
            ['name' => 'Pool2', 'contest_type' => 1, 'match_id' => 1, 'wining_amount' => 550.00, 'entry_fee' => 60.00, 'total_amount' => 600.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool3', 'contest_type' => 1, 'match_id' => 1, 'wining_amount' => 150.00, 'entry_fee' => 10.00, 'total_amount' => 200.00, 'contest_total_users' => 20, 'status' => 1],
            ['name' => 'Pool4', 'contest_type' => 1, 'match_id' => 1, 'wining_amount' => 45.00, 'entry_fee' => 5.00, 'total_amount' => 50.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool5', 'contest_type' => 2, 'match_id' => 1, 'wining_amount' => 50.00, 'entry_fee' => 0.00, 'total_amount' => 0.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool1', 'contest_type' => 1, 'match_id' => 2, 'wining_amount' => 100.00, 'entry_fee' => 20.00, 'total_amount' => 120.00, 'contest_total_users' => 6, 'status' => 1],
            ['name' => 'Pool2', 'contest_type' => 1, 'match_id' => 2, 'wining_amount' => 550.00, 'entry_fee' => 60.00, 'total_amount' => 600.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool3', 'contest_type' => 1, 'match_id' => 2, 'wining_amount' => 150.00, 'entry_fee' => 10.00, 'total_amount' => 200.00, 'contest_total_users' => 20, 'status' => 1],
            ['name' => 'Pool4', 'contest_type' => 1, 'match_id' => 2, 'wining_amount' => 45.00, 'entry_fee' => 5.00, 'total_amount' => 50.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool5', 'contest_type' => 2, 'match_id' => 2, 'wining_amount' => 50.00, 'entry_fee' => 0.00, 'total_amount' => 0.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool1', 'contest_type' => 1, 'match_id' => 3, 'wining_amount' => 100.00, 'entry_fee' => 20.00, 'total_amount' => 120.00, 'contest_total_users' => 6, 'status' => 1],
            ['name' => 'Pool2', 'contest_type' => 1, 'match_id' => 3, 'wining_amount' => 550.00, 'entry_fee' => 60.00, 'total_amount' => 600.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool3', 'contest_type' => 1, 'match_id' => 3, 'wining_amount' => 150.00, 'entry_fee' => 10.00, 'total_amount' => 200.00, 'contest_total_users' => 20, 'status' => 1],
            ['name' => 'Pool4', 'contest_type' => 1, 'match_id' => 3, 'wining_amount' => 45.00, 'entry_fee' => 5.00, 'total_amount' => 50.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool5', 'contest_type' => 2, 'match_id' => 3, 'wining_amount' => 50.00, 'entry_fee' => 0.00, 'total_amount' => 0.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool1', 'contest_type' => 1, 'match_id' => 4, 'wining_amount' => 100.00, 'entry_fee' => 20.00, 'total_amount' => 120.00, 'contest_total_users' => 6, 'status' => 1],
            ['name' => 'Pool2', 'contest_type' => 1, 'match_id' => 4, 'wining_amount' => 550.00, 'entry_fee' => 60.00, 'total_amount' => 600.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool3', 'contest_type' => 1, 'match_id' => 4, 'wining_amount' => 150.00, 'entry_fee' => 10.00, 'total_amount' => 200.00, 'contest_total_users' => 20, 'status' => 1],
            ['name' => 'Pool4', 'contest_type' => 1, 'match_id' => 4, 'wining_amount' => 45.00, 'entry_fee' => 5.00, 'total_amount' => 50.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool5', 'contest_type' => 2, 'match_id' => 4, 'wining_amount' => 50.00, 'entry_fee' => 0.00, 'total_amount' => 0.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool1', 'contest_type' => 1, 'match_id' => 5, 'wining_amount' => 100.00, 'entry_fee' => 20.00, 'total_amount' => 120.00, 'contest_total_users' => 6, 'status' => 1],
            ['name' => 'Pool2', 'contest_type' => 1, 'match_id' => 5, 'wining_amount' => 550.00, 'entry_fee' => 60.00, 'total_amount' => 600.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool3', 'contest_type' => 1, 'match_id' => 5, 'wining_amount' => 150.00, 'entry_fee' => 10.00, 'total_amount' => 200.00, 'contest_total_users' => 20, 'status' => 1],
            ['name' => 'Pool4', 'contest_type' => 1, 'match_id' => 5, 'wining_amount' => 45.00, 'entry_fee' => 5.00, 'total_amount' => 50.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool5', 'contest_type' => 2, 'match_id' => 5, 'wining_amount' => 50.00, 'entry_fee' => 0.00, 'total_amount' => 0.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool1', 'contest_type' => 1, 'match_id' => 6, 'wining_amount' => 100.00, 'entry_fee' => 20.00, 'total_amount' => 120.00, 'contest_total_users' => 6, 'status' => 1],
            ['name' => 'Pool2', 'contest_type' => 1, 'match_id' => 6, 'wining_amount' => 550.00, 'entry_fee' => 60.00, 'total_amount' => 600.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool3', 'contest_type' => 1, 'match_id' => 6, 'wining_amount' => 150.00, 'entry_fee' => 10.00, 'total_amount' => 200.00, 'contest_total_users' => 20, 'status' => 1],
            ['name' => 'Pool4', 'contest_type' => 1, 'match_id' => 6, 'wining_amount' => 45.00, 'entry_fee' => 5.00, 'total_amount' => 50.00, 'contest_total_users' => 10, 'status' => 1],
            ['name' => 'Pool5', 'contest_type' => 2, 'match_id' => 6, 'wining_amount' => 50.00, 'entry_fee' => 0.00, 'total_amount' => 0.00, 'contest_total_users' => 10, 'status' => 1]
        ];

        foreach ($contestArr as $contest) {
            Contest::create([
                'name' => $contest['name'],
                'contest_type' => $contest['contest_type'],
                'match_id' => $contest['match_id'],
                'wining_amount' => $contest['wining_amount'],
                'entry_fee' => $contest['entry_fee'],
                'total_amount' => $contest['total_amount'],
                'contest_total_users' => $contest['contest_total_users'],
                'status' => $contest['status']
            ]);
        }
    }
}
