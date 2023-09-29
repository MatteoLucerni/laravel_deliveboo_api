<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('restaurant_id', auth()->user()->restaurant->id)->orderBy('created_at', 'ASC')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(string $id)
    {
        $userId = Auth::id();

        $order = Order::findOrFail($id);

        if ($order->restaurant->user_id != $userId) {
            return abort(403);
        }

        $plates = $order->plates;

        foreach ($plates as $plate) {
            $quantity = $plate ? $plate->pivot->quantity : null;
            $plate['quantity'] = $quantity;
        }

        return view('admin.orders.show', compact('order', 'plates', 'quantity'));
    }

    public function destroy(string $id)
    {
        $userId = Auth::id();

        $order = Order::findOrFail($id);

        if ($order->restaurant->user_id != $userId) {
            return abort(403);
        }

        $order->delete();

        return redirect()->route('admin.orders.index');
    }
}
