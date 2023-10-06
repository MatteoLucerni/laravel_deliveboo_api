@extends('layouts.app')
@section('content')
    <div class="jumbotron px-5 m-4 bg-light rounded-3">
        <div class="container py-5">
            <h1>Plate details</h1>
        </div>
    </div>

    <div class="content container">
        <div class="d-flex justify-content-center align-items-center text-center">
            <div class="restaurant-card my-3 p-4" style="width: 35rem;">
                <img class="img-fluid rounded-3 mb-3" src="{{ asset('storage/' . $plate->image) }}" alt="{{ $plate->name }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $plate->name }}</h3>
                    <div class="badge rounded-pill mb-1" style="background-color: {{ $plate->category->color }}">
                        {{ $plate->category->name }}
                    </div>
                    <h5>{{ $plate->price }}€</h5>
                    <p class="card-text">{{ $plate->description }}</p>
                    <p><Strong>Ingredients: </Strong>{{ $plate->ingredients }}</p>
                    <div class="d-flex align-items-center justify-content-center gap-3">
                        <a class="btn button-warning-db" href="{{ route('admin.plates.edit', $plate->id) }}"><i class="fa-solid fa-pen"></i> Edit</a>
                        <form class="d-inline-block" action="{{ route('admin.plates.destroy', $plate) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn button-danger-db">
                                <i class="fas fa-trash me-2"></i>Delete plate
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <a href="{{ route('admin.plates.index') }}" class="btn button-secondary-db">Go back to plates list</a>
        </div>
    </div>
@endsection
