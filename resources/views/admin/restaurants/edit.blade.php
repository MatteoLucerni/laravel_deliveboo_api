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

            <form action="{{ route('admin.restaurants.update', $restaurant) }}" class="needs-validation" method="POST">
                @method('PATCH')
                @csrf
                <!-- Plate Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Restaurant Name</label>
                    <input value="{{ old('name', $restaurant->name) }}" name="name" type="text"
                        class="form-control @error('name') is-invalid @enderror" id="name" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Plate Address -->
                <div class="mb-3">
                    <label for="address" class="form-label">Restaurant address</label>
                    <input value="{{ old('address', $restaurant->address) }}" name="address" type="text"
                        class="form-control @error('address') is-invalid @enderror" id="address" required>
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Plate image -->
                <div class="mb-3">
                    <label for="image" class="form-label">Restaurant image</label>
                    <input value="{{ old('image', $restaurant->image) }}" name="image" type="url"
                        class="form-control @error('image') is-invalid @enderror" id="image" required>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Plate vat_number -->
                <div class="mb-3">
                    <label for="vat_number" class="form-label">Restaurant Vat Number</label>
                    <input value="{{ old('vat_number', $restaurant->vat_number) }}" type="text" name="vat_number"
                        class="form-control @error('vat_number') is-invalid @enderror" id="vat_number" required>
                    @error('vat_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
