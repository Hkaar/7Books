<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('sharks') }}">shark Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('sharks') }}">View All sharks</a></li>
        <li><a href="{{ URL::to('sharks/create') }}">Create a shark</a>
    </ul>
</nav>

<h1>All the sharks</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>shark Level</td>
            <td>Actions</td>
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

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('orders/' . $value->id) }}">Show this order</a>

                <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('orders/' . $value->id . '/edit') }}">Edit this order</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>