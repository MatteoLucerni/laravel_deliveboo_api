<?php

namespace Database\Seeders;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = new Order();
        $order->restaurant_id = 1;
        $order->order_date = Carbon::now()->toDateString();
        $order->name = 'Guglielmo';
        $order->surname = 'Arcangeli';
        $order->status = true;
        $order->address = 'via pippo 2';
        $order->note = 'sono allergico al pomodoro, alla mozzarella, alla farina, all\'olio, e sono intollerante al glutine, grazie';
        $order->total_price = 62;
        $order->save();
    }
}
