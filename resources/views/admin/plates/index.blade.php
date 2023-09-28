@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div class="logo_laravel">

            </div>
            <h1 class="display-5 fw-bold">
                Plates page
            </h1>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h3>{{ $restaurant->name }}</h3>
            <a class="btn btn-success" href="{{ route('admin.plates.create') }}">Create a new plate</a>
            @forelse ($plates as $plate)
                <li class="my-3">
                    {{ $plate->name }}
                    <a href="{{ route('admin.plates.show', $plate->id) }}" class="btn btn-primary">Details</a>
                </li>
            @empty
                <h3>No plates</h3>
            @endforelse
        </div>
    </div>
@endsection
