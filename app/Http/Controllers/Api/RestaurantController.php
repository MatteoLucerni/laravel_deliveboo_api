<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plate;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->input('filter', []);
        $keyword = $request->input('keyword', '');

        $restaurants = Restaurant::with('types');

        if (!empty($filters)) {
            $restaurants->whereHas('types', function ($query) use ($filters) {
                $query->whereIn('name', $filters);
            }, '=', count($filters));
        }

        if (!empty($keyword)) {
            $restaurants->where('name', 'LIKE', '%' . $keyword . '%');
        }

        $restaurants = $restaurants->paginate(4);
        $types = Type::all();

        return response()->json(compact('restaurants', 'types'));
    }




    public function show(string $id)
    {
        $restaurant = Restaurant::find($id);

        $plates = Plate::with('category')->orderBy('category_id', 'ASC')->get();

        if (!$restaurant) return response(null, 404);

        return response()->json(compact('restaurant', 'plates'));
    }
}
