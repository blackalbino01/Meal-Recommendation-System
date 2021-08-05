<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AllergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('allergies')->insert([
            'allergy_type' => 'Nut Allergy'
        ]);

        DB::table('allergies')->insert([
            'allergy_type' => 'ShellFish Allergy'
        ]);

        DB::table('allergies')->insert([
            'allergy_type' => 'SeaFood Allergy'
        ]);

    }
}
