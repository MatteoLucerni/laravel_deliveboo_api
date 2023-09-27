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
        for ($i = 0; $i < 30; $i++) {
            $food = new Plate();
            $food->name = 'Pizza Margherita';
            $food->price = 9.99;
            $food->image = 'https://it.ooni.com/cdn/shop/articles/Margherita-9920.jpg?crop=center&height=800&v=1644590028&width=800';
            $food->ingredients = 'farina, sale, olio, mozzarella, pomodoro, basilico';
            $food->description = 'Deliziosa pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona pizza buona';
            $food->save();
        }
    }
}
