@extends('layouts.app')

@section('title', "Login")

@section('main')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
  <div class="shadow px-4 py-3 p-md-5 rounded">
    <a href="{{ route('/') }}" class="d-flex align-items-center justify-content-center flex-column flex-md-row gap-2 mb-4 text-center text-inherit text-none">
      <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Image not available" class="img-fluid ratio-box logo-xl">
      <h4 class="text-h4 fw-semibold">SEVEN BOOKS</h4>
    </a>

    <form method="POST" action="{{ route('login') }}" class="d-flex flex-column gap-2 w-100 mb-4">
      @csrf

      <div>
        <label for="username" class="form-label">Username or Email</label>
        <input class="form-control" id="username" type="text" name="username" placeholder="Enter your username or email" required autofocus>

        @error('username')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label for="password" class="form-label">Password</label>
        <input class="form-control" id="password" type="password" name="password" placeholder="Enter your password" required>

        @error('password')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-3">
        <input type="checkbox" id="remember" name="remember" value="1">
        <label for="remember">Remember Me</label>
      </div>

      <div class="d-flex gap-1">
        <a href="{{ route('/') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>

    <span class="text-tertiary">
      Don't have a account? try <a href="/register" class="text-primary">registering</a> with us!
    </span>
  </div>
</div>
@endsection