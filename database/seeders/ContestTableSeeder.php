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
        $contest = Contest::create([
            'name' => 'Pool1',
            'contest_type' => 1,
            'match_id' => 1,
            'wining_amount' => 975.00,
            'entry_fee' => 100.00,
            'total_amount' => 1000.00,
            'contest_total_users' => 10,
            'status' => 1
        ]);
    }
}
