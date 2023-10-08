<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmation;
use App\Mail\RestaurantOrderMessage;
use App\Models\Order;
use App\Models\Plate;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        // check for plates validation

        foreach ($data['cartItems'] as $item) {
            if ($item['restaurant_id'] != $data['cartItems'][0]['restaurant_id'] || !count($data['cartItems'])) {
                return response(null, 403);
            }
        }

        $order = new Order();
        $order->restaurant_id = $data['cartItems'][0]['restaurant_id'];
        $order->name = $data['orderData']['name'];
        $order->surname = $data['orderData']['surname'];
        $order->tel = $data['orderData']['tel'];
        $order->email = $data['orderData']['email'];
        $order->status = true;
        $order->address = $data['orderData']['address'];
        $order->note = $data['orderData']['note'];
        $order->total_price = $data['totalPrice'];
        $order->save();

        foreach ($data['cartItems'] as $item) {

            $plate = Plate::find($item['id']);

            $order->plates()->attach($plate, ['quantity' => $item['quantity']]);
        }

        $restaurant = Restaurant::find($data['cartItems'][0]['restaurant_id']);

        $owner = User::find($restaurant['user_id']);

        // Mail for the restaurant
        $owner_mail = new RestaurantOrderMessage(
            customer: $data['orderData'],
            total_price: $data['totalPrice'],
            restaurant: $restaurant,
            payment: $data['paymentInfo'],
        );

        Mail::to($owner->email)->send($owner_mail);

        // Mail for the customer
        $mail = new OrderConfirmation(
            customer: $data['orderData'],
            total_price: $data['totalPrice'],
            restaurant: $restaurant,
            payment: $data['paymentInfo'],
        );

        Mail::to($data['orderData']['email'])->send($mail);

        return response()->json($data);
    }
}
