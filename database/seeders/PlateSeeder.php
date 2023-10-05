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
        $food->name = 'Spaghetti allo Scoglio';
        $food->price = 18.99;
        $food->image = 'plate_images/plate-1.jpg';
        $food->ingredients = 'Cozze, spaghetti, aglio, gamberi, vongole, pomodoro';
        $food->description = "Una succulenta bistecca alla griglia servita con sale, pepe e olio d'oliva.";
        $food->is_visible = true;
        $food->save();
    }
}
