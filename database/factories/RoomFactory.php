<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'type' => $this->faker->randomElement(['simple', 'double', 'suite']),
            'price' => $this->faker->randomFloat(2, 50, 500),
            'status' => $this->faker->randomElement(['disponible', 'occupé', 'maintenance']),
        ];
    }
}
