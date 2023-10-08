<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New order</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>New order recived</h1>
    <h3>{{ $restaurant['name'] }} you have a new order from {{ $customer['name'] }} {{ $customer['surname'] }}!
    </h3>
    <div class="card p-5">
        <h3>Customer informations</h3>
        <p>Name: {{ $customer['name'] }} {{ $customer['surname'] }}</p>
        <p>Phone number: {{ $customer['tel'] }}</p>
        <p>Email: {{ $customer['email'] }}</p>
        <p>Address: {{ $customer['address'] }}</p>
        <p>Extra notes: {{ $customer['note'] }}</p>
        <p class="fw-bold text-success">Total Price: {{ $total_price }}€</p>
        <h3 class="mt-3">Payment informations</h3>
        <p>Type: {{ $payment['type'] }}</p>
        <p>Card Type: {{ $payment['details']['cardType'] }}</p>
        <p>Number: {{ $payment['description'] }}</p>

        <h3 class="text-success fw-bold">Check your restaurant panel for more info</h3>
    </div>
</body>

</html>
