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
            $food->restaurant_id = 1;
            $food->category_id = random_int(1, 5);
            $food->name = $plate['name'];
            $food->price = $plate['price'];
            $food->image = $plate['image'];
            $food->ingredients = $plate['ingredients'];
            $food->description = $plate['description'];
            $food->is_visible = $plate['is_visible'];
            $food->save();
        }

        $food = new Plate();
        $food->restaurant_id = 2;
        $food->category_id = random_int(1, 5);
        $food->name = 'Seafood Pizza';
        $food->price = 18.99;
        $food->image = 'plate_images/plate-1.jpg';
        $food->ingredients = 'Mussels, spaghetti, garlic, shrimp, clams, tomato';
        $food->description = "A special pizza prepared with our freshest seafood.";
        $food->is_visible = true;
        $food->save();

        $food = new Plate();
        $food->restaurant_id = 3;
        $food->category_id = random_int(1, 5);
        $food->name = 'Mixed Sushi';
        $food->price = 25.00;
        $food->image = 'plate_images/plate-2.jpg';
        $food->ingredients = 'Rice, salmon, tuna, avocado, nori seaweed, soy sauce.';
        $food->description = "A platter of mixed sushi with our best cuts.";
        $food->is_visible = true;
        $food->save();

        $food = new Plate();
        $food->restaurant_id = 4;
        $food->category_id = random_int(1, 5);
        $food->name = 'Chili Tacos';
        $food->price = 14.00;
        $food->image = 'plate_images/plate-4.jpg';
        $food->ingredients = 'Corn flour tacos, beef, red beans, chili.';
        $food->description = "A great taco with delicious chili and spicy sauce.";
        $food->is_visible = true;
        $food->save();

        $food = new Plate();
        $food->restaurant_id = 5;
        $food->category_id = random_int(1, 5);
        $food->name = 'Double Cheeseburger';
        $food->price = 7.99;
        $food->image = 'plate_images/plate-5.jpg';
        $food->ingredients = 'Beef burger, lettuce, tomato, cheddar cheese.';
        $food->description = "The all-time classic!";
        $food->is_visible = true;
        $food->save();
    }
}
