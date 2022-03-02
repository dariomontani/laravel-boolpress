<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Model\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newCategory = new Category();
            $newCategory->name = $faker->words(3, true);
            $newCategory->slug = Str::slug($newCategory->name . '-' . $i, '-');
            $newCategory->save();
        }
    }
}
