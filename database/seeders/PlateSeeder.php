<?php

namespace Database\Seeders;

use App\Models\Plate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plates = config('plates');

        foreach ($plates as $plate) {
            $food = new Plate();
            $food->restaurant_id = $plate['restaurant_id'];
            $food->category_id = random_int(1, 5);
            $food->name = $plate['name'];
            $food->price = $plate['price'];
            $food->image = $plate['image'];
            $food->ingredients = $plate['ingredients'];
            $food->description = $plate['description'];
            $food->is_visible = $plate['is_visible'];
            $food->save();
        }
    }
}
