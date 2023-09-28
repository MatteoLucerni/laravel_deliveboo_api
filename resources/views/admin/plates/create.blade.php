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

            <form action="{{ route('admin.plates.store') }}" class="needs-validation" method="POST" novalidate>
                @csrf
                <!-- Plate Name -->
                <div class="mb-3">
                    <label for="plateName" class="form-label">Plate Name</label>
                    <input name="name" v-model.trim="plate.name" type="text" class="form-control" id="plateName"
                        placeholder="Enter Plate Name" required>
                </div>

                <!-- Plate Image -->
                <div class="mb-3">
                    <label for="plateImage" class="form-label">Plate Image URL</label>
                    <input name="image" v-model.trim="plate.image" type="url" class="form-control" id="plateImage"
                        placeholder="Enter Plate Image URL" required>
                </div>

                <!-- Plate Price -->
                <div class="mb-3">
                    <label for="platePrice" class="form-label">Plate Price</label>
                    <input name="price" v-model.trim="plate.price" type="number" class="form-control" id="platePrice"
                        placeholder="Enter Plate Price" required>
                </div>

                <!-- Plate Ingredients -->
                <div class="mb-3">
                    <label for="plateIngredients" class="form-label">Plate Ingredients</label>
                    <textarea name="ingredients" v-model.trim="plate.ingredients" class="form-control" id="plateIngredients"
                        placeholder="Enter Plate Ingredients" required></textarea>
                </div>

                <!-- Plate Description -->
                <div class="mb-3">
                    <label for="plateDescription" class="form-label">Plate Description</label>
                    <textarea name="description" v-model.trim="plate.description" class="form-control" id="plateDescription"
                        placeholder="Enter Plate Description" required></textarea>
                </div>

                <!-- Plate Description -->
                <div class="mb-3">
                    <label for="is_visible" class="form-label">Visible?</label>
                    <input value="1" type="checkbox" name="is_visible" id="is_visible">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
