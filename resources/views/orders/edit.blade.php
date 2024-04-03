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
        <form action="{{ route('orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="token" class="form-label">Token</label>
                <input class="form-control" id="token" type="text" name="token" value="{{ $order->token }}">
               
                @error('token')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="return_date" class="form-label">Return Date</label>
                <input class="form-control" id="return_date" type="datetime" name="return_date" value="{{ $order->return_date }}">
               
                @error('return_date')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="total" class="form-label">Token</label>
                <input class="form-control" id="total" type="number" name="total" value="{{ $order->total }}">
               
                @error('total')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="status" class="form-label">Token</label>
                <select name="status" id="status">
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                    <option value="returned">Returned</option>
                </select>

                @error('status')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="{{ URL::asset('js/app.js'); }}"></script>
</body>
</html>