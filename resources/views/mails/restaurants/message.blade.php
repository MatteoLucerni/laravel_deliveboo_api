<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Order Received</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container text-center">
        <h1 class="display-4">New Order Received</h1>
        <h3 class="mb-4">{{ $restaurant['name'] }}, you have a new order from {{ $customer['name'] }} {{ $customer['surname'] }}!</h3>

        <div class="card p-4">
            <h3 class="mb-4">Customer Information</h3>
            <p class="lead">Name: {{ $customer['name'] }} {{ $customer['surname'] }}</p>
            <p class="lead">Phone number: {{ $customer['tel'] }}</p>
            <p class="lead">Email: {{ $customer['email'] }}</p>
            <p class="lead">Address: {{ $customer['address'] }}</p>
            <p class="lead">Extra notes: {{ $customer['note'] }}</p>

            <hr>

            <h3 class="text-success fw-bold">Total Price: {{ $total_price }}€</h3>
            <h3 class="text-success fw-bold mt-4">Check your restaurant panel for more info</h3>
        </div>
    </div>

    <!-- Include Bootstrap JS and Popper.js (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>

</html>
