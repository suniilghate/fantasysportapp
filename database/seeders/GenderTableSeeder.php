<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;
use Carbon\Carbon;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gendersArr = [
            [
                'name' => 'Male'
            ],
            [
                'name' => 'Female'
            ]
        ];

        foreach ($gendersArr as $gendr) {
            foreach($gendr as $k => $vl){
                Gender::create([$k => $vl]);
            }
        }
    }
}
