<?php

namespace Database\Factories;

use App\Models\TransportKind;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransportKindFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransportKind::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'transport_kind' => $this->faker->unique()->randomElement($array = array ('Легковые авто','Грузовики','Фургоны','Спецтехника')),
        ];
    }
}
