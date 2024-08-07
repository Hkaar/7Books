@extends('layouts.dashboard')

@section('title', 'Dashboard - Users')

@section('content')
<x-dashboard-side-bar selected="user" class="bg-primary"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="flex-fill mw-100 d-flex flex-column">
  <x-dashboard-navigation selected="users"></x-dashboard-navigation>

  <div class="container flex-fill d-flex flex-column">
    <div class="row flex-fill mt-auto">
      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div id="preview" class="profile mb-3 mb-md-0 mt-3 mt-md-0">
          <img src="{{ Storage::url($user->img) }}" alt="Image not available" srcset="">
        </div>
      </div>

      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div class="container">
          <form action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" method="post" class="shadow p-3 rounded">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="img" class="form-label">Profile Image</label>
              <input class="form-control" id="img" type="file" name="img" accept="image/gif, image/jpeg, image/png, image/jpg">

              @error('img')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="role_id" class="form-label">Role</label>

              <select name="role_id" id="role_id" class="form-select">
                @foreach ($roles as $role)
                  @if ($user->role->name === $role->name)
                    <option selected value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                  @else
                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                  @endif
                @endforeach
              </select>

              @error('role_id')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div>
              <label for="username" class="form-label">Username</label>
              <input class="form-control" id="username" type="text" name="username" placeholder="{{ $user->username }}">
              @error('username')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="name" class="form-label">Display Name</label>
              <input class="form-control" id="name" type="text" name="name" placeholder="{{ $user->name }}">

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

            <div class="actions">
              <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection