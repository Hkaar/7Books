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

    <a href="{{ route('users.index') }}" class="nav-item">
      <i class="fa-solid fa-user"></i>
      <span class="nav-item-title">Users</span>
    </a>

    <a href="#" class="nav-item">
      <i class="fa-solid fa-list"></i>
      <span class="nav-item-title">Orders</span>
    </a>

    <a href="#" class="nav-item active">
      <i class="fa-solid fa-book"></i>
      <span class="nav-item-title">Books</span>
    </a>

    <a href="#" class="nav-item">
      <i class="fa-solid fa-pen"></i>
      <span class="nav-item-title">Authors</span>
    </a>

    <a href="#" class="nav-item mt-auto">
      <i class="fa-solid fa-gear"></i>
      <span class="nav-item-title">Settings</span>
    </a>
  </div>
</nav>

<div id="dashboardLeftFrame">
  <div class="row">
    <div class="col-6 d-flex align-items-center justify-content-center">
      <div id="preview">
        <img src="{{ Storage::url($book->img) }}" alt="Image not available">
      </div>
    </div>

    <div class="col-6">
      <div class="container">
        <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
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
            <input class="form-control" id="name" type="text" name="name" value="{{ $book->name }}">
            
            @error('name')
              <span>{{ $message }}</span>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input class="form-control" id="isbn" type="text" name="isbn" value="{{ $book->ISBN }}">
            
            @error('isbn')
              <span>{{ $message }}</span>
            @enderror
          </div>
        
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input class="form-control" id="price" type="number" name="price" value="{{ $book->price }}">
            
            @error('price')
              <span>{{ $message }}</span>
            @enderror
          </div>
        
          <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input class="form-control" id="stock" type="number" name="stock" value="{{ $book->stock }}">
            
            @error('stock')
              <span>{{ $message }}</span>
            @enderror
          </div>
        
          <div class="mb-3">
            <label for="rate" class="form-label">Rate</label>
            <input class="form-control" id="rate" type="number" name="rate" value="{{ $book->rate }}">
            
            @error('rate')
              <span>{{ $message }}</span>
            @enderror
          </div>
        
          <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control" id="desc" name="desc">{{ $book->desc }}</textarea>
            
            @error('desc')
              <span>{{ $message }}</span>
            @enderror
          </div>
        
          <div class="actions">
            <a href="{{ route('books.index') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection