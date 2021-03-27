<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlayerType;
use Carbon\Carbon;

class PlayerTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $playerTypeArr = [
            [
                'name' => 'Bat',
                'description' => 'Batsman'
            ],
            [
                'name' => 'Wkt',
                'description' => 'Wicket Keeper'
            ],
            [
                'name' => 'All',
                'description' => 'All Rounder'
            ],
            [
                'name' => 'Bowl',
                'description' => 'Bowler'
            ]
        ];

        foreach ($playerTypeArr as $ptype) {
            PlayerType::create([
                'name' => $ptype['name'],
                'description' => $ptype['description']
            ]);
        }
    }
}
