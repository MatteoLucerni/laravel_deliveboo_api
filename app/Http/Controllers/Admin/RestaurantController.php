<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{

    public function edit(string $id)
    {
        $userId = Auth::id();

        $restaurant = Restaurant::findOrFail($id);

        if ($restaurant->user_id != $userId) return abort(403);

        return view('admin.restaurants.edit', compact('restaurant'));
    }

    public function update(Request $request, string $id)
    {
        $userId = Auth::id();

        $restaurant = Restaurant::findOrFail($id);

        if ($restaurant->user_id != $userId) return abort(403);

        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'image' => 'nullable|url',
            'vat_number' => 'required|size:13'
        ], [
            'name.required' => 'Name field is required',
            'name.string' => 'Name field must me a string',
            'address.required' => 'Address field is required',
            'address.string' => 'Address field must me a string',
            'vat_number.required' => 'Vat number field is required',
            'vat_number.size' => 'Vat number must contain 13 charaters'
        ]);

        $data = $request->all();

        $restaurant->update($data);

        $plates = Plate::where('restaurant_id', $restaurant->id)->get();

        return view('admin.plates.index', compact('restaurant', 'plates'));
    }
}
