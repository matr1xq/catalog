<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Category::truncate();


        $faker = \Faker\Factory::create();
        $eld = rand(1, 5);

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Category::create([
                'title' => $faker->sentence,
                'eld' => $eld,
            ]);
        }
    }
}
