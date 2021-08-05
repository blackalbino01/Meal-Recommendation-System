<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Allergy;


class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

        for ($i = 0; $i < 50; $i++){
            DB::table('meals')->insert([
                'main_item' => $faker->foodName(),
                'allergy_id' => Allergy::inRandomOrder()->first()->id,
                'created_at' => now(),
            ]);
        }
    }
}
