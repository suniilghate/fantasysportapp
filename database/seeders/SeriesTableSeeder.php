<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Series;
use Carbon\Carbon;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $series = Series::create([
            'name' => 'IPL 2021',
            'sport_id' => 1,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(30),
            'status' => 1,
        ]);
    }
}
