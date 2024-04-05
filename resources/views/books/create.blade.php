@extends('layouts.dashboard')

@section('title', 'Dashboard - Books')
    
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
  <form method="POST" action="{{ route('books.store') }}">
    @csrf
  
    <div>
      <label for="isbn" class="form-label">ISBN</label>
      <input class="form-control" id="isbn" type="text" name="isbn" value="{{ old('isbn') }}" required autofocus>
      @error('isbn')
        <span>{{ $message }}</span>
      @enderror
    </div>

    <div>
      <label for="name" class="form-label">Name</label>
      <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required>
      @error('name')
        <span>{{ $message }}</span>
      @enderror
    </div>

    <div>
      <label for="desc" class="form-label">Description</label>
      <textarea class="form-control" id="desc" name="desc">{{ old('desc') }}</textarea>
      @error('desc')
        <span>{{ $message }}</span>
      @enderror
    </div>

    <div>
      <label for="price" class="form-label">Price</label>
      <input class="form-control" id="price" type="number" name="price" value="{{ old('price') }}" required>
      @error('price')
        <span>{{ $message }}</span>
      @enderror
    </div>

    <div>
      <label for="stock" class="form-label">Stock</label>
      <input class="form-control" id="stock" type="number" name="stock" value="{{ old('stock') }}" required>
      @error('stock')
        <span>{{ $message }}</span>
      @enderror
    </div>

    <div>
      <label for="rate" class="form-label">Rate</label>
      <input class="form-control" id="rate" type="number" name="rate" value="{{ old('rate') }}" required>
      @error('rate')
        <span>{{ $message }}</span>
      @enderror
    </div>

    <div class="actions">
      <button type="reset" class="btn btn-secondary">Reset</button>
      <button type="submit" class="btn btn-primary">Create Book</button>
    </div>
  </form>
</div>
@endsection