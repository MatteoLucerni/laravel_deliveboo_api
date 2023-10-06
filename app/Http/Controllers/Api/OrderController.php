<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
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


        return response()->json($data);
    }
}
