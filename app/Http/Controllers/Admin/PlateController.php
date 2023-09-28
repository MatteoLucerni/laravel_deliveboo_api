<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::where('user_id', auth()->user()->id)->first();
        $plates = Plate::where('restaurant_id', $restaurant->id)->get();
        return view('admin.plates.index', compact('restaurant', 'plates'));
    }

    public function show(string $id)
    {
        $plate = Plate::findOrFail($id);

        return view('admin.plates.show', compact('plate'));
    }

    public function create()
    {
        return view('admin.plates.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $plate = new Plate();
        $plate->fill($data);
        $plate->save();

        $restaurant = Restaurant::where('user_id', auth()->user()->id)->first();

        $restaurant->plates()->save($plate);

        return to_route('admin.plates.show', $plate->id);
    }
}
