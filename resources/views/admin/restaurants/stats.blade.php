@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('content')
    <div class="container-fluid px-0 overflow-x-hidden">
        <video autoplay muted preload="auto" class="object-fit-contain mb-3">
            <source src="{{ asset('stats.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="content">
        <div class="container">
            <div class="card p-5 mx-5 bg-light mt-5">
                <h3 class="mb-3">Global Stats</h3>
                <p>Your restaurant has earned a total of {{ $totalIncame }}€ </p>
                <p>Your had a total of 34 orders </p>
            </div>
            <div class="bg-light my-5 rounded" style="width: 80%; margin: 0 auto;">
                <canvas id="monthlyOrdersChart"></canvas>
            </div>

            <div class="bg-light my-5 rounded" style="width: 80%; margin: 0 auto;">
                <canvas id="monthlyRevenueChart"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const ctx1 = document.getElementById('monthlyOrdersChart').getContext('2d');
        const ctx2 = document.getElementById('monthlyRevenueChart').getContext('2d');

        // Recupera i dati dal tuo controller Laravel
        const orderData = {!! json_encode($orderData) !!};
        const revenueData = {!! json_encode($revenueData) !!};
        const labels = {!! json_encode($labels) !!};

        const orderChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Numero di Ordini Mensili',
                    data: orderData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });

        const revenueChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Entrate Mensili',
                    data: revenueData,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1000
                    }
                }
            }
        });
    </script>
@endsection
