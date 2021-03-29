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
                'description' => 'MI',
                'sport_id' => 1,
                'country' => 'India',
                'status' => 1
            ],
            [
                'name' => 'Chenai Superkings',
                'description' => 'CSK',
                'sport_id' => 1,
                'country' => 'India',
                'status' => 1
            ],
            [
                'name' => 'Royal Challengers Banglore',
                'description' => 'RCB',
                'sport_id' => 1,
                'country' => 'India',
                'status' => 1
            ],
            [
                'name' => 'Delhi Capitals',
                'description' => 'DC',
                'sport_id' => 1,
                'country' => 'India',
                'status' => 1
            ],
            [
                'name' => 'Sunrisers Hyderabad',
                'description' => 'SRH',
                'sport_id' => 1,
                'country' => 'India',
                'status' => 1
            ],
            [
                'name' => 'Kolkatta Knight Riders',
                'description' => 'KKR',
                'sport_id' => 1,
                'country' => 'India',
                'status' => 1
            ],
            [
                'name' => 'Rajasthan Royals',
                'description' => 'RR',
                'sport_id' => 1,
                'country' => 'India',
                'status' => 1
            ],
            [
                'name' => 'Punjab Kings XL',
                'description' => 'PBKS',
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
