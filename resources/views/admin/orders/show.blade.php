@extends('layouts.app')
@section('title', 'Orders')
@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $order->name }} {{ $order->surname }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $order->order_date }}</h6>
                <p class="card-text">{{ $order->status ? 'in process' : 'delivered' }}</p>
                <p class="card-text">{{ $order->address }}</p>
                <p class="card-text">{{ $order->note }}</p>
                <p class="card-text"> € {{ $order->total_price }}</p>
                <h3>Plates : </h3>
                <ul class="list-unstyled">
                    @forelse ($order->plates as $plate)
                    <li class="card-text">{{$plate->name}} <strong>X {{$plate->quantity}}</strong></li>
                   
                    @empty
                    <li class="text-danger">No plates</li> 
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
