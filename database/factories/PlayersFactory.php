<?php

namespace Database\Factories;

use App\Models\Players;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Players::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'sport_id' => $this->faker->randomDigitNotNull,
        'age' => $this->faker->randomDigitNotNull,
        'gender' => $this->faker->word,
        'type' => $this->faker->word,
        'status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
