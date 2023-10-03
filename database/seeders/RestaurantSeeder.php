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
                'phone_number' => '3345653425',
                'description' => 'Un grand bel ristorante di cibo!. Location favolosa e stuzzicante, servizio a disposizione di ogni vostra richiesta. Cosa aspetti a prenotare un tavolo da noi? Chiamaci!',
                'image' => 'https://www.081pizzeria.it/app/uploads/081-pizzeria-interno-1-scaled.jpg',
                'vat_number' => 'IT98746784967',
            ],
            [
                'user_id' => 2,
                'name' => 'Trattoria Buon Gusto',
                'address' => 'Via Roma 25',
                'phone_number' => '3345653425',
                'description' => 'Un grand bel ristorante di cibo!. Location favolosa e stuzzicante, servizio a disposizione di ogni vostra richiesta. Cosa aspetti a prenotare un tavolo da noi? Chiamaci!',
                'image' => 'https://images.squarespace-cdn.com/content/v1/5e484ab628c78d6f7e602d73/eae06316-cfce-4337-a4fb-0e66da934027/osteria-trattoria.jpg',
                'vat_number' => 'IT78945612345',
            ],
            [
                'user_id' => 3,
                'name' => 'Sushi Palace',
                'address' => 'Via Tokyo 8',
                'phone_number' => '3345653425',
                'description' => 'Un grand bel ristorante di cibo!. Location favolosa e stuzzicante, servizio a disposizione di ogni vostra richiesta. Cosa aspetti a prenotare un tavolo da noi? Chiamaci!',
                'image' => 'https://res.cloudinary.com/tf-lab/image/upload/restaurant/473d413e-c33e-408f-8adb-98e1503f9c32/b1af07b7-425e-4f3a-8199-5c2883323993.jpg',
                'vat_number' => 'IT65432198765',
            ],
            [
                'user_id' => 4,
                'name' => 'Mexican Fiesta',
                'address' => 'Calle del Sol 42',
                'phone_number' => '3345653425',
                'description' => 'Un grand bel ristorante di cibo!. Location favolosa e stuzzicante, servizio a disposizione di ogni vostra richiesta. Cosa aspetti a prenotare un tavolo da noi? Chiamaci!',
                'image' => 'https://popmenucloud.com/xrpblwcd/85ba676e-8969-4793-ba64-46c7724547be.jpg',
                'vat_number' => 'IT32165498732',
            ],
            [
                'user_id' => 5,
                'name' => 'Burger Haven',
                'address' => 'Main Street 7',
                'phone_number' => '3345653425',
                'description' => 'Un grand bel ristorante di cibo!. Location favolosa e stuzzicante, servizio a disposizione di ogni vostra richiesta. Cosa aspetti a prenotare un tavolo da noi? Chiamaci!',
                'image' => 'https://res.cloudinary.com/tf-lab/image/upload/restaurant/ebacd4a1-538e-4c6b-9474-d8cb71bf6666/2759e504-461e-4bbd-9073-a11b1933b1cd.jpg',
                'vat_number' => 'IT78901234567',
            ],
        ];


        foreach ($restaurants as $restaurant) {
            $new_restaurant = new Restaurant();
            $new_restaurant->user_id = $restaurant['user_id'];
            $new_restaurant->name = $restaurant['name'];
            $new_restaurant->address = $restaurant['address'];
            $new_restaurant->phone_number = $restaurant['phone_number'];
            $new_restaurant->description = $restaurant['description'];
            $new_restaurant->image = $restaurant['image'];
            $new_restaurant->vat_number = $restaurant['vat_number'];
            $new_restaurant->save();
        }
    }
}
