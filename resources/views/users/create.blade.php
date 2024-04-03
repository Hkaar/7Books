@extends('layouts.dashboard')

@section('title', 'Dashboard - Users')
    
@section('content')
@section('content')
<nav id="side-nav" class="d-none d-md-block" data-collapsed="false">
  <div class="nav-items">
    <a href="#" class="nav-item side-nav-open">
      <i class="fa-solid fa-arrow-right"></i>
    </a>

    <a href="#" class="nav-item side-nav-close">
      <i class="fa-solid fa-arrow-left"></i>
      <span class="nav-item-title">Close</span>
    </a>

    <a href="#" class="nav-item active">
      <i class="fa-solid fa-user"></i>
      <span class="nav-item-title">Users</span>
    </a>

    <a href="#" class="nav-item">
      <i class="fa-solid fa-list"></i>
      <span class="nav-item-title">Orders</span>
    </a>

    <a href="#" class="nav-item">
      <i class="fa-solid fa-book"></i>
      <span class="nav-item-title">Books</span>
    </a>

    <a href="#" class="nav-item">
      <i class="fa-solid fa-pen"></i>
      <span class="nav-item-title">Authors</span>
    </a>

    <a href="#" class="nav-item mt-3">
      <i class="fa-solid fa-gear"></i>
      <span class="nav-item-title">Settings</span>
    </a>
  </div>
</nav>

<div class="d-flex-flex-column">
  <form method="POST" action="{{ route('users.store') }}">
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

    <div>
        <label for="level" class="form-label">Level</label>
        
        <select name="level" id="level">
            <option value="member">Member</option>
            <option value="operator">Operator</option>
            <option value="admin">Admin</option>
        </select>

        @error('level')
          <span>{{ $message }}</span>
        @enderror
      </div>

    <div class="actions">
      <button type="reset" class="btn btn-secondary">Reset</button>
      <button type="submit" class="btn btn-primary">Register</button>
    </div>
  </form>
</div>
@endsection