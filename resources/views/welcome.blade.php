@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div class="logo_laravel">

            </div>
            <h1 class="display-5 fw-bold text-center">
                Welcome to Deliveboo
            </h1>
            <p class="fw-bold py-2 text-center">Progetto : Matteo Lucerni , Guglielmo Piasenti , Matteo Nesti , Giacomo
                Arcangeli ,
                Andrea
                Creazzi</p>
            <a href="{{ route('admin.plates.index') }}" class="btn btn-primary btn-lg d-flex justify-content-center">Entra nel
                magico mondo dei
                ristoratori</a>
        </div>
    </div>
@endsection
