<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $category = new Category();
        $category->name = 'main_dish';
        $category->image = 'https://www.giallozafferano.it/images/244-24489/Spaghetti-alla-Carbonara_600x500.jpg';
        $category->color = $faker->hexColor;

        $category->save();
    }
}
