<?php

namespace Database\Seeders; 

use Illuminate\Database\Seeder;
use App\Models\gem;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class GemSeeder extends Seeder {
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 80; $i++) {

            //Seeding Photos :
            $type_gem = $faker->randomElement(['Collier', 'Anneau', 'Bracelet','Boucles oreilles']);
            
            switch ($type_gem) {
                case 'Anneau':
                      $photo1_gem = 'ring1.jpg';
                      $photo2_gem = 'ring2.jpg';
                    break;
                case 'Collier':
                      $photo1_gem = 'necklace1.jpg';
                      $photo2_gem = 'necklace2.jpg';
                    break;
                case 'Bracelet':
                      $photo1_gem = 'bracelet1.jpg';
                      $photo2_gem = 'bracelet2.jpg';
                    break;
                case 'Boucles oreilles':
                    $photo1_gem = 'boucles1.jpg';
                    $photo2_gem = 'boucles2.jpg';
                    break;
                default:  
                    $photo1_gem = 'gem_default1.jpg';
                    $photo2_gem = 'gem_default2.jpg';}

            //Seeding slug using name and type:
            $name = $faker->words(3,true);
            $slug = Str::slug("$name-$type_gem");

            
            gem::create([
                'name' => $name,
                'description' => $faker->sentence,
                'type' => $type_gem,
                'photo1' => $photo1_gem,
                'photo2' => $photo2_gem,
                'collection' => $faker->randomElement(['Automne 2023','Ete 2023','Hiver 2024']),
                'prix' => $faker->randomFloat(0,100, 3000),
                'qte_stock' => $faker->numberBetween(10, 100),
                'type_metal' => $faker->randomElement(['Or', 'Argent', 'Platine']),
                'slug' => $slug,
            ]);
        }
    }
}

