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

            <form action="{{ route('admin.plates.update', $plate->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Plate Name -->
                <div class="mb-3">
                    <label for="plateName" class="form-label">Plate Name</label>
                    <input name="name" type="text" class="form-control" id="plateName" value="{{ old('name', $plate->name) }}" required>
                </div>

                <!-- Plate Image -->
                <div class="mb-3">
                    <label for="plateImage" class="form-label">Plate Image URL</label>
                    <input name="image" type="url" class="form-control" id="plateImage" value="{{ old('image', $plate->image) }}" required>
                </div>

                <!-- Plate Price -->
                <div class="mb-3">
                    <label for="platePrice" class="form-label">Plate Price</label>
                    <input name="price" type="number" class="form-control" id="platePrice" value="{{ old('price', $plate->price) }}" required>
                </div>

                <!-- Plate Ingredients -->
                <div class="mb-3">
                    <label for="plateIngredients" class="form-label">Plate Ingredients</label>
                    <textarea name="ingredients" class="form-control" id="plateIngredients" required>{{ old('ingredients', $plate->ingredients) }}</textarea>
                </div>

                <!-- Plate Description -->
                <div class="mb-3">
                    <label for="plateDescription" class="form-label">Plate Description</label>
                    <textarea name="description" class="form-control" id="plateDescription" required>{{ old('description', $plate->description) }}</textarea>
                </div>

                <!-- Plate Description -->
                <div class="mb-3">
                    <label for="is_visible" class="form-label">Visible?</label>
                    <input value="1" type="checkbox" name="is_visible" id="is_visible" {{ $plate->is_visible ? 'checked' : '' }}>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
@endsection
