@extends('layouts.app')
@section('title', 'Orders')

@section('content')
    <div class="container-fluid px-0 overflow-x-hidden">
        <video autoplay muted preload="auto" class="object-fit-contain">
            <source src="{{ asset('orders1.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class="container">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="d-flex my-4 justify-content-center justify-content-md-start">
                        <a href="{{ route('admin.orders.trash') }}" class="button-secondary-db btn">
                            Go to trash ({{ $trash_count }} items)
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="restaurant-card-dark custom-restaurant-card-dark p-3">
                        <div class="table-responsive">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Tel</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <th scope="row">{{ $order->id }}</th>
                                            <td class="text-capitalize">{{ $order->name }} {{ $order->surname }}</td>
                                            <td>{{ $order->tel }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->address }}</td>
                                            <td>{{ $order->total_price }}€</td>
                                            <td>{{ $order->formatted_created_at }}</td>
                                            <td>
                                                <div class="d-flex align-items-center ">

                                                    <a class="btn button-main-db-sm me-2"
                                                        href="{{ route('admin.orders.show', $order->id) }}">
                                                        <i class="fas fa-eye me-2"></i><span
                                                            class="d-none d-md-inline">Details</span>
                                                    </a>

                                                    <form data-name="{{ $order->name }} {{ $order->surname }}"
                                                        class="d-inline-block ms-2 delete-form"
                                                        action="{{ route('admin.orders.destroy', $order->id) }}"
                                                        method="POST" data-name="{{ $order->name }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="button-danger-db-sm">
                                                            <i class="fas fa-trash me-2"></i><span
                                                                class="d-none d-md-inline">Delete Order</span>
                                                        </button>
                                                </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="fw-bold text-danger text-center" colspan="8">
                                                <h3>No orders</h3>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        @vite('resources/js/delete-confirm.js')
    @endsection
