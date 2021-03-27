<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Match;
use Carbon\Carbon;

class MatchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $match = Match::create([
            'name' => 'Mumbai Indians Vs Chenai Superkings',
            'series_id' => 1,
            'team1' => 1,
            'team2' => 2,
            'date' => Carbon::now(),
            'status' => 1,
            'result' => 1
        ]);
    }
}
