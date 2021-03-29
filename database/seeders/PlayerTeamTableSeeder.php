<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlayerTeam;
use Carbon\Carbon;

class PlayerTeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $playerTeamArr = [
            ['players_id' => '1','team_id' => 1],
            ['players_id' => '2','team_id' => 1],
            ['players_id' => '3','team_id' => 1],
            ['players_id' => '4','team_id' => 1],
            ['players_id' => '5','team_id' => 1],
            ['players_id' => '6','team_id' => 1],
            ['players_id' => '7','team_id' => 1],
            ['players_id' => '8','team_id' => 1],
            ['players_id' => '9','team_id' => 1],
            ['players_id' => '10','team_id' => 1],
            ['players_id' => '11','team_id' => 1],
            ['players_id' => '12','team_id' => 1],
            ['players_id' => '13','team_id' => 1],
            ['players_id' => '14','team_id' => 1],
            ['players_id' => '15','team_id' => 1],
            ['players_id' => '16','team_id' => 1],
            ['players_id' => '17','team_id' => 1],
            ['players_id' => '18','team_id' => 1],
            ['players_id' => '19','team_id' => 1],
            ['players_id' => '20','team_id' => 1],
            ['players_id' => '21','team_id' => 1],
            ['players_id' => '22','team_id' => 1],
            ['players_id' => '23','team_id' => 1],
            ['players_id' => '24','team_id' => 1],
            
            ['players_id' => '25','team_id' => 2],
            ['players_id' => '26','team_id' => 2],
            ['players_id' => '27','team_id' => 2],
            ['players_id' => '28','team_id' => 2],
            ['players_id' => '29','team_id' => 2],
            ['players_id' => '30','team_id' => 2],
            ['players_id' => '31','team_id' => 2],
            ['players_id' => '32','team_id' => 2],
            ['players_id' => '33','team_id' => 2],
            ['players_id' => '34','team_id' => 2],
            ['players_id' => '35','team_id' => 2],
            ['players_id' => '36','team_id' => 2],
            ['players_id' => '37','team_id' => 2],
            ['players_id' => '38','team_id' => 2],
            ['players_id' => '39','team_id' => 2],
            ['players_id' => '40','team_id' => 2],
            ['players_id' => '41','team_id' => 2],
            ['players_id' => '42','team_id' => 2],
            ['players_id' => '43','team_id' => 2],
            ['players_id' => '44','team_id' => 2],
            ['players_id' => '45','team_id' => 2],
            ['players_id' => '46','team_id' => 2],
            
            ['players_id' => '47','team_id' => 4],
            ['players_id' => '48','team_id' => 4],
            ['players_id' => '49','team_id' => 4],
            ['players_id' => '50','team_id' => 4],
            ['players_id' => '51','team_id' => 4],
            ['players_id' => '52','team_id' => 4],
            ['players_id' => '53','team_id' => 4],
            ['players_id' => '54','team_id' => 4],
            ['players_id' => '55','team_id' => 4],
            ['players_id' => '56','team_id' => 4],
            ['players_id' => '57','team_id' => 4],
            ['players_id' => '58','team_id' => 4],
            ['players_id' => '59','team_id' => 4],
            ['players_id' => '60','team_id' => 4],
            ['players_id' => '61','team_id' => 4],
            ['players_id' => '62','team_id' => 4],
            ['players_id' => '63','team_id' => 4],
            ['players_id' => '64','team_id' => 4],
            ['players_id' => '65','team_id' => 4],
            ['players_id' => '66','team_id' => 4],
            ['players_id' => '67','team_id' => 4],
            ['players_id' => '68','team_id' => 4],
            ['players_id' => '69','team_id' => 4]
        ];

        foreach ($playerTeamArr as $plyrtm) {
            PlayerTeam::create([
                'players_id' => $plyrtm['players_id'],
                'team_id' => $plyrtm['team_id']
            ]);
        }
    }
}
