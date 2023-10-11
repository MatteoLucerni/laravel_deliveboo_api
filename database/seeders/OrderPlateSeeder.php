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
        $numberOfPlates = 12;

        for ($i = 1; $i < $numberOfPlates; $i++) {
            $order = Order::find($i);
            $plate = Plate::find($i);

            $plate_2 = Plate::find($i + 1);

            $order->plates()->attach($plate, ['quantity' => 3]);
            $order->plates()->attach($plate_2, ['quantity' => 4]);
            $order->save();
        }
    }
}
