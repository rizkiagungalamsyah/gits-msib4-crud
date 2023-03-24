<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('Id_ID');
        Product::create([
            'name' => 'Nasi Goreng',
            'price' => '10000',
            'category_id' => 1,
            'description' => $faker->sentence(5),
        ]);
        Product::create([
            'name' => 'Nasi Lengko',
            'price' => '12000',
            'category_id' => 1,
            'description' => $faker->sentence(5),
        ]);
        Product::create([
            'name' => 'Nasi Campur',
            'price' => '5000',
            'Category_id' => 1,
            'description' => $faker->sentence(5),
        ]);
        Product::create([
            'name' => 'Es Teh Manis',
            'price' => '5000',
            'Category_id' => 2,
            'description' => $faker->sentence(5),
        ]);
    }
}
