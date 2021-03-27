<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContestType;
use Carbon\Carbon;

class ContestTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contestTypeArr = [
            [
                'name' => 'Paid'
            ],
            [
                'name' => 'Free'
            ]
        ];

        foreach ($contestTypeArr as $gendr) {
            foreach($gendr as $k => $vl){
                ContestType::create([$k => $vl]);
            }
        }
    }
}
