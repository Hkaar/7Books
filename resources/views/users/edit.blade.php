@extends('layouts.dashboard')

@section('title', 'Dashboard - Users')
    
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

    <a href="{{ route('orders.index') }}" class="nav-item">
      <i class="fa-solid fa-list"></i>
      <span class="nav-item-title">Orders</span>
    </a>

    <a href="{{ route('books.index') }}" class="nav-item">
      <i class="fa-solid fa-book"></i>
      <span class="nav-item-title">Books</span>
    </a>

    <a href="{{ route('authors.index') }}" class="nav-item">
      <i class="fa-solid fa-pen"></i>
      <span class="nav-item-title">Authors</span>
    </a>

    <a href="{{ route('genres.index') }}" class="nav-item">
      <i class="fa-solid fa-tag"></i>
      <span class="nav-item-title">Genres</span>
    </a>

    <a href="#" class="nav-item mt-auto">
      <i class="fa-solid fa-gear"></i>
      <span class="nav-item-title">Settings</span>
    </a>
  </div>
</nav>

<div id="dashboardLeftFrame">
  <div class="row flex-fill">
    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
      <div id="preview" class="profile">
        <img src="{{ Storage::url($user->img) }}" alt="Image not available" srcset="">
      </div>
    </div>

    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
      <div class="container">
        <form action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" method="post">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input class="form-control" id="img" type="file" name="img" accept="image/gif, image/jpeg, image/png, image/jpg">
            
            @error('img')
              <span>{{ $message }}</span>
            @enderror
          </div>
        
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" id="name" type="text" name="name" value="{{ $user->name }}" required autofocus>
            @error('name')
              <span>{{ $message }}</span>
            @enderror
          </div>
      
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" id="email" type="email" name="email" placeholder="{{ $user->email }}">
            @error('email')
              <span>{{ $message }}</span>
            @enderror
          </div>
      
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input class="form-control" id="password" type="password" name="password" placeholder="Enter new password">
            @error('password')
              <span>{{ $message }}</span>
            @enderror
          </div>
      
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation">
          </div>
      
          <div class="mb-3">
              <label for="level" class="form-label">Level</label>
              
              <select name="level" id="level" class="form-select">
                  <option value="member">Member</option>
                  <option value="operator">Operator</option>
                  <option value="admin">Admin</option>
              </select>
      
              @error('level')
                <span>{{ $message }}</span>
              @enderror
            </div>
      
          <div class="actions">
            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection