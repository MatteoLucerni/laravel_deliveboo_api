@extends('layouts.app')

@section('title', 'Trash')


@section('content')
    <div class="container">
        @include('includes.restore')
        <h1 class="text-center mt-5">Order trash</h1>
        <ul class="list-unstyled">
            @forelse ($orders as $order)
                <li class="my-5">
                    <div class="restaurant-card p-5">
                        <div class="mb-4 d-flex justify-content-between align-content-center ">
                            <h2 class="m-0 d-flex align-items-center">
                                {{ $order->name }} {{ $order->surname }}
                            </h2>
                        </div>
                        <div class="divider-small mb-5"></div>
                        <div class="mb-5">
                            <p>
                                {{ $order->note }}
                            </p>
                        </div>
                        <div class="d-md-none">
                            Created: {{ $order->created_at }} <br>
                            Last edit: {{ $order->updated_at }} <br>
                            Deleted: {{ $order->deleted_at }}
                        </div>
                        <div class="d-flex justify-content-center justify-content-md-between mt-3 align-items-center">
                            <div class="buttons d-flex">
                                <button class="button-main-db restore-button" data-bs-toggle="modal"
                                    data-bs-target="#restoreModal" data-route="orders" data-id="{{ $order->id }}">Restore
                                    order</button>
                            </div>
                            <div class="text-end d-none d-md-block">
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
        <footer class="text-center my-5">
            <a href="{{ route('admin.orders.index') }}" class="btn button-secondary-db mx-2">Go back to the order list</a>
        </footer>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/delete-confirm.js');
@endsection
