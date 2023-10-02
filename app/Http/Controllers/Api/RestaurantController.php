<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();

        return response()->json(compact('restaurants'));
    }

    public function show(string $id)
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) return response(null, 404);

        return response()->json($restaurant);
    }
}
