@extends('layouts.dashboard')

@section('title', 'Dashboard - Books')

@section('content')
<x-dashboard-side-bar selected="book" class="bg-primary"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="flex-fill mw-100 d-flex flex-column">
  <x-dashboard-navigation selected="books"></x-dashboard-navigation>

  <div class="container flex-fill d-flex flex-column">
    <div class="row flex-fill mt-auto">
      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center mb-3 mb-md-0 mt-3 mt-md-0">
        <div id="preview" class="cover">
          Cover page will appear here
        </div>
      </div>

      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div class="container">
          <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data" class="shadow p-3 rounded">
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
              <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required>

              @error('name')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="isbn" class="form-label">ISBN</label>
              <input class="form-control" id="isbn" type="text" name="isbn" value="{{ old('isbn') }}" required autofocus>

              @error('isbn')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input class="form-control" id="price" type="number" name="price" value="{{ old('price') }}" required>

              @error('price')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="rate" class="form-label">Rate</label>
              <input class="form-control" id="rate" type="number" name="rate" value="{{ old('rate') }}" required>

              @error('rate')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="desc" class="form-label">Description</label>
              <textarea class="form-control" id="desc" name="desc">{{ old('desc') }}</textarea>

              @error('desc')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="actions">
              <a class="btn btn-danger" href="{{ route('books.index') }}">Cancel</a>
              <button type="submit" class="btn btn-primary">Create Book</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection