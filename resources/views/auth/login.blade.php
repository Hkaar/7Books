@extends('layouts.app')

@section('title', "Login")
    
@section('main')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
  <div class="shadow p-4 p-md-5 rounded">
    <a href="{{ route('/') }}" class="d-flex align-items-center justify-content-center flex-column flex-md-row gap-2 mb-4 text-center text-inherit text-none">
      <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="Image not available" class="img-fluid ratio-box img-logo">
      <h4>Seven Books</h4>
    </a>

    <form method="POST" action="{{ route('login') }}" class="d-flex flex-column gap-2 w-100 mb-4">
      @csrf

      <div>
        <label for="username" class="form-label">Username or Email</label>
        <input class="form-control" id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
        
        @error('username')
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

      <div class="mb-3">
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Remember Me</label>
      </div>

      <div class="d-flex gap-1">
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>

    <span>
      Don't have a account? try <a href="/register">registering</a> with us!
    </span>
  </div>
</div>
@endsection