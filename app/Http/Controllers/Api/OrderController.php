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

        $validator = Validator::make($data, []);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }


        $order = new Order();
        $order->name = $data['name'];
        $order->surname = $data['surname'];
        $order->email = $data['email'];
        $order->tel = $data['tel'];
        $order->address = $data['address'];
        $order->note = $data['note'];
        $order->total_price = $data['totalPrice'];
        $order->save();

        $plates = $data['plates'];
        foreach ($plates as $plate) {
            $order->plates()->attach($plate->id, ['quantity' => $plate['quantity']]);
        }

        return response()->json($order);
    }
}
