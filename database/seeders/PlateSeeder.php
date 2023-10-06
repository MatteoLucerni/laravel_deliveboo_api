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

        $food = new Plate();
        $food->restaurant_id = 3;
        $food->category_id = random_int(1, 5);
        $food->name = 'Sushi Misto';
        $food->price = 25.00;
        $food->image = 'plate_images/plate-2.jpg';
        $food->ingredients = 'Riso, salmone, tonno, avocado, alga nori, soia.';
        $food->description = "Portata di sushi misto con i nostri migliori tagli.";
        $food->is_visible = true;
        $food->save();

        $food = new Plate();
        $food->restaurant_id = 4;
        $food->category_id = random_int(1, 5);
        $food->name = 'Chili Tacos';
        $food->price = 14.00;
        $food->image = 'plate_images/plate-4.jpg';
        $food->ingredients = 'Tacos di farina di mais, carne di manzo, fagioli rossi, peperoncino.';
        $food->description = "Un ottimo tacos, con dell'ottimo chili, e una buonissima salsa piccante.";
        $food->is_visible = true;
        $food->save();
        $food = new Plate();

        $food->restaurant_id = 5;
        $food->category_id = random_int(1, 5);
        $food->name = 'Doppio Cheese Burger';
        $food->price = 7.99;
        $food->image = 'plate_images/plate-5.jpg';
        $food->ingredients = 'Hamburger di manzo, insalata, pomodoro, formaggio cheddar.';
        $food->description = "Il grande classico!";
        $food->is_visible = true;
        $food->save();
    }
}
