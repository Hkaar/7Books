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

    <a href="{{ route('authors.index') }}" class="nav-item">
      <i class="fa-solid fa-pen"></i>
      <span class="nav-item-title">Authors</span>
    </a>

    <a href="#" class="nav-item active">
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
      <div id="preview" class="cover-small">
        <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="Image not available...">
      </div>
    </div>

    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
      <div class="container">
        <form method="POST" action="{{ route('genres.store') }}" enctype="multipart/form-data">
          @csrf
      
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" id="name" type="text" name="name" required autofocus>
            
            @error('name')
              <span>{{ $message }}</span>
            @enderror
          </div>
      
          <div class="d-flex align-items-center">
            <button type="button" class="btn btn-secondary me-auto"
              data-bs-target="#selectItems"
              data-bs-toggle="modal"
              hx-get="{{ URL::to('/manage/books/cards') }}"
              hx-target="#selectItemsBody"
              hx-on::after-request="updateItemCards()"
              hx-swap="innerHTML"
            >Select Books</button>
      
            <a href="{{ route('authors.index') }}" class="btn btn-danger me-1">Cancel</a>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
      
          <input type="hidden" name="items" id="items">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection