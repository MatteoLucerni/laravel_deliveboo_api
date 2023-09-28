@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div class="logo_laravel">
            </div>
            <h1>Plate details</h1>
        </div>
    </div>

    <div class="content container">
        <a href="{{ route('admin.plates.index') }}" class="btn btn-secondary">Go back to plates list</a>
        <div class="d-flex justify-content-center align-items-center text-center">
            <div class="card my-4" style="width: 35rem;">
                <img class="img-fluid rounded-1" src="{{ $plate->image }}" alt="{{ $plate->name }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $plate->name }}</h3>
                    <div class="badge rounded-pill mb-1" style="background-color: {{ $plate->category->color }}">
                        {{ $plate->category->name }}
                    </div>
                    <h5>{{ $plate->price }}€</h5>
                    <p class="card-text">{{ $plate->description }}</p>
                    <p><Strong>Ingredients: </Strong>{{ $plate->ingredients }}</p>
                    <a class="btn btn-warning" href="{{ route('admin.plates.edit', $plate->id) }}">Edit</a>
                    <form class="d-inline-block" action="{{ route('admin.plates.destroy', $plate) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            <i class="fas fa-trash me-2"></i>Delete plate
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
