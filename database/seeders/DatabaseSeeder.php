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
        // Seed Films
        // DB::table('films')->insert([
        //     ['titre' => 'Inception', 'anne' => '2010-07-16', 'durre' => '02:28:00', 'genre' => 'Sci-Fi'],
        //     ['titre' => 'Titanic', 'anne' => '1997-12-19', 'durre' => '03:14:00', 'genre' => 'Romance'],
        //     ['titre' => 'The Dark Knight', 'anne' => '2008-07-18', 'durre' => '02:32:00', 'genre' => 'Action'],
        //     ['titre' => 'Interstellar', 'anne' => '2014-11-07', 'durre' => '02:49:00', 'genre' => 'Sci-Fi'],
        //     ['titre' => 'Avatar', 'anne' => '2009-12-18', 'durre' => '02:42:00', 'genre' => 'Fantasy'],
        // ]);

        // // Seed Acteurs
        // DB::table('acteur')->insert([
        //     ['nom' => 'DiCaprio', 'prenom' => 'Leonardo', 'pay' => 'USA', 'date_naissance' => '1974-11-11', 'tele' => '1234567890'],
        //     [
        //         'nom' => 'Hardy',
        //         'prenom' => 'Tom',
        //         'pay' => 'UK',
        //         'date_naissance' => '1977-09-15',
        //         'tele' => '1234567891'
        //     ],
        //     ['nom' => 'Bale', 'prenom' => 'Christian', 'pay' => 'UK', 'date_naissance' => '1974-01-30', 'tele' => '1234567892'],
        //     ['nom' => 'Cotillard', 'prenom' => 'Marion', 'pay' => 'France', 'date_naissance' => '1975-09-30', 'tele' => '1234567893'],
        //     ['nom' => 'McConaughey', 'prenom' => 'Matthew', 'pay' => 'USA', 'date_naissance' => '1969-11-04', 'tele' => '1234567894'],
        // ]);

        // // Seed Participation
        // DB::table('participation')->insert([
        //     [
        //         'acteur_id' => 1,
        //         'film_id' => 1,
        //         'role' => 'Dom Cobb'
        //     ],
        //     [
        //         'acteur_id' => 1,
        //         'film_id' => 2,
        //         'role' => 'Jack Dawson'
        //     ],
        //     [
        //         'acteur_id' => 3,
        //         'film_id' => 3,
        //         'role' => 'Bruce Wayne'
        //     ],
        //     [
        //         'acteur_id' => 4,
        //         'film_id' => 1,
        //         'role' => 'Mal Cobb'
        //     ],
        //     [
        //         'acteur_id' => 5,
        //         'film_id' => 4,
        //         'role' => 'Cooper'
        //     ],
        // ]);

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
