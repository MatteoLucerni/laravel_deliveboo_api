<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container text-center">
        <h1 class="display-4">Order Confirmation Receipt</h1>
        <h3 class="mb-4">Dear {{ $customer['name'] }} {{ $customer['surname'] }}, your order from {{ $restaurant['name'] }} has been confirmed</h3>

        <div class="card p-4">
            <h3 class="mb-4">Customer Information</h3>
            <p class="lead">Name: {{ $customer['name'] }} {{ $customer['surname'] }}</p>
            <p class="lead">Phone number: {{ $customer['tel'] }}</p>
            <p class="lead">Email: {{ $customer['email'] }}</p>
            <p class="lead">Address: {{ $customer['address'] }}</p>
            <p class="lead">Extra notes: {{ $customer['note'] }}</p>

            <hr>

            <h3 class="mb-4">Payment Information</h3>
            <p class="lead">Type: {{ $payment['type'] }}</p>
            <p class="lead">Card Type: {{ $payment['details']['cardType'] }}</p>
            <p class="lead">Number: {{ $payment['description'] }}</p>
            
            <hr>

            <h3 class="mb-4">Restaurant Information</h3>
            <p class="lead">{{ $restaurant['name'] }}</p>
            <p class="lead">{{ $restaurant['address'] }}</p>
            <p class="lead">{{ $restaurant['phone_number'] }}</p>

            <h3 class="mt-4">Total Price: {{ $total_price }}€</h3>
        </div>
    </div>

    <!-- Include Bootstrap JS and Popper.js (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>

</html>
