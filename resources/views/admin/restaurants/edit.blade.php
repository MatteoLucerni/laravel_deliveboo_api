@extends('layouts.app')
@section('content')
    <div class="restaurant-card px-5 my-4 mx-4">
        <div class="container py-5">
            <h1 class="display-5 fw-bold">
                Edit your restaurant
            </h1>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="restaurant-card p-5 mb-5">
                <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" class="needs-validation"
                    enctype="multipart/form-data" method="POST" id="submit-form">
                    @method('PATCH')
                    @csrf
                    <!-- Restaurant Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Restaurant Name <sup class="text-danger">*</sup></label>
                        <input value="{{ old('name', $restaurant->name) }}" name="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" id="name" required>
                        <small id="restaurant-name-error" class="text-danger"></small>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Restaurant Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Restaurant address <sup class="text-danger">*</sup></label>
                        <input value="{{ old('address', $restaurant->address) }}" name="address" type="text"
                            class="form-control @error('address') is-invalid @enderror" id="address" required>
                        <small id="restaurant-address-error" class="text-danger"></small>
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- phone number -->
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Restaurant phone number <sup
                                class="text-danger">*</sup></label>
                        <input value="{{ old('phone_number', $restaurant->phone_number) }}" name="phone_number"
                            type="text" class="form-control @error('phone_number') is-invalid @enderror"
                            id="phone_number" required>
                        <small id="restaurant-phone-number-error" class="text-danger"></small>
                        <small id="restaurant-phone-number-error-length" class="text-danger"></small>
                        @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Restaurant Description</label>
                        <textarea value="" name="description" type="text"
                            class="form-control @error('description') is-invalid @enderror" id="description">{{ old('description', $restaurant->description) }}
                    </textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- restaurant image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Restaurant image</label>
                        <input name="image" type="file" class="form-control @error('image') is-invalid @enderror"
                            id="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- vat_number -->
                    <div class="mb-3">
                        <label for="vat_number" class="form-label">Restaurant Vat Number <sup
                                class="text-danger">*</sup></label>
                        <input value="{{ old('vat_number', $restaurant->vat_number) }}" type="text" name="vat_number"
                            class="form-control @error('vat_number') is-invalid @enderror" id="vat_number" required>
                        <small id="restaurant-vat-number-error-length" class="text-danger"></small>
                        <small id="restaurant-vat-number-error" class="text-danger"></small>
                        @error('vat_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <label class="form-label">Types <sup class="text-danger">*</sup></label>

                    <div class="mb-3 row-cols-3 row-cols-md-auto">
                        @foreach ($types as $type)
                            <div class="form-check form-check-inline">
                                <input @if (in_array($type->id, old('type', $restaurant_type_ids ?? []))) checked @endif class="form-check-input"
                                    type="checkbox" id="tech-{{ $type->id }}" value="{{ $type->id }}"
                                    name="types[]">
                                <label class="form-check-label" for="tech-{{ $type->id }}">{{ $type->name }}</label>
                            </div>
                        @endforeach
                        <small id="type-error" class="text-danger"></small>
                        @error('types')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <!-- Submit Button -->
                    <div class="d-flex align-items-center justify-content-center gap-4">
                        <button type="submit" class="button-main-db" id="edit-button">Submit</button>
                        <a class="button-secondary-db" href="{{ route('admin.plates.index') }}">Go back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/edit-validation-restaurant-form.js')
@endsection
