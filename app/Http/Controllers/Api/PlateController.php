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
}
