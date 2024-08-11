@extends('layouts.app')

@section('title', 'Dashboard - Users')

@section('main')
  <x-dashboard-layout active="user">
    <div class="row flex-fill mt-auto">
      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div id="preview" class="profile mb-md-0 mt-md-0 mb-3 mt-3">
          <img src="{{ Storage::url($user->img) }}" alt="Image not available">
        </div>
      </div>

      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div class="container">
          <form action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" method="post"
            class="rounded p-3 shadow-sm border">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="img" class="form-label fw-medium">Profile Image</label>
              <input class="form-control" id="img" type="file" name="img"
                accept="image/gif, image/jpeg, image/png, image/jpg">

              @error('img')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="username" class="form-label fw-medium">Username</label>
              <input class="form-control" id="username" type="text" name="username"
                placeholder="{{ $user->username }}">
              @error('username')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="name" class="form-label fw-medium">Display Name</label>
              <input class="form-control" id="name" type="text" name="name" placeholder="{{ $user->name }}">

              @error('name')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="email" class="form-label fw-medium">Email</label>
              <input class="form-control" id="email" type="email" name="email" placeholder="{{ $user->email }}">
              @error('email')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="role_id" class="form-label fw-medium">Role</label>

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

            <div class="mb-3">
              <label for="password" class="form-label fw-medium">Password</label>
              <input class="form-control" id="password" type="password" name="password" placeholder="Enter a new password">
              @error('password')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password_confirmation" class="form-label fw-medium">Confirm Password</label>
              <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm the new password">
            </div>

            <div class="mt-4">
              <button type="submit" class="btn btn-primary">Save Changes</button>
              <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </x-dashboard-layout>
@endsection
