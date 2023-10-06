@extends('layouts.app')
@section('title', 'Orders')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="restaurant-card p-5">
                    <h5 class="display-4">{{ $order->name }} {{ $order->surname }}</h5>
                    <div class="divider-horizontal mb-3"></div>
                    <h6 class="card-subtitle mb-5 text-body-secondary">Order date: {{ $order->order_date }}</h6>
                    <h5><i class="fa-solid fa-mobile-button pe-3"></i> {{ $order->tel }}</h5>
                    <h5><i class="fa-solid fa-envelope pe-3"></i> {{ $order->email }}</h5>
                    <div class="divider-small my-4 w-25 "></div>
                    <p><strong>Address:</strong> {{ $order->address }}</p>
                    <p><strong>Customer's note:</strong> {{ $order->note }}</p>
                    <p><strong>Price payed:</strong> € {{ $order->total_price }}</p>
                    <div class="divider-small my-4 w-25 "></div>
                    <h3>Plates:</h3>
                    <ul class="list-unstyled">
                        @forelse ($order->plates as $plate)
                            <li class="card-text">{{ $plate->name }} <strong>X {{ $plate->quantity }}</strong>
                            </li>
                        @empty
                            <li class="text-danger">No plates</li>
                        @endforelse
                    </ul>
                    <div class="divider-small my-3"></div>
                    <p>Status: {{ $order->status ? 'In Process' : 'Delivered' }}</p>
                </div>
            </div>
        </div>
        <div class="row mt-3 pt-3 pb-5">
            <div class="col-12 d-flex justify-content-center ">
                <a class="btn button-secondary-db" href="{{ route('admin.orders.index') }}">Go back</a>
            </div>
        </div>
    </div>
@endsection
