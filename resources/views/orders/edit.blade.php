@extends('layouts.dashboard')

@section('title', "Dashboard - Books")

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

    <a href="#" class="nav-item active">
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

<div id="dashboardLeftFrame" class="container">
  <div class="row flex-fill">
    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center mb-3">
      <div id="preview" class="cover-small">
        <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="Image not available...">
      </div>
    </div>

    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
      <div class="container">
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
          @csrf
          @method('PUT')

          <input type="hidden" name="items" id="items" value="{{ $items }}">

          <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input class="form-control" id="user_id" type="number" name="user_id" value="{{ $order->user_id }}" autofocus>
            
            @error('user_id')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="token" class="form-label">Token</label>
            <input class="form-control" id="token" type="text" name="token" placeholder="{{ $order->token }}" autofocus>
            
            @error('token')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="return_date" class="form-label">Return Date</label>
            <input class="form-control" id="return_date" type="datetime-local" name="return_date" value="{{ $order->return_date }}" autofocus>
            
            @error('return_date')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="placed" class="form-label">Placed Date</label>
            <input class="form-control" id="placed" type="datetime-local" name="placed" value="{{ $order->placed }}" autofocus>
            
            @error('placed')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            
            <select name="status" id="status" class="form-select">
              <option value="pending">Pending</option>
              <option value="paid">Paid</option>
              <option value="returned">Returned</option>
            </select>
    
            @error('status')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="d-flex align-items-center">
            <button type="button" class="btn btn-secondary me-auto"
              data-bs-target="#selectItems"
              data-bs-toggle="modal"
              hx-get="{{ route('books.multi-select') }}"
              hx-target="#selectItemsBody"
              hx-on::after-request="updateItemCards()"
              hx-swap="innerHTML">Select Books
            </button>
      
            <a href="{{ route('orders.index') }}" class="btn btn-danger me-1">Cancel</a>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection