<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plate;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $restaurant = Restaurant::where('user_id', auth()->user()->id)->first();

        $restaurant->formatted_created_at = Carbon::parse($restaurant->created_at)->format('d/m/Y');
        $restaurant->formatted_updated_at = Carbon::parse($restaurant->updated_at)->format('d/m/Y');

        $plates = Plate::where('restaurant_id', $restaurant->id)->get();

        // Format the created_at date for each plate
        foreach ($plates as $plate) {
            $plate->formatted_created_at = Carbon::parse($plate->created_at)->format('d/m/Y');
            $plate->formatted_updated_at = Carbon::parse($plate->updated_at)->format('d/m/Y');
        }

        // Format the created_at date for each restaurant
        foreach ($plates as $plate) {
            $restaurant->formatted_created_at = Carbon::parse($restaurant->created_at)->format('d/m/Y');
            $restaurant->formatted_updated_at = Carbon::parse($restaurant->updated_at)->format('d/m/Y');
        }

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
                'image' => 'nullable|file',
                'ingredients' => 'required|string',
                'description' => 'nullable|string',
            ],
            [
                'name.required' => 'Name field is required',
                'name.string' => 'Name field must me a string',
                'price.required' => 'Price field is required',
                'price.numeric' => 'Price field must me a number',
                'image.file' => 'Image is not valid',
                'ingredients.required' => 'Ingredients field is required',
                'ingredients.string' => 'Ingredients field must be a string',
                'description.string' => 'Description field must me a string',
            ]
        );

        $data = $request->all();

        // Saving file's storage path on db

        if (array_key_exists('image', $data)) {
            $image_url = Storage::put('plate_images', $data['image']);
            $data['image'] = $image_url;
        } else {
            $data['image'] = 'placeholder.jpg';
        }

        $plate = new Plate();
        $plate->fill($data);
        if ($plate->is_visible != 1) {
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
            'image' => 'nullable|file',
            'ingredients' => 'required|string',
            'description' => 'nullable|string'
        ], [
            'name.required' => 'Name field is required',
            'name.string' => 'Name field must me a string',
            'price.required' => 'Price field is required',
            'price.numeric' => 'Price field must me a number',
            'image.image' => 'Image is not valid',
            'ingredients.required' => 'Ingredients field is required',
            'ingredients.string' => 'Ingredients field must be a string',
            'description.string' => 'Description field must me a string',
        ]);

        $data = $request->all();

        // Saving file's storage path on db

        if (array_key_exists('image', $data)) {
            $image_url = Storage::put('plate_images', $data['image']);
            $data['image'] = $image_url;
        } else {
            $data['image'] = 'placeholder.jpg';
        }

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

       
        $plate->is_visible = false;
        $plate->save(); 
        

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

        $plate->is_visible = true;
        $plate->save(); 

        if (!$plate) return abort(404);

        $plate->restore();

        return redirect()->route('admin.plates.trash');
    }
}
