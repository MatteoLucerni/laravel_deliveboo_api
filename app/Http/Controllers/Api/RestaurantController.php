<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', []);

        $restaurants = Restaurant::with('types')->whereHas('types', function ($query) use ($filter) {
            foreach ($filter as $f) {
                $query->where('name', $f);
            }
        })->get();

        $types = Type::all();

        return response()->json(compact('restaurants', 'types', 'filter'));
    }

    public function show(string $id)
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) return response(null, 404);

        return response()->json($restaurant);
    }
}
