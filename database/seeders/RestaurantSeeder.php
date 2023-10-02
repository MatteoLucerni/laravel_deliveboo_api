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

        $restaurants = [
            [
                'user_id' => 1,
                'name' => 'Pizzeria Rosso Pomodoro',
                'address' => 'Via della Repubblica 13',
                'image' => 'https://www.081pizzeria.it/app/uploads/081-pizzeria-interno-1-scaled.jpg',
                'vat_number' => 'IT98746784967',
            ],
            [
                'user_id' => 2,
                'name' => 'Trattoria Buon Gusto',
                'address' => 'Via Roma 25',
                'image' => 'https://www.081pizzeria.it/app/uploads/081-pizzeria-interno-1-scaled.jpg',
                'vat_number' => 'IT78945612345',
            ],
            [
                'user_id' => 3,
                'name' => 'Sushi Palace',
                'address' => 'Via Tokyo 8',
                'image' => 'https://www.081pizzeria.it/app/uploads/081-pizzeria-interno-1-scaled.jpg',
                'vat_number' => 'IT65432198765',
            ],
            [
                'user_id' => 4,
                'name' => 'Mexican Fiesta',
                'address' => 'Calle del Sol 42',
                'image' => 'https://www.081pizzeria.it/app/uploads/081-pizzeria-interno-1-scaled.jpg',
                'vat_number' => 'IT32165498732',
            ],
            [
                'user_id' => 5,
                'name' => 'Burger Haven',
                'address' => 'Main Street 7',
                'image' => 'https://www.081pizzeria.it/app/uploads/081-pizzeria-interno-1-scaled.jpg',
                'vat_number' => 'IT78901234567',
            ],
        ];


        foreach ($restaurants as $restaurant) {
            $new_restaurant = new Restaurant();
            $new_restaurant->user_id = $restaurant['user_id'];
            $new_restaurant->name = $restaurant['name'];
            $new_restaurant->address = $restaurant['address'];
            $new_restaurant->image = $restaurant['image'];
            $new_restaurant->vat_number = $restaurant['vat_number'];
            $new_restaurant->save();
        }
    }
}
