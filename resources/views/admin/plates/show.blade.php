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

            <h3>
                {{ $plate->name }}
            </h3>
            <a href="{{ route('admin.plates.index') }}" class="btn btn-secondary">Go back to plates list</a>

        </div>
    </div>
@endsection
