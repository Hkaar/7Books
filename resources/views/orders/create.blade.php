<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>

    <link rel="stylesheet" href="{{ URL::asset('css/app.css'); }} ">
</head>
<body>
    <h1>Create Order</h1>

    <!-- resources/views/orders/create.blade.php -->

<h1>Create Order</h1>

<form method="POST" action="{{ route('orders.store') }}">
    @csrf

    <div>
        <label for="token">Token</label>
        <input type="text" id="token" name="token" required>
    </div>

    <div>
        <label for="return_date">Return Date</label>
        <input type="date" id="return_date" name="return_date" required>
    </div>

    <div>
        <label for="total">Total</label>
        <input type="number" id="total" name="total" step="0.01" required>
    </div>

    <button type="submit">Create</button>
</form>

</body>
</html>