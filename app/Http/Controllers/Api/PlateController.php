<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlateController extends Controller
{
    public function index()
    {
        $plates = Plate::whereNull('deleted_at')->get();

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

        $validator = Validator::make($data, [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
            'ingredients' => 'required|string',
            'description' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $plate = new Plate();
        $plate->name = $data['name'];
        $plate->price = $data['price'];
        $plate->image = $data['image'];
        $plate->ingredients = $data['ingredients'];
        $plate->description = $data['description'];
        $plate->save();

        return response()->json($plate);
    }

    public function update(Request $request, $id)
    {
        $plate = Plate::find($id);

        if (!$plate) return response(null, 404);

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
            'ingredients' => 'required|string',
            'description' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $plate->name = $data['name'];
        $plate->price = $data['price'];
        $plate->image = $data['image'];
        $plate->ingredients = $data['ingredients'];
        $plate->description = $data['description'];
        $plate->save();

        return response()->json('Updated successfully');
    }

    public function trash()
    {
        $plates = Plate::onlyTrashed()->get();
        return response()->json($plates);
    }

    public function destroy(string $id)
    {
        $plate = Plate::find($id);

        if (!$plate) return response(null, 404);

        $plate->delete();

        return response()->json('Plate moved to trash successfully');
    }

    public function dropAll()
    {
        Plate::onlyTrashed()->forceDelete();

        return response()->json('Deleted all successfully');
    }

    public function drop(string $id)
    {
        $plate = Plate::onlyTrashed()->find($id);

        if (!$plate) return response(null, 404);

        $plate->forceDelete();

        return response()->json('Plate deleted successfully');
    }

    public function restore(string $id)
    {
        $plate = Plate::onlyTrashed()->find($id);

        if (!$plate) return response(null, 404);

        $plate->restore();

        return response()->json('Plate restored successfully');
    }

    public function restoreAll()
    {
        Plate::onlyTrashed()->restore();

        return response()->json('All plates restored successfully');
    }
}
