<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css'); }}">
</head>
<body>
    <div class="container">
        <article>
            <h3>ID</h3>
            {{ $order->id }}
        </article>

        <article>
            <h3>User ID</h3>
            {{ $order->user_id }}
        </article>

        <article>
            <h3>Token</h3>
            {{ $order->token }}
        </article>

        <article>
            <h3>Return Date</h3>
            {{ $order->return_date }}
        </article>

        <article>
            <h3>Total</h3>
            {{ $order->total }}
        </article>

        <article>
            <h3>Status</h3>
            {{ $order->status }}
        </article>
    </div>
    
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="{{ URL::asset('js/app.js'); }}"></script>
</body>
</html>