@extends('layouts.app')
@section('title', 'Panel')
@section('content')
    @include('includes.alert')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-3">
            <h1 class="display-5 fw-bold mb-5">
                Your restaurant's panel
            </h1>
            <div class="border bg-white rounded p-4 d-flex justify-content-between ">
                <div class="d-flex flex-column justify-content-between">
                    <div>
                        <h2>{{ $restaurant->name }}</h2>
                        <h6>VAT.N: {{ $restaurant->vat_number }}</h6>
                        <p>{{ $restaurant->address }}</p>
                        <small>Types:</small>
                        <ul>
                            @foreach ($restaurant->types as $type)
                                <li>
                                    <strong>
                                        {{ $type->name }}
                                    </strong>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="buttons">
                        <div class="mb-4">
                            <small>On platform since: {{ $restaurant->formatted_created_at }}</small> <br>
                            <small>Last edit date: {{ $restaurant->formatted_updated_at }}</small>
                        </div>
                        <a class="button-warning-db" href="{{ route('admin.restaurants.edit', $restaurant->id) }}"><i
                                class="fas fa-pen me-2"></i>Edit resturant's info</a>
                    </div>
                </div>
                <img class="w-50" src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}">
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h2 class="py-2">Dishes list</h2>
            <div class="py-5 d-flex gap-3">
                <a class="button-main-db my-3" href="{{ route('admin.plates.create') }}">Create a new plate</a>
                <a class="button-secondary-db my-3" href="{{ route('admin.plates.trash') }}">Go to trash
                    ({{ $trash_count }}
                    items)</a>
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Has image?</th>
                        <th scope="col">Is visible?</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Timestamps</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($plates as $plate)
                        <tr>
                            <th scope="row">{{ $plate->id }}</th>
                            <td>{{ $plate->name }}</td>
                            <td>
                                <div class="badge rounded-pill" style="background-color: {{ $plate->category->color }}">
                                    {{ $plate->category->name }}
                                </div>
                            </td>
                            <td>
                                {{ $plate->price }}€
                            </td>
                            <td>
                                @if ($plate->image != null && $plate->image != 'placeholder.jpg')
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td>
                                @if ($plate->is_visible)
                                    <i class="fa-solid fa-eye"></i>
                                @else
                                    <i class="fa-solid fa-eye-slash"></i>
                                @endif
                            </td>
                            <td>

                                <a class="button-main-db" href="{{ route('admin.plates.show', $plate->id) }}"><i
                                        class="fas fa-eye me-2"></i>Details</a>
                                <a class="button-warning-db" href="{{ route('admin.plates.edit', $plate->id) }}"><i
                                        class="fas fa-pen me-2"></i>Edit</a>

                                <button class="button-danger-db" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    data-route="plates" data-id="{{ $plate->id }}">Delete</button>

                            </td>
                            <td>Created: {{ $plate->formatted_created_at }} <br>
                                Edited: {{ $plate->formatted_updated_at }}</td>

                        </tr>
                    @empty
                        <td colspan="8">
                            <h3 class="fw-bold text-danger text-center">No plates</h3>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @section('scripts')
        @vite('resources/js/delete-confirm.js');
    @endsection

@endsection
