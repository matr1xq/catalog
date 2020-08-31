<?php

use Illuminate\Database\Seeder;
use App\Product;
use Faker\Provider\Base;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $eld = rand(1, 5);
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'title' => $faker->name,
                'eld' => $faker->numberBetween(1, 5),
                'price' => $faker->randomFloat(0, 200),
                'category' => [],
            ]);
        }
    }
}
