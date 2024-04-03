<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css'); }}">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('sharks') }}">Order Listing</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('orders') }}">View All orders</a></li>
                <li><a href="{{ URL::to('orders/create') }}">Create a order</a>
            </ul>
        </nav>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>User</td>
                    <td>Token</td>
                    <td>Return Date</td>
                    <td>Total</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->user_id }}</td>
                    <td>{{ $value->token }}</td>
                    <td>{{ $value->return_date }}</td>
                    <td>{{ $value->total }}</td>
                    <td>{{ $value->status }}</td>

                    <td class="d-flex">
                        <form action="{{ route('orders.destroy', $value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-small btn-danger">Delete</button>
                        </form>

                        <a class="btn btn-small btn-success" href="{{ URL::to('orders/' . $value->id) }}">Show</a>
                        <a class="btn btn-small btn-info" href="{{ URL::to('orders/' . $value->id . '/edit') }}">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="{{ URL::asset('js/app.js'); }}"></script>
</body>
</html>