<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "name" => "Main dish",
                "color" => "#3498db"
            ],
            [
                "name" => "Appetizer",
                "color" => "#2ecc71"
            ],
            [
                "name" => "Side Dishes",
                "color" => "#34495e"
            ],
            [
                "name" => "Dessert",
                "color" => "#75a5a6"
            ],
            [
                "name" => "Other",
                "color" => "#bdc3c7"
            ],
        ];

        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->name = $category['name'];
            $new_category->color = $category['color'];
            $new_category->save();
        }
    }
}
