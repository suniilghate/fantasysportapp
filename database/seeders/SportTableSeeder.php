<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sports;
use Carbon\Carbon;

class SportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sportsArr = [
            [
                'name' => 'Cricket',
                'description' => 'Cricket',
                'status' => 1
            ],
            [
                'name' => 'Kabaddi',
                'description' => 'Kabaddi',
                'status' => 1
            ]
        ];

        foreach ($sportsArr as $sprt) {
            Sports::create([
                'name' => $sprt['name'],
                'description' => $sprt['description'],
                'status' => $sprt['status']
            ]);
        }
    }
}
