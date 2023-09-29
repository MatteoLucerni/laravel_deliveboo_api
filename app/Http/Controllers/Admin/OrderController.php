<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
        $orders = Order::findOrFail($id);
        return view('admin.orders.show', compact('orders'));
    }
}
