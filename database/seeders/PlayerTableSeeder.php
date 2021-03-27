<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Players;
use Carbon\Carbon;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $playersArr = [
            [
                'name' => 'Rohit Sharma',
                'sport_id' => 1,
                'age' => 34,
                'gender_id' => 1,
                'type' => 1,
                'status' => 1
            ],
            [
                'name' => 'Mahendra Singh Dhoni',
                'sport_id' => 1,
                'age' => 38,
                'gender_id' => 1,
                'type' => 2,
                'status' => 1
            ]
        ];

        foreach ($playersArr as $plyr) {
            Players::create([
                'name' => $plyr['name'],
                'sport_id' => $plyr['sport_id'],
                'age' => $plyr['age'],
                'gender_id' => $plyr['gender_id'],
                'type' => $plyr['type'],
                'status' => $plyr['status']
            ]);
        }
    }
}
