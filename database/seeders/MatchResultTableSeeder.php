<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MatchResult;
use Carbon\Carbon;

class MatchResultTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matchResultArr = [
            ['match_id' => 1,'team1_id' => 2,'team2_id' => 4,'team1_runs_scored' => 131,'team1_wickets_falled' => 7,'team2_runs_scored' => 175,'team2_wickets_falled' => 3,'team1_result' => 0,'team2_result' => 1,'status' => 1],
            ['match_id' => 2,'team1_id' => 4,'team2_id' => 1,'team1_runs_scored' => 110,'team1_wickets_falled' => 9,'team2_runs_scored' => 111,'team2_wickets_falled' => 1,'team1_result' => 0,'team2_result' => 1,'status' => 1],
            ['match_id' => 3,'team1_id' => 1,'team2_id' => 2,'team1_runs_scored' => 162,'team1_wickets_falled' => 9,'team2_runs_scored' => 166,'team2_wickets_falled' => 5,'team1_result' => 0,'team2_result' => 1,'status' => 1],
            ['match_id' => 4,'team1_id' => 2,'team2_id' => 1,'team1_runs_scored' => 114,'team1_wickets_falled' => 9,'team2_runs_scored' => 116,'team2_wickets_falled' => 0,'team1_result' => 0,'team2_result' => 1,'status' => 1],
            ['match_id' => 5,'team1_id' => 4,'team2_id' => 2,'team1_runs_scored' => 185,'team1_wickets_falled' => 5,'team2_runs_scored' => 179,'team2_wickets_falled' => 4,'team1_result' => 1,'team2_result' => 0,'status' => 1],
            ['match_id' => 6,'team1_id' => 1,'team2_id' => 4,'team1_runs_scored' => 200,'team1_wickets_falled' => 5,'team2_runs_scored' => 143,'team2_wickets_falled' => 8,'team1_result' => 1,'team2_result' => 0,'status' => 1]
        ];

        foreach ($matchResultArr as $mtr) {
            MatchResult::create([
                'match_id' => $mtr['match_id'],
                'team1_id' => $mtr['team1_id'],
                'team2_id' => $mtr['team2_id'],
                'team1_runs_scored' => $mtr['team1_runs_scored'],
                'team1_wickets_falled' => $mtr['team1_wickets_falled'],
                'team2_runs_scored' => $mtr['team2_runs_scored'],
                'team2_wickets_falled' => $mtr['team2_wickets_falled'],
                'team1_result' => $mtr['team1_result'],
                'team2_result' => $mtr['team2_result'],
                'status' => $mtr['status']
            ]);
        }
    }
}
