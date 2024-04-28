@extends('layouts.dashboard')

@section('title', 'Dashboard - Users')

@section('top-nav')
  <x-dashboard-navigation selected="users"></x-dashboard-navigation>
@endsection
    
@section('content')
<x-dashboard-side-bar selected="user"></x-dashboard-side-bar>

<div id="dashboardLeftFrame">
  <div class="row flex-fill">
    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
      <div id="preview" class="profile">
        Profile image will appear here
      </div>
    </div>

    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
      <div class="container">
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input class="form-control" id="img" type="file" name="img" accept="image/gif, image/jpeg, image/png, image/jpg">
            
            @error('img')
              <span>{{ $message }}</span>
            @enderror
          </div>
        
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            
            @error('name')
              <span>{{ $message }}</span>
            @enderror
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
      
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required>
            
            @error('email')
              <span>{{ $message }}</span>
            @enderror
          </div>
      
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input class="form-control" id="password" type="password" name="password" required>
            
            @error('password')
              <span>{{ $message }}</span>
            @enderror
          </div>
      
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required>
            
            @error('password_confirmation')
              <span>{{ $message }}</span>
            @enderror
          </div>
      
          <div class="actions">
            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">Create user</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection