<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use Carbon\Carbon;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teamsArr = [
            [
                'name' => 'Mumbai Indians',
                'description' => 'Mumbai Indians',
                'sport_id' => 1,
                'country' => 'India',
                'status' => 1
            ],
            [
                'name' => 'Chenai Superkings',
                'description' => 'Chenai Superkings',
                'sport_id' => 1,
                'country' => 'India',
                'status' => 1
            ]
        ];

        foreach ($teamsArr as $team) {
            Team::create([
                'name' => $team['name'],
                'description' => $team['description'],
                'sport_id' => $team['sport_id'],
                'country' => $team['country'],
                'status' => $team['status']
            ]);
        }
    }
}
