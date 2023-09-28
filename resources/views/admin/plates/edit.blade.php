@extends('layouts.app')

@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div class="logo_laravel">
                <!-- Your logo content here -->
            </div>
            <h1 class="display-5 fw-bold">
                Edit Plate
            </h1>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h3>Edit Plate</h3>

            @include('components.form', ['plate' => $plate])

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Update</button>
            <a class="btn btn-secondary" href="{{ route('admin.plates.index') }}">Go back</a>
            </form>
        </div>
    </div>
@endsection
