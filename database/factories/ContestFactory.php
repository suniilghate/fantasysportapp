<?php

namespace Database\Factories;

use App\Models\Contest;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'contest_type' => $this->faker->word,
        'match_id' => $this->faker->randomDigitNotNull,
        'wining_amount' => $this->faker->randomDigitNotNull,
        'entry_fee' => $this->faker->randomDigitNotNull,
        'total_amount' => $this->faker->randomDigitNotNull,
        'contest_total_users' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
