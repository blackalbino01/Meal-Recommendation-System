<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Meal;


class SideItemSeeder extends Seeder
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

        for ($i = 0; $i < 120; $i++){
            DB::table('side_items')->insert([
                'side_item' => $faker->sauceName(),
                'meal_id' => Meal::inRandomOrder()->first()->id,
                'created_at' => now(),
            ]);
        }
    }
}
