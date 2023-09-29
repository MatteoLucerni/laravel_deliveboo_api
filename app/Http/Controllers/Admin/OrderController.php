<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Plate;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('restaurant_id', auth()->user()->restaurant->id)->orderBy('created_at', 'ASC')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        $plates = $order->plates;
        
        foreach ($plates as $plate) {
            $quantity = $plate ? $plate->pivot->quantity : null;
            $plate['quantity'] = $quantity;
        }
        
        return view('admin.orders.show', compact('order', 'plates', 'quantity'));
    }
}
