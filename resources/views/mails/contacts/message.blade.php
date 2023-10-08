<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messaggio Mail</title>
    <style>
        body {
            background-color: lightcyan;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Order Confirmation</h1>
    <h3>Your order has been confirmed</h3>
    <div class="card">
        <h3>Order recap</h3>
        <p>{{ $customer }}</p>
        <p>{{ $tel }}</p>
        <p>{{ $email }}</p>
        <p>{{ $address }}</p>
        <p>{{ $note }}</p>
        <p>{{ $total_price }}</p>
    </div>
</body>

</html>
