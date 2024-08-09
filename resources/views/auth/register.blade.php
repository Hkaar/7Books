@extends('layouts.app')

@section('title', "Register")

@section('main')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
  <div class="shadow px-4 py-3 p-md-5 rounded">
    <a href="{{ route('/') }}" class="d-flex align-items-center justify-content-center flex-column flex-md-row gap-2 mb-4 text-center text-inherit text-none">
      <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Image not available" class="img-fluid ratio-box logo-xl">
      <h4 class="text-h4 fw-semibold">SEVEN BOOKS</h4>
    </a>

    <form method="POST" action="{{ route('register') }}" class="d-flex flex-column gap-2 w-100 mb-4">
      @csrf

      <div>
        <label for="username" class="form-label">Username</label>
        <input class="form-control" id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>

        @error('username')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label for="email" class="form-label">Email</label>
        <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required>

        @error('email')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label for="password" class="form-label">Password</label>
        <input class="form-control" id="password" type="password" name="password" required>

        @error('password')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required>
      </div>

      <div class="d-flex gap-1">
        <a href="{{ route('/') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    </form>

    <span class="text-tertiary">
      Already have a account? try <a href="/login" class="text-primary">logging in!</a>
    </span>
  </div>
</div>
@endsection