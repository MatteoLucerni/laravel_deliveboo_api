<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Plate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('restaurant_id', auth()->user()->restaurant->id)->orderBy('created_at', 'ASC')->get();

        // Format the created_at date for each order
        foreach ($orders as $order) {
            $order->formatted_created_at = Carbon::parse($order->created_at)->format('d/m/Y');
        }

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

    public function trash()
    {
        $userId = Auth::id();

        $orders = Order::onlyTrashed()
            ->whereHas('restaurant', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();

        return view('admin.orders.trash', compact('orders'));
    }

    public function dropAll()
    {
        $userId = Auth::id();

        Order::onlyTrashed()
            ->whereHas('restaurant', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->forceDelete();

        return redirect()->route('admin.orders.trash');
    }

    public function drop(string $id)
    {
        $userId = Auth::id();

        $order = Order::onlyTrashed()->where('id', $id)->whereHas('restaurant', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->first();

        if (!$order) return abort(404);

        $order->forceDelete();

        return redirect()->route('admin.orders.trash');
    }

    public function restore(string $id)
    {
        $userId = Auth::id();

        $order = Order::onlyTrashed()->where('id', $id)->whereHas('restaurant', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->first();

        if (!$order) return abort(404);

        $order->restore();

        return redirect()->route('admin.orders.trash');
    }
}
