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
        $MatchesArr = [
            ['name' => 'CHENNAI SUPER KINGS vs DELHI CAPITALS', 'series_id' => 1, 'team1' => 2, 'team2' => 4, 'date' => '2021-04-10 19:30:00', 'status' => 1, 'result' => 1],
            ['name' => 'DELHI CAPITALS vs MUMBAI INDIANS', 'series_id' => 1, 'team1' => 4, 'team2' => 1, 'date' => '2021-04-20 19:30:00', 'status' => 1, 'result' => 1],
            ['name' => 'MUMBAI INDIANS vs CHENNAI SUPER KINGS', 'series_id' => 1, 'team1' => 1, 'team2' => 2, 'date' => '2021-05-01 19:30:00', 'status' => 1, 'result' => 1],
            ['name' => 'CHENNAI SUPER KINGS vs MUMBAI INDIANS', 'series_id' => 1, 'team1' => 2, 'team2' => 1, 'date' => '2021-05-16 19:30:00', 'status' => 1, 'result' => 1],
            ['name' => 'DELHI CAPITALS vs CHENNAI SUPER KINGS', 'series_id' => 1, 'team1' => 4, 'team2' => 2, 'date' => '2021-05-21 19:30:00', 'status' => 1, 'result' => 1],
            ['name' => 'MUMBAI INDIANS vs DELHI CAPITALS', 'series_id' => 1, 'team1' => 1, 'team2' => 4, 'date' => '2021-05-23 19:30:00', 'status' => 1, 'result' => 1]
        ];
        foreach ($MatchesArr as $match) {
            Match::create([
                'name' => $match['name'],
                'series_id' => $match['series_id'],
                'team1' => $match['team1'],
                'team2' => $match['team2'],
                'date' => $match['date'],
                'status' => $match['status'],
                'result' => $match['result']
            ]);
        }
    }
}
