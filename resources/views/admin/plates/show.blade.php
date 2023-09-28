@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div class="logo_laravel">

            </div>
            <h1 class="display-5 fw-bold">
                Plate details
            </h1>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <img class="w-25" src="{{ $plate->image }}" alt="{{ $plate->name }}">
            <h3>
                {{ $plate->name }}
            </h3>
            <h3>
                {{ $plate->price }}€
            </h3>
            <p>{{ $plate->ingredients }}</p>
            <p>{{ $plate->description }}</p>
            <a href="{{ route('admin.plates.index') }}" class="btn btn-secondary">Go back to plates list</a>

        </div>
    </div>
@endsection
