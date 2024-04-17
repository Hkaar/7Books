@extends('layouts.app')

@section('title', "Login")
    
@section('main')
<div class="flex-fill d-flex align-items-center justify-content-center">
  <div class="auth-box bordered">

    <article class="brand">
      <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="Image not available">
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
@endsection