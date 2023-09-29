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
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = $request->all();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        

        $restaurant = Restaurant::create([
            
            'name' => $request->restaurantName,
            'address' => $request->address,
            'vat_number' => $request->vatNumber

        ]);
        $user->restaurant()->save($restaurant);

        $typeName = $request->types;

        
        $type = Type::where('name' , $request->restaurantType)->first();

        if (!$type) {
        $type = Type::create(['name' => $request->restaurantType]);
        }

        $restaurant->types()->attach($type);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
