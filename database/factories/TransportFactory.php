<?php

namespace Database\Factories;

use App\Models\Transport;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transport::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'license_plate' => $this->faker->numberBetween($min = 1000000, $max = 9900000),
          'status' => $this->faker->randomElement($array = array ('активная', 'на ремонте', 'продана', 'не используется')),
          'driver_id' => $this->faker->unique()->numberBetween($min = 1, $max = 100),
          'kind_id' => $this->faker->numberBetween($min = 1, $max = 4),
        ];
    }
}
