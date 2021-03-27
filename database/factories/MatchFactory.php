<?php

namespace Database\Factories;

use App\Models\Match;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Match::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'team1' => $this->faker->randomDigitNotNull,
        'date' => $this->faker->word,
        'status' => $this->faker->word,
        'result' => $this->faker->word,
        'name' => $this->faker->word,
        'sport_id' => $this->faker->randomDigitNotNull,
        'team1' => $this->faker->randomDigitNotNull,
        'team2' => $this->faker->randomDigitNotNull,
        'date' => $this->faker->word,
        'status' => $this->faker->word,
        'result' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
