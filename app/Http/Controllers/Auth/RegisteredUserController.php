<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();

        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        // Saving in storage the image file

        if (isset($request->image)) {
            $image_url = Storage::putFile('restaurant_images', $request->image);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'restaurantName' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phoneNumber' => ['required', 'string', 'size:10'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image'],
            'vatNumber' => ['required', 'string', 'size:13'],
            'types' => [
                'required',
                'array',
                Rule::exists('types', 'id')
            ],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $restaurant = Restaurant::create([
            'name' => $request->restaurantName,
            'address' => $request->address,
            'phone_number' => $request->phoneNumber,
            'description' => $request->description,
            'image' => $image_url ?? 'placeholder.jpg',
            'vat_number' => $request->vatNumber,
        ]);

        $user->restaurant()->save($restaurant);

        if (array_key_exists('types', $request->all())) {
            $restaurant->types()->attach($request->types);
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
