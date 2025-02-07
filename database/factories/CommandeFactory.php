<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Commande::class;
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'client_id' => Client::factory(),
        ];
    }
}
