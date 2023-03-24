<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        Category::create([
            'name' => 'Makanan',
            'description' => $faker->sentence(5),
        ]);

        Category::create([
            'name' => 'Minuman',
            'description' => $faker->sentence(5),
        ]);
    }
}
