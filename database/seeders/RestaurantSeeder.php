<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Faker\Provider\it_IT\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurant = new Restaurant();

        $restaurant->user_id = 1;
        $restaurant->name = 'Pizzeria Rosso Pomodoro';
        $restaurant->address = 'Via della Repubblica 13';
        $restaurant->image = 'https://www.081pizzeria.it/app/uploads/081-pizzeria-interno-1-scaled.jpg';
        $restaurant->vat_number = 'IT98746784967';
        $restaurant->save();
    }
}
