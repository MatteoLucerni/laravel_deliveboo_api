@extends('layouts.app')
@section('title', 'Panel')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-3">
            <h1 class="display-5 fw-bold mb-5">
                Your resturant's panel
            </h1>
            <div class="border bg-white rounded p-4 d-flex justify-content-between ">
                <div class="d-flex flex-column justify-content-between">
                    <div>
                        <h2>{{ $restaurant->name }}</h2>
                        <h6>VAT.N: {{ $restaurant->vat_number }}</h6>
                        <p>{{ $restaurant->address }}</p>
                    </div>
                    <div class="buttons">
                        <div class="mb-2">
                            <small>On platform since: {{ $restaurant->created_at }}</small> <br>
                            <small>Last edit date: {{ $restaurant->updated_at }}</small>
                        </div>
                        <a class="btn btn-warning" href="{{ route('admin.restaurants.edit', $restaurant) }}"><i
                                class="fas fa-pen me-2"></i>Edit resturant's info</a>
                    </div>
                </div>
                <img class="w-50" src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}">
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h2>Plates list</h2>
            <a class="btn btn-success my-3" href="{{ route('admin.plates.create') }}">Create a new plate</a>
            <a class="btn btn-secondary my-3" href="{{ route('admin.plates.trash') }}">Go to trash</a>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
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
                            <td>{{ $plate->price }}€</td>
                            <td>
                                @if ($plate->image != null)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td>
                                @if ($plate->is_visible)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td>

                                <a class="btn btn-primary" href="{{ route('admin.plates.show', $plate->id) }}"><i
                                        class="fas fa-eye me-2"></i>Details</a>
                                <a class="btn btn-warning" href="{{ route('admin.plates.edit', $plate->id) }}">Edit</a>

                                <form class="d-inline-block" action="{{ route('admin.plates.destroy', $plate) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash me-2"></i>Delete plate
                                    </button>
                                </form>

                            </td>
                            <td>Created: {{ $plate->created_at }} <br>
                                Edited: {{ $plate->updated_at }}</td>

                        </tr>
                    @empty
                        <td colspan="6">
                            <h3 class="fw-bold text-danger">No plates</h3>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
