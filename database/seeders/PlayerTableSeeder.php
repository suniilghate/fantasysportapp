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
            ['name' => 'Rohit Sharma','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Saurabh Tiwary','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Chris Lynn','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Anmolpreet Singh','sport_id' => 1,'age' => 38,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Suryakumar Yadav','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Krunal Pandya','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Kieron Pollar','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Hardik Pandya','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Sherfane Rutherford','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Anukul Roy','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Prince Balwant Rai','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Quinton de Kock','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 3,'status' => 1],
            ['name' => 'Aditya Tare','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 3,'status' => 1],
            ['name' => 'Ishan Kishan','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 3,'status' => 1],
            ['name' => 'Digvijay Deshmukh','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Jasprit Bumrah','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'James Pattinson','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Rahul Chahar','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Mohsin Khan','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Mitchell McClenaghan','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Dhawal Kulkarni','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Trent Boult','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Jayant Yadav','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Nathan Coulter-Nile','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            
            ['name' => 'Murali Vijay','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Ambati Rayudu','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Faf du Plessis','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Ruturaj Gaikwad','sport_id' => 1,'age' => 38,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Shane Watson','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Dwaye Bravo','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Kedar Jadhav','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Ravindra Jadeja','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Piyush Chawla','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Michell Shantar','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Monu Kumar','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Sam Curan','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Mahendra Sing Dhoni','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 3,'status' => 1],
            ['name' => 'N Jagadessan','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 3,'status' => 1],
            ['name' => 'Shardul Thakur','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Depak Chahar','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'KM Asif','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Imran Tahir','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Karn Sharma','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Lungi Ngidi','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Josh Hazlewood','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Ravisrinivasan Sai Kishore','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            
            ['name' => 'Shreyas Iyer','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Ajinkya Rahane','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Shikar Dhawan','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Shimron Hetmyer','sport_id' => 1,'age' => 38,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Prithvi Shaw','sport_id' => 1,'age' => 38,'gender_id' => 1,'type' => 1,'status' => 1],
            ['name' => 'Marcus Stonis','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Lalit Yadav','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Ravichandra Ashwin','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Axar Patel','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Keemo Paul','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Daniel Sams','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 2,'status' => 1],
            ['name' => 'Alex Carey','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 3,'status' => 1],
            ['name' => 'Rishabh Pant','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 3,'status' => 1],
            ['name' => 'Kagiso Rabada','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Sandeep Lamichhane','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Ishant Sharma','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Mohit Sharma','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Avesh Khan','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Tushar Deshpande','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Harshal Patel','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Amit Mishra','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Anrich Nortje','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1],
            ['name' => 'Praveen Dubey','sport_id' => 1,'age' => 30,'gender_id' => 1,'type' => 4,'status' => 1]
            
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
