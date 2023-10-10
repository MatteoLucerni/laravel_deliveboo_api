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
                'description' => 'A charming Italian pizzeria with a delightful atmosphere and a wide range of culinary delights. Our dedicated staff is at your service to make your dining experience exceptional. Reserve your table now!',
                'image' => 'restaurant_images/rest-1.jpg',
                'vat_number' => 'IT98746784967',
            ],
            [
                'user_id' => 2,
                'name' => 'Trattoria Buon Gusto',
                'address' => 'Via Roma 25',
                'phone_number' => '3345653425',
                'description' => 'Discover a taste of Italy at Trattoria Buon Gusto! Our exquisite dishes and cozy ambiance create the perfect setting for an unforgettable meal. Don\'t hesitate to call and make a reservation.',
                'image' => 'restaurant_images/rest-2.jpg',
                'vat_number' => 'IT78945612345',
            ],
            [
                'user_id' => 3,
                'name' => 'Sushi Palace',
                'address' => 'Via Tokyo 8',
                'phone_number' => '3345653425',
                'description' => 'Indulge in the finest sushi cuisine at Sushi Palace! Our enchanting location and attentive service will ensure a memorable dining experience. Contact us to secure your table today.',
                'image' => 'restaurant_images/rest-3.jpg',
                'vat_number' => 'IT65432198765',
            ],
            [
                'user_id' => 4,
                'name' => 'Mexican Fiesta',
                'address' => 'Calle del Sol 42',
                'phone_number' => '3345653425',
                'description' => 'Experience the flavors of Mexico at Mexican Fiesta! We offer an inviting atmosphere and a menu that caters to all tastes. Book your table now for an incredible dining journey.',
                'image' => 'restaurant_images/rest-4.jpg',
                'vat_number' => 'IT32165498732',
            ],
            [
                'user_id' => 5,
                'name' => 'Burger Haven',
                'address' => 'Main Street 7',
                'phone_number' => '3345653425',
                'description' => 'Join us at Burger Haven for an incredible burger experience! Our stylish decor and exceptional service set the stage for an unforgettable meal. Call us today to reserve your spot.',
                'image' => 'restaurant_images/rest-5.jpg',
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
