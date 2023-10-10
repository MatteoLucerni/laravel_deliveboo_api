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
        $restaurantId = 1;
        $numberOfOrders = 10;

        for ($i = 1; $i < $numberOfOrders; $i++) {
            $order = new Order();
            $order->restaurant_id = $restaurantId;
            $order->name = 'Nome';
            $order->surname = 'Cognome' . ($i);
            $order->tel = '345345345' . ($i);
            $order->email = 'email' . ($i) . '@email.com';
            $order->status = true;
            $order->address = 'Indirizzo' . ($i);
            $order->note = 'Nota per l\'ordine' . ($i);
            $order->total_price = 10 * ($i);
            $order->created_at = "2023-$i-10 16:33:46";
            $order->updated_at = "2023-$i-10 16:33:46";
            $order->save();
        }

        $order = new Order();
        $order->restaurant_id = $restaurantId;
        $order->name = 'NomeTest';
        $order->surname = 'Cognome';
        $order->tel = '4564564564';
        $order->email = 'email' . '@email.com';
        $order->status = true;
        $order->address = 'Indirizzo';
        $order->note = 'Nota per l\'ordine';
        $order->total_price = 230;
        $order->created_at = "2023-2-10 16:33:46";
        $order->updated_at = "2023-2-10 16:33:46";
        $order->save();

        $order = new Order();
        $order->restaurant_id = $restaurantId;
        $order->name = 'Nometest';
        $order->surname = 'Cognome';
        $order->tel = '4352342341';
        $order->email = 'email' . '@email.com';
        $order->status = true;
        $order->address = 'Indirizzo';
        $order->note = 'Nota per l\'ordine';
        $order->total_price = 130;
        $order->created_at = "2023-5-10 16:33:46";
        $order->updated_at = "2023-5-10 16:33:46";
        $order->save();
    }
}
