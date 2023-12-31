@extends('layouts.app')

@section('title', 'Trash')

@section('content')
    @include('includes.restore')

    <div class="container">
        <h1 class="text-center mt-5">Plates trash</h1>
        <ul class="list-unstyled">
            @forelse ($plates as $plate)
                <li class="my-5">
                    <div class="restaurant-card p-5">
                        <div class="card-header rounded border-0 mb-4 d-flex justify-content-between align-content-center ">
                            <h2 class="m-0 d-flex align-items-center">
                                {{ $plate->name }}
                            </h2>
                            <div class="divider-small mb-5"></div>
                        </div>
                        <div class="card-body">
                            <p class="">
                                {{ $plate->description }}
                            </p>
                        </div>
                        <div class="d-md-none d-lg-none">
                            Created: {{ $plate->created_at }} <br>
                            Last edit: {{ $plate->updated_at }} <br>
                            Deleted: {{ $plate->deleted_at }}
                        </div>
                        <div class="card-footer d-flex justify-content-center justify-content-md-between mt-3 align-items-center border-0 bg-light">
                            <div class="buttons  ">
                                <button class="button-main-db restore-button" data-bs-toggle="modal"
                                    data-bs-target="#restoreModal" data-route="plates" data-id="{{ $plate->id }}">Restore
                                    plate</button>
                            </div>
                            <div class="text-end d-none d-md-inline d-lg-inline">
                                Created: {{ $plate->created_at }} <br>
                                Last edit: {{ $plate->updated_at }} <br>
                                Deleted: {{ $plate->deleted_at }}
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <h4 class="alert alert-danger mt-5 text-center">Trash is empty</h4>
            @endforelse
        </ul>
        <footer class="text-center mb-5">
            <a href="{{ route('admin.plates.index') }}" class="btn button-secondary-db mx-2 mt-5">Go back to the plates list</a>
        </footer>
    </div>
    @section('scripts')
        @vite('resources/js/restore-confirm.js')
    @endsection

@endsection
