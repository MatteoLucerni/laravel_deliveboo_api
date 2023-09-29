@extends('layouts.app')
@section('title', 'Orders')
@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $orders->name }} {{ $orders->surname }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $orders->order_date }}</h6>
                <p class="card-text">{{ $orders->status ? 'in process' : 'delivered' }}</p>
                <p class="card-text">{{ $orders->address }}</p>
                <p class="card-text">{{ $orders->note }}</p>
                <p class="card-text"> € {{ $orders->total_price }}</p>
            </div>
        </div>
    </div>
@endsection
