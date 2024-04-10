@extends('layouts.dashboard')

@section('title', "Dashboard - Authors")

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

    <a href="{{ route('users.index') }}" class="nav-item">
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

    <a href="#" class="nav-item active">
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

<div id="dashboardLeftFrame" class="container">
  <div class="row flex-fill">
    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center mb-3">
      <div id="preview" class="profile">
        <img src="{{ Storage::url($author->img) }}" alt="Image not available">
      </div>
    </div>

    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
      <div class="container">
        <form method="POST" action="{{ route('authors.update', $author->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="img" class="form-label">Profile Picture</label>
            <input class="form-control" id="img" type="file" name="img" accept="image/gif, image/jpeg, image/png, image/jpg">
            
            @error('img')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <input type="hidden" name="items" id="items" value="{{ $items }}">

          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" id="name" type="text" name="name" placeholder="{{ $author->name }}" autofocus>
            
            @error('name')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input class="form-control" id="address" type="text" name="address" placeholder="{{ $author->address }}" autofocus>
            
            @error('address')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input class="form-control" id="phone" type="text" name="phone" placeholder="{{ $author->phone }}" autofocus>
            
            @error('phone')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="row">
            <div class="col-12 col-lg-6 col-xl-4 mb-3">
              <button type="button" class="btn btn-secondary w-100"
                data-bs-target="#selectItems"
                data-bs-toggle="modal"
                hx-get="{{ URL::to('/manage/books/cards') }}"
                hx-target="#selectItemsBody"
                hx-on::after-request="updateItemCards()"
                hx-swap="innerHTML"
              >Select Books</button>
            </div>

            <div class="col-12 col-lg-6 col-xl-8 ms-lg-auto">
              <div class="d-flex align-items-center justify-content-lg-end">
                <a href="{{ route('authors.index') }}" class="btn btn-danger me-1">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection