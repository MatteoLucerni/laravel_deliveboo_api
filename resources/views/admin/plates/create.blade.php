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
            <h3>Add a plate</h3>

            @include('components.form', ['plate' => new \App\Models\Plate()])

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection



