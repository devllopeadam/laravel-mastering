<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Commande;
use App\Models\CommandeProduit;
use App\Models\Produit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Client::factory(5)->create()->each(function ($client) {
            $produits = Produit::factory(10)->create();

            $commandes = Commande::factory(2)->create(['client_id' => $client->id]);

            $commandes->each(function ($commande) use ($produits) {
                $produits->random(rand(2, 5))->each(function ($produit) use ($commande) {
                    CommandeProduit::factory()->create([
                        'commande_id' => $commande->id,
                        'produit_id' => $produit->id,
                    ]);
                });
            });
        });
    }
}
