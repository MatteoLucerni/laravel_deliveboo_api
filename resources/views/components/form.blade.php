@extends('layouts.app')

@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div class="logo_laravel">
                <!-- Your logo content here -->
            </div>
            <h1 class="display-5 fw-bold">
                @if ($plate->exists)
                    Edit Plate
                @else
                    Create Plate
                @endif
            </h1>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h3>
                @if ($plate->exists)
                    Edit
                @else
                    Create
                @endif Plate
            </h3>

            <form class="my-5" method="POST" enctype="multipart/form-data" novalidate
                @if ($plate->exists) action="{{ route('admin.plates.update', $plate->id) }}"
    @else
        action="{{ route('admin.plates.store') }}" @endif>
                @csrf
                @if ($plate->exists)
                    @method('PUT')
                @endif

                <!-- Plate Name -->
                <div class="mb-3">
                    <label for="plateName" class="form-label">Plate Name</label>
                    <input name="name" type="text" class="@error('name') is-invalid @enderror form-control"
                        id="plateName" value="{{ old('name', $plate->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Plate Image -->
                <div class="mb-3">
                    <label for="plateImage" class="form-label">Plate Image URL</label>
                    <input name="image" type="url" class="@error('image') is-invalid @enderror form-control"
                        id="plateImage" value="{{ old('image', $plate->image) }}" required>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Plate Price -->
                <div class="mb-3">
                    <label for="platePrice" class="form-label">Plate Price</label>
                    <input name="price" type="number" class="@error('price') is-invalid @enderror form-control"
                        id="platePrice" value="{{ old('price', $plate->price) }}" required>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Plate Ingredients -->
                <div class="mb-3">
                    <label for="plateIngredients" class="form-label">Plate Ingredients</label>
                    <textarea name="ingredients" class="@error('ingredients') is-invalid @enderror form-control" id="plateIngredients"
                        required>{{ old('ingredients', $plate->ingredients) }}</textarea>
                    @error('ingredients')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Plate Description -->
                <div class="mb-3">
                    <label for="plateDescription" class="form-label">Plate Description</label>
                    <textarea name="description" class="@error('description') is-invalid @enderror form-control" id="plateDescription">{{ old('description', $plate->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Plate visibility -->
                <div class="mb-3">
                    <label for="is_visible" class="form-label">Visible?</label>
                    <input value="1" type="checkbox" name="is_visible" id="is_visible" checked
                        {{ old('is_visible', $plate->is_visible) ? 'checked' : '' }}>
                </div>

                <!-- Plate Category -->
                <div class="mb-3">
                    <label for="is_visible" class="form-label">Category</label>
                    <select name="category_id" class="form-select form-select-lg mb-3" aria-label="Large select example">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">
                    @if ($plate->exists)
                        Update
                    @else
                        Create
                    @endif
                </button>
                <a class="btn btn-secondary" href="{{ route('admin.plates.index') }}">Go back</a>
            </form>
        </div>
    </div>
@endsection
