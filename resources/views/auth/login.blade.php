<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ URL::asset('css/app.css'); }} ">
</head>
<body>
  <div id="app" class="d-flex align-items-center justify-content-center">
    <div class="auth-box bordered">

      <article class="brand">
        <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="">
        <h3>Seven Books</h3>
      </article>

      <form method="POST" action="{{ route('login') }}" class="fields">
        @csrf
  
        <div>
          <label for="email" class="form-label">Email</label>
          <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
          
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
          <input type="checkbox" id="remember" name="remember">
          <label for="remember">Remember Me</label>
        </div>
  
        <div class="actions">
          <button type="reset" class="btn btn-secondary">Reset</button>
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>

      <p>
        Don’t have a account? try <a href="/register">registering</a> with us!
      </p>
    </div>
  </div>

  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>