<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    public function index()
    {
        $plates = Plate::all();

        return response()->json(compact('plates'));
    }

    public function show(string $id)
    {
        $plate = Plate::find($id);

        if (!$plate) return response(null, 404);

        return response()->json($plate);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $plate = new Plate();
        $plate->name = $data['name'];
        $plate->price = $data['price'];
        $plate->image = $data['image'];
        $plate->ingredients = $data['ingredients'];
        $plate->description = $data['description'];
        $plate->save();

        return response()->json();
    }

    public function destroy(string $id)
    {
        $plate = Plate::find($id);

        if (!$plate) return response(null, 404);

        $plate->delete();

        return response()->json('Deleted successfully');
    }
}
