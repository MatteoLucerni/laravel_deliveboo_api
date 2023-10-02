<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlateController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $restaurant = Restaurant::where('user_id', auth()->user()->id)->first();
        $plates = Plate::where('restaurant_id', $restaurant->id)->get();

        $trash_plates = Plate::onlyTrashed()
            ->whereHas('restaurant', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();

        $trash_count = count($trash_plates);

        return view('admin.plates.index', compact('restaurant', 'plates', 'trash_count'));
    }

    public function show(string $id)
    {
        $userId = Auth::id();

        $plate = Plate::where('id', $id)
            ->whereHas('restaurant', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->first();

        if (!$plate) return abort(404);

        return view('admin.plates.show', compact('plate'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.plates.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'nullable|url',
                'ingredients' => 'required|string',
                'description' => 'nullable|string',
            ],
            [
                'name.required' => 'Name field is required',
                'name.string' => 'Name field must me a string',
                'price.required' => 'Price field is required',
                'price.numeric' => 'Price field must me a number',
                'image.url' => 'Image url is not valid',
                'ingredients.required' => 'Ingredients field is required',
                'ingredients.string' => 'Ingredients field must be a string',
                'description.string' => 'Description field must me a string',
            ]
        );

        $data = $request->all();

        $plate = new Plate();
        $plate->fill($data);

        if (isset($plate->is_visible) || $plate->is_visible != '1') {
            $plate->is_visible = 0;
        };
        $plate->category_id = $data['category_id'];
        $plate->save();

        $restaurant = Restaurant::where('user_id', auth()->user()->id)->first();

        $restaurant->plates()->save($plate);

        return to_route('admin.plates.show', $plate->id);
    }

    public function edit(Plate $plate)
    {
        $restaurant = $plate->restaurant;

        if ($restaurant->user_id !== Auth::id()) abort(403);

        $categories = Category::all();
        return view('admin.plates.edit', compact('plate', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $userId = Auth::id();

        $plate = Plate::findOrFail($id);

        if ($plate->restaurant->user_id != $userId) return abort(403);

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
            'ingredients' => 'required|string',
            'description' => 'nullable|string'
        ], [
            'name.required' => 'Name field is required',
            'name.string' => 'Name field must me a string',
            'price.required' => 'Price field is required',
            'price.numeric' => 'Price field must me a number',
            'image.url' => 'Image url is not valid',
            'ingredients.required' => 'Ingredients field is required',
            'ingredients.string' => 'Ingredients field must be a string',
            'description.string' => 'Description field must me a string',
        ]);

        $data = $request->all();

        if (isset($plate->is_visible) || $plate->is_visible != '1') {
            $plate->is_visible = 0;
        };

        $plate->update($data);

        return redirect()->route('admin.plates.show', $plate->id);
    }


    public function destroy(Plate $plate)
    {
        $restaurant = $plate->restaurant;

        if ($restaurant->user_id !== Auth::id()) abort(403);

        $plate->delete();

        return to_route('admin.plates.index');
    }

    // trash

    public function trash()
    {
        $userId = Auth::id();

        $plates = Plate::onlyTrashed()
            ->whereHas('restaurant', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();

        return view('admin.plates.trash', compact('plates'));
    }


    public function dropAll()
    {
        $userId = Auth::id();

        Plate::onlyTrashed()
            ->whereHas('restaurant', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->forceDelete();

        return redirect()->route('admin.plates.trash');
    }


    public function drop(string $id)
    {
        $userId = Auth::id();

        $plate = Plate::onlyTrashed()->where('id', $id)->whereHas('restaurant', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->first();

        if (!$plate) return abort(404);

        $plate->forceDelete();

        return redirect()->route('admin.plates.trash');
    }



    public function restore(string $id)
    {
        $userId = Auth::id();

        $plate = Plate::onlyTrashed()->where('id', $id)->whereHas('restaurant', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->first();

        if (!$plate) return abort(404);

        $plate->restore();

        return redirect()->route('admin.plates.trash');
    }
}
