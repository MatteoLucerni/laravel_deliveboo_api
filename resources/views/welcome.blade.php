@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div class="logo_laravel">

            </div>
            <h1 class="display-5 fw-bold text-center">
                Welcome to Deliveboo
            </h1>
            <p class="py-2 text-center">Matteo Lucerni, Guglielmo Piasenti, Matteo Nesti, Giacomo
                Arcangeli,
                Andrea
                Creazzi</p>
            @auth
                <div class="row gap-3 justify-content-center ">
                    <a class="col-5 h-100 btn btn-primary btn-lg d-flex justify-content-center"
                        href="{{ route('admin.plates.index') }}">Manage your restaurant and menù</a>
                    <a class="col-5 h-100 btn btn-success btn-lg d-flex justify-content-center"
                        href="{{ route('admin.orders.index') }}">Manage your restaurant's orders</a>
                </div>
            @else
                <a href="{{ route('admin.plates.index') }}" class="btn btn-primary btn-lg d-flex justify-content-center">Entra
                    nel
                    magico mondo dei
                    ristoratori</a>
            @endauth
        </div>
    </div>
@endsection
