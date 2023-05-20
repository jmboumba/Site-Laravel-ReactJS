<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Annonce;

class AnnoncessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();
        // Create 50 product records 
        for ($i = 0; $i < 20; $i++) {
            Annonce::create([
                'title' => $faker->title,
                'description' => $faker->paragraph,
                'price' => $faker->randomNumber(2),
                'availability' => $faker->boolean(50),
                'date_depot' => $faker->date(),
                'nb_vue' => $faker->randomNumber(2),
                'heure_depot' => $faker->date()
            ]);
        }
    }
}

