<?php

namespace Database\Factories;

use App\Models\Commande;
use App\Models\CommandeProduit;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommandeProduit>
 */
class CommandeProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CommandeProduit::class;

    public function definition()
    {
        return [
            'commande_id' => Commande::factory(),
            'produit_id' => Produit::factory(),
            'qte_cmd' => $this->faker->numberBetween(1, 5),
        ];
    }
}
