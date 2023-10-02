@extends('layouts.app')
@section('title', 'Orders')

@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-3">

            <h1>Orders</h1>
        </div>
    </div>
    <div class="container">
        <div class="buttons">
            <a href="{{ route('admin.orders.trash') }}" class="btn btn-secondary my-3">Go to trash bin</a>
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
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
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->total_price }}€</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.orders.show', $order->id) }}"><i
                                    class="fas fa-eye me-2"></i>Details</a>

                            <form class="d-inline-block ms-2 delete-form"
                                action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                data-name="{{ $order->name }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash me-2"></i>Delete order
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="fw-bold text-danger text-center" colspan="7">
                            <h3>No orders</h3>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection

@section('scripts')
    @vite('resources/js/delete-confirm.js');
@endsection
