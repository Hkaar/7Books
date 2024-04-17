@extends('layouts.app')

@section('title', "Register")

@section('main')
<div class="flex-fill d-flex align-items-center justify-content-center">
  <div class="auth-box bordered">
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
@endsection