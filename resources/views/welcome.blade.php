@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container-fluid px-0 overflow-x-hidden">
        <video autoplay muted preload="auto" class="object-fit-contain">
            <source src="{{ asset('deliveboo-banner-orange.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class="filter-card p-5 mx-3 my-5">
        <div class="container">
            <div class="info text-center">
                <h1 class="display-5 mb-3 fw-bold">
                    Welcome to Deliveboo
                </h1>
                <div class="divider-horizontal mb-4 mx-1"></div>
                <p>
                    Welcome to our platform tailored exclusively for restaurant owners looking to showcase their
                    culinary
                    creations and dining establishments. Whether you run a cozy bistro, a trendy cafe, or a fine dining
                    restaurant, our website provides you with the perfect stage to present your unique offerings to a
                    global
                    audience. Discover powerful tools and resources to enhance your online presence, attract new
                    patrons,
                    and elevate your restaurant's reputation. Join our community of passionate restaurateurs today and
                    let
                    your culinary journey shine!
                </p>
                <a href="http://localhost:5174/">Not an owner? Click here and check out our user's website!</a>
            </div>
            @auth
                <div class="mt-5 row gap-4 justify-content-center flex-column flex-md-row">
                    <a class="col-5-md col-lg-5 button-main-db text-center" href="{{ route('admin.plates.index') }}">Manage your
                        restaurant and menu</a>
                    <a class="col-5-md col-lg-5 button-danger-db text-center" href="{{ route('admin.orders.index') }}">Manage
                        your restaurant's orders</a>
                    <a class="col-5-md col-lg-5 button-danger-db text-center"
                        href="{{ route('admin.restaurants.stats', $restaurant) }}">See
                        your
                        restaurant's stats</a>
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
