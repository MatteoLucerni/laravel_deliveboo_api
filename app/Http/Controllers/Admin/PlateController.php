<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
                'description' => 'required|string',
            ],
            [
                'name.required' => 'Name field is required',
                'name.string' => 'Name field must me a string',
                'price.required' => 'Price field is required',
                'price.numeric' => 'Price field must me a number',
                'image.url' => 'Image url is not valid',
                'ingredients.required' => 'Ingredients field is required',
                'ingredients.string' => 'Ingredients field must be a string',
                'description.required' => 'Description field is required',
                'description.string' => 'Description field must me a string',
            ]
        );

        $data = $request->all();

        $plate = new Plate();
        $plate->fill($data);
        $plate->category_id = $data['category_id'];
        $plate->save();

        $restaurant = Restaurant::where('user_id', auth()->user()->id)->first();

        $restaurant->plates()->save($plate);

        return to_route('admin.plates.show', $plate->id);
    }

    public function edit(Plate $plate)
    {
        return view('admin.plates.edit', compact('plate'));
    }

    public function update(Request $request, string $id)
    {
        $plate = Plate::findOrFail($id);

        $request->validate(
            [
                'name' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'nullable|string',
                'ingredients' => 'required|string',
                'description' => 'nullable|string'
            ],
            [
                'name.required' => 'Name field is required',
                'name.string' => 'Name field must me a string',
                'price.required' => 'Price field is required',
                'price.numeric' => 'Price field must me a number',
                'image.url' => 'Image url is not valid',
                'ingredients.required' => 'Ingredients field is required',
                'ingredients.string' => 'Ingredients field must be a string',
                'description.required' => 'Description field is required',
                'description.string' => 'Description field must me a string',
            ]

        );

        $data = $request->all();

        $plate->update($data);

        $plate->save();

        return to_route('admin.plates.show', $plate->id);
    }

    public function destroy(Plate $plate)
    {
        $plate->delete();
        return to_route('admin.plates.index')->with('alert-message', "plate '$plate->title' moved to trash successfully")->with('alert-type', 'success');
    }

    // trash

    public function trash()
    {
        $plates = Plate::onlyTrashed()->get();
        return view('admin.plates.trash', compact('plates'));
    }

    public function dropAll()
    {
        plate::onlyTrashed()->forceDelete();
        return to_route('admin.plates.trash')->with('alert-message', "All plates in the trash deleted successfully")->with('alert-type', 'success');
    }

    public function drop(string $id)
    {
        $plate = Plate::onlyTrashed()->findOrFail($id);

        $plate->forceDelete();

        return redirect()->route('admin.plates.trash')->with('alert-message', "plate '$plate->title' deleted successfully")->with('alert-type', 'success');
    }


    public function restore(string $id)
    {
        $plate = Plate::onlyTrashed()->findOrFail($id);

        $plate->restore();

        return to_route('admin.plates.trash')->with('alert-message', "plate '$plate->title' restored successfully")->with('alert-type', 'success');
    }
}
