<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Plate;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{

    public function edit(string $id)
    {
        $userId = Auth::id();

        $restaurant = Restaurant::findOrFail($id);

        if ($restaurant->user_id != $userId) return abort(403);

        $types = Type::all();

        $restaurant_type_ids = $restaurant->types->pluck('id')->toArray();

        return view('admin.restaurants.edit', compact('restaurant', 'types', 'restaurant_type_ids'));
    }

    public function update(Request $request, string $id)
    {
        $userId = Auth::id();

        $restaurant = Restaurant::findOrFail($id);

        if ($restaurant->user_id != $userId) return abort(403);

        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|size:10',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'vat_number' => 'required|size:13',
            'types' => 'required|exists:types,id',
        ], [
            'name.required' => 'Name field is required',
            'name.string' => 'Name field must be a string',
            'address.required' => 'Address field is required',
            'address.string' => 'Address field must me a string',
            'phone_number.required' => 'Phone number field is required',
            'phone_number.size' => 'Phone number must contain 10 charaters',
            'description.string' => 'Name field must be a string',
            'vat_number.required' => 'Vat number field is required',
            'vat_number.size' => 'Vat nupsmber must contain 13 charaters',
            'types.required' => 'At least a type is required',
            'image.image' => 'Image not valid'
        ]);


        $data = $request->all();

        // Saving file's storage path on db

        if (array_key_exists('image', $data)) {
            $image_url = Storage::put('restaurant_images', $data['image']);
            $data['image'] = $image_url;
        }

        $restaurant->update($data);

        if (!Arr::exists($data, 'types') && count($restaurant->types)) $restaurant->types()->detach();
        elseif (Arr::exists($data, 'types')) $restaurant->types()->sync($data['types']);

        return to_route('admin.plates.index')->with('toast-message', 'Restaurant updated successfully');
    }

    public function stats(Restaurant $restaurant)
    {
        $orders = $restaurant->orders;

        $monthNames = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];


        $totalIncame = 0;

        foreach ($orders as $order) {
            $totalIncame = $totalIncame + $order->total_price;
        }

        $orderMonthlyData = Order::where('restaurant_id', $restaurant->id)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->get();

        $revenueMonthlyData = Order::where('restaurant_id', $restaurant->id)
            ->selectRaw('MONTH(created_at) as month, SUM(total_price) as total')
            ->groupBy('month')
            ->get();

        $labels = $orderMonthlyData->pluck('month')->map(function ($month) use ($monthNames) {
            return $monthNames[$month];
        });

        $orderData = $orderMonthlyData->pluck('total');
        $revenueData = $revenueMonthlyData->pluck('total');

        return view('admin.restaurants.stats', compact('labels', 'totalIncame', 'orderData', 'revenueData'));
    }
}
