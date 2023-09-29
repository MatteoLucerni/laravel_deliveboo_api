<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserSeeder::class, RestaurantSeeder::class, CategorySeeder::class, PlateSeeder::class, OrderSeeder::class, TypeSeeder::class, OrderPlateSeeder::class]);
    }
}
