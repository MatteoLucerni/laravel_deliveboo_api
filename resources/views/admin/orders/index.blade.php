@extends('layouts.app')
@section('title', 'Orders')

@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-3">

            <h1>Orders</h1>
        </div>
    </div>
    <div class="container">
        @forelse ($orders as $order)
        @empty
            <h3 class="fw-bold text-danger">No orders</h3>
        @endforelse
    </div>
@endsection
