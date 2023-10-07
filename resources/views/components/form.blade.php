@extends('layouts.app')

@section('content')
    <div class="restaurant-card px-5 m-4 ">
        <div class="container py-5">
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
            <div class="restaurant-card p-5">


                <form class="my-5" method="POST" enctype="multipart/form-data" novalidate
                    @if ($plate->exists) action="{{ route('admin.plates.update', $plate->id) }}"
        @else
        action="{{ route('admin.plates.store') }}" @endif
                    id="submit-form">
                    @csrf
                    @if ($plate->exists)
                        @method('PUT')
                    @endif

                    <!-- Plate Name -->
                    <div class="mb-3">
                        <label for="plateName" class="form-label">Plate Name <sup class="text-danger">*</sup></label>
                        <input name="name" type="text" class="@error('name') is-invalid @enderror form-control"
                            id="plateName" value="{{ old('name', $plate->name) }}" required>
                        <small id="plate-name-error" class="text-danger"></small>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Plate Image -->
                <div class="row">
                    <div class="mb-3 col-11">
                        <label for="plateImage" class="form-label">Plate Image URL</label>
                        <input name="image" type="file" class="@error('image') is-invalid @enderror form-control"
                            id="plateImage">
                        <input type="hidden" name="current_image" value="{{ $plate->image }}">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Plate Image -->
                    <div class="row ">
                        <div class="mb-3 col-11">
                            <label for="plateImage" class="form-label">Plate Image URL</label>
                            <input name="image" type="file" class="@error('image') is-invalid @enderror form-control"
                                id="plateImage">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-1 d-none d-md-block d-lg-block">
                            @if (!$plate->image)
                                <img src="{{ asset('storage/placeholder.jpg') }}" class="img-fluid"
                                    style="object-fit: cover ; height:85px ; width:85px" id="preview">
                            @elseif($plate->image)
                                <img src="{{ asset('storage/' . $plate->image) }}" class="img-fluid"
                                    style="object-fit: cover ; height:85px ; width:85px" id="preview">
                            @endif
                        </div>
                    </div>

                    <!-- Plate Price -->
                    <div class="mb-3 me-3">
                        <label for="platePrice" class="form-label">Plate Price <sup class="text-danger">*</sup></label>
                        <input name="price" type="number" class="@error('price') is-invalid @enderror form-control"
                            id="platePrice" value="{{ old('price', $plate->price) }}" required>
                        <small id="plate-price-error" class="text-danger"></small>
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Plate Ingredients -->
                    <div class="mb-3">
                        <label for="plateIngredients" class="form-label">Plate Ingredients <sup
                                class="text-danger">*</sup></label>
                        <textarea name="ingredients" class="@error('ingredients') is-invalid @enderror form-control" id="plateIngredients"
                            required>{{ old('ingredients', $plate->ingredients) }}</textarea>
                        <small id="plate-ingredients-error" class="text-danger"></small>
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
                        <input value="1" type="checkbox" name="is_visible" id="is_visible"
                            {{ old('is_visible', $plate->is_visible) ? 'checked' : '' }}>
                    </div>

                    <!-- Plate Category -->
                    <div class="mb-3">
                        <label for="is_visible" class="form-label">Category <sup class="text-danger">*</sup></label>
                        <select name="category_id" class="form-select form-select-lg mb-3"
                            aria-label="Large select example">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="button-main-db me-3" id="submit-button">
                        @if ($plate->exists)
                            Update
                        @else
                            Create
                        @endif
                    </button>
                    <a class="btn button-secondary-db" href="{{ route('admin.plates.index') }}">Go back</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/image-preview.js');
    <script>
        document.getElementById('plateImage').addEventListener('change', function(e) {
            var preview = document.getElementById('preview');
            var fileInput = e.target;

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    </script>
@endsection
