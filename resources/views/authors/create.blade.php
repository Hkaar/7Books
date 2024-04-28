@extends('layouts.dashboard')

@section('title', "Dashboard - Authors")

@section('top-nav')
  <x-dashboard-navigation selected="authors"></x-dashboard-navigation>
@endsection

@section('content')
<x-dashboard-side-bar selected="author"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="container">
  <div class="row flex-fill">
    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center mb-3">
      <div id="preview" class="profile">
        Profile image will appear here
      </div>
    </div>

    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
      <div class="container">
        <form method="POST" action="{{ route('authors.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label for="img" class="form-label">Profile Picture</label>
            <input class="form-control" id="img" type="file" name="img" accept="image/gif, image/jpeg, image/png, image/jpg">
            
            @error('img')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <input type="hidden" name="items" id="items" required>

          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            
            @error('name')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input class="form-control" id="address" type="text" name="address" value="{{ old('name') }}" required autofocus>
            
            @error('address')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input class="form-control" id="phone" type="text" name="phone" value="{{ old('name') }}" required autofocus>
            
            @error('phone')
              <span>{{ $message }}</span>
            @enderror
          </div>
      
          <div class="d-flex align-items-center">
            <button type="button" class="btn btn-secondary me-auto"
              data-bs-target="#selectItems"
              data-bs-toggle="modal"
              hx-get="{{ route('books.select') }}"
              hx-target="#selectItemsBody"
              hx-on::after-request="updateItemCards()"
              hx-swap="innerHTML"
            >Select Books</button>

            <a href="{{ route('authors.index') }}" class="btn btn-danger me-1">Cancel</a>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection