<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $restaurant = Restaurant::find($i);
            $type = Type::find($i);

            $restaurant->types()->attach($type);
            $restaurant->save();
        }

        $restaurant = Restaurant::find(1);
        $type = Type::find(2);
        $restaurant->types()->attach($type);
        $restaurant->save();
    }
}
