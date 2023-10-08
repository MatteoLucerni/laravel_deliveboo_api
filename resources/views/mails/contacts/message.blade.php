<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Order Confirmation Recepit</h1>
    <h3>Dear {{ $customer['name'] }} {{ $customer['surname'] }}, your order from {{ $restaurant['name'] }} has been
        confirmed
    </h3>
    <div class="card p-5">
        <h3>Customer informations</h3>
        <p>Name: {{ $customer['name'] }} {{ $customer['surname'] }}</p>
        <p>Phone number: {{ $customer['tel'] }}</p>
        <p>Email: {{ $customer['email'] }}</p>
        <p>Address: {{ $customer['address'] }}</p>
        <p>Extra notes: {{ $customer['note'] }}</p>
        <p class="fw-bold text-success">Total Price: {{ $total_price }}€</p>
        <h3 class="mt-3">Restaurant informations</h3>
        <p>{{ $restaurant['name'] }}</p>
        <p>{{ $restaurant['address'] }}</p>
        <p>{{ $restaurant['phone_number'] }}</p>
        <h3 class="mt-3">Payment informations</h3>
        <p>Type: {{ $payment['type'] }}</p>
        <p>Card Type: {{ $payment['details']['cardType'] }}</p>
        <p>Number: {{ $payment['description'] }}</p>
    </div>
</body>

</html>
