@extends('layouts.app')

@section('title', 'Trash')


@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Order trash</h1>
        <div class="d-flex justify-content-end mt-5">
            <form class="delete-form" action="{{ route('admin.orders.dropAll') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">
                    <i class="fas fa-trash me-2"></i>Delete all
                </button>
            </form>
        </div>
        <ul class="list-unstyled">
            @forelse ($orders as $order)
                <li class="my-5">
                    <div class="card bg-light p-5">
                        <div class="card-header rounded border-0 mb-4 d-flex justify-content-between align-content-center ">
                            <h2 class="m-0 d-flex align-items-center">
                                {{ $order->name }} {{ $order->surname }}
                            </h2>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $order->note }}
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between mt-3 align-items-center border-0 bg-light">
                            <div class="buttons d-flex">
                                <form class="me-2" action="{{ route('admin.orders.restore', $order) }}" method="POST"
                                    data-name="{{ $order->name }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-success">
                                        <i class="fas fa-arrow-rotate-left me-2"></i>Restore order
                                    </button>
                                </form>
                                <form class="delete-form" action="{{ route('admin.orders.drop', $order) }}" method="POST"
                                    data-name="{{ $order->name }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash me-2"></i>Delete order
                                    </button>
                                </form>
                            </div>
                            <div class="text-end">
                                Created: {{ $order->created_at }} <br>
                                Last edit: {{ $order->updated_at }} <br>
                                Deleted: {{ $order->deleted_at }}
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <h4 class="alert alert-danger mt-5 text-center">Trash is empty</h4>
            @endforelse
        </ul>
        <footer class="text-center mb-5">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mx-2 mt-5">Go back to the order list</a>
        </footer>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/delete-confirm.js');
@endsection
