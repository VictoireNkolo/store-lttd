<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 5; $i++) {
            Category::create(
                [
                    'name'       => Str::random(15),
                    'description'   => Str::random(1000)
                ]
            );
            Category::create(
                [
                    'name'       => Str::random(15),
                    'description'   => Str::random(1000)
                ]
            );
        }
    }
}
