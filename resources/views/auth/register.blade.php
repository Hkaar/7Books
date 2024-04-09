<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ URL::asset('css/app.css'); }} ">
</head>
<body>
  <div id="app" class="d-flex align-items-center justify-content-center">
    <div class="auth-box">

      <article class="brand">
        <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="">
        <h3>Seven Books</h3>
      </article>

      <form method="POST" action="{{ route('register') }}" class="fields">
        @csrf
  
        <div>
          <label for="name" class="form-label">Name</label>
          <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
          @error('name')
            <span>{{ $message }}</span>
          @enderror
        </div>
  
        <div>
          <label for="email" class="form-label">Email</label>
          <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required>
          @error('email')
            <span>{{ $message }}</span>
          @enderror
        </div>
  
        <div>
          <label for="password" class="form-label">Password</label>
          <input class="form-control" id="password" type="password" name="password" required>
          @error('password')
            <span>{{ $message }}</span>
          @enderror
        </div>
  
        <div>
          <label for="password_confirmation" class="form-label">Confirm Password</label>
          <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required>
        </div>
  
        <div class="actions">
          <button type="reset" class="btn btn-secondary">Reset</button>
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>

      <p>
        Already have a account? try <a href="/login">logging in!</a>
      </p>
    </div>
  </div>

  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>