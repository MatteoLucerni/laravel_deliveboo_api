@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div class="logo_laravel">

            </div>
            <div class="info text-center">
                <h1 class="display-5 mb-5 fw-bold">
                    Welcome to Deliveboo
                </h1>
                <p>
                    Welcome to our platform tailored exclusively for restaurant owners looking to showcase their culinary
                    creations and dining establishments. Whether you run a cozy bistro, a trendy cafe, or a fine dining
                    restaurant, our website provides you with the perfect stage to present your unique offerings to a global
                    audience. Discover powerful tools and resources to enhance your online presence, attract new patrons,
                    and elevate your restaurant's reputation. Join our community of passionate restaurateurs today and let
                    your culinary journey shine!
                </p>
                <a href="http://localhost:5174/">If you are not a restaurant owner click here for redirect on user's page</a>
            </div>
            @auth
                <div class="mt-5 row gap-3 justify-content-center ">
                    <a class="col-5 h-100 btn btn-primary btn-lg d-flex justify-content-center"
                        href="{{ route('admin.plates.index') }}">Manage your restaurant and menù</a>
                    <a class="col-5 h-100 btn btn-success btn-lg d-flex justify-content-center"
                        href="{{ route('admin.orders.index') }}">Manage your restaurant's orders</a>
                </div>
            @else
                <div class="row gap-2 mt-5 justify-content-center ">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg d-flex justify-content-center col-5">Login</a>
                    <a href="{{ route('register') }}"
                        class="btn btn-success btn-lg d-flex justify-content-center col-5">Register</a>
                </div>
            @endauth
        </div>
    </div>
@endsection
