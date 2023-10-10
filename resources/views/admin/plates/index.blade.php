@extends('layouts.app')
@section('title', 'Panel')
@section('content')
    @include('includes.alert')
    <div class="container-fluid px-0 overflow-x-hidden">
        <video autoplay muted preload="auto" class="object-fit-contain">
            <source src="{{ asset('restaurant-panel.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class="background-color-page py-4">
        <div class="container-fluid py-3">
            <div class="restaurant-card p-5 d-md-flex d-lg-flex justify-content-lg-between gap-md-5 ">
                <div class="d-flex flex-column justify-content-between">
                    <div>
                        <h2 class="pb-1">{{ $restaurant->name }}</h2>
                        <div class="divider-horizontal mb-4 mb-mb-5 mb-lg-5"></div>
                        <div class="ratio ratio-1x1 restaurant-img d-md-none d-lg-none mb-4">
                            <img class="img-fluid rounded-4 e  object-fit-cover"
                                src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}">
                        </div>
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
                        <div class="mb-4 my-3">
                            <small>On platform since: {{ $restaurant->formatted_created_at }}</small> <br>
                            <small>Last edit date: {{ $restaurant->formatted_updated_at }}</small>
                        </div>
                        <div
                            class="d-flex align-items-center justify-content-center justify-content-md-center justify-content-lg-start">
                            <a class="button-warning-db" href="{{ route('admin.restaurants.edit', $restaurant->id) }}"><i
                                    class="fas fa-pen me-2"></i>Edit resturant's info</a>
                        </div>
                    </div>
                </div>
                <div class="ratio ratio-1x1 restaurant-img d-none d-md-block d-lg-block">
                    <img class="img-fluid rounded-4 d-none d-md-block d-lg-block object-fit-cover"
                        src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}">
                </div>
            </div>
        </div>
    </div>

    <div class="content-db pb-5">
        <div class="container">
            <h2 class="py-2 pt-5">Dishes list</h2>
            <div class="divider-small"></div>
            <div class="py-5 d-flex gap-3">
                <a class="button-main-db my-3 text-center" href="{{ route('admin.plates.create') }}">Create a new plate</a>
                <a class="button-secondary-db my-3 text-center" href="{{ route('admin.plates.trash') }}">Go to trash
                    ({{ $trash_count }}
                    items)</a>
            </div>
            <div class="restaurant-card-dark table-responsive p-5">
                <table class="table table-dark p-3">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Has image?</th>
                            <th scope="col">Is visible?</th>
                            <th scope="col" class="text-center">Actions</th>
                            <th scope="col">Timestamps</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($plates as $plate)
                            <tr>
                                <th scope="row">{{ $plate->id }}</th>
                                <td>{{ $plate->name }}</td>
                                <td>
                                    <div class="badge rounded-pill"
                                        style="background-color: {{ $plate->category->color }}">
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
                                    <div class="d-flex align-items-center ">
                                        <a class="button-main-db-sm" href="{{ route('admin.plates.show', $plate->id) }}"><i
                                                class="fas fa-eye me-2"></i><span
                                                class="d-none d-lg-inline">Details</span></a>
                                        <a class="button-warning-db-sm mx-4"
                                            href="{{ route('admin.plates.edit', $plate->id) }}"><i
                                                class="fas fa-pen me-2"></i><span class="d-none d-lg-inline">Edit</span></a>

                                        <button class="button-danger-db-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-route="plates"
                                            data-id="{{ $plate->id }}"><i class="fa-solid fa-trash"></i>
                                            <span class="d-none d-lg-inline">Delete</span></button>
                                    </div>
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
    </div>
    @section('scripts')
        @vite('resources/js/delete-confirm.js')
    @endsection

@endsection
