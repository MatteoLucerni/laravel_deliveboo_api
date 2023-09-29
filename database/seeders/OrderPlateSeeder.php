<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Plate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderPlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::find(1);
        $plate = Plate::find(1);


        $order->plates()->attach($plate, ['quantity'=>3]);
        $order->save();
    }
}
