@extends('layouts.app')

@section('title', 'Dashboard - Books')

@section('main')
  <x-dashboard-layout active="book">
    <div class="row flex-fill mt-auto">
      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center mb-md-0 mt-md-0 mb-3 mt-3">
        <div id="preview" class="cover">
          <img src="{{ Storage::url($book->img) }}" alt="Image not available">
        </div>
      </div>

      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div class="container">
          <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data"
            class="rounded px-3 py-4 shadow-sm border">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="img" class="form-label fw-medium">Image</label>
              <input class="form-control" id="img" type="file" name="img"
                accept="image/gif, image/jpeg, image/png, image/jpg">

              @error('img')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="name" class="form-label fw-medium">Name</label>
              <input class="form-control" id="name" type="text" name="name" value="{{ $book->name }}" placeholder="Enter a name">

              @error('name')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="isbn" class="form-label fw-medium">ISBN</label>
              <input class="form-control" id="isbn" type="text" name="isbn" value="{{ $book->isbn }}" placeholder="Enter the ISBN">

              @error('isbn')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="price" class="form-label fw-medium">Price</label>
              <input class="form-control" id="price" type="number" name="price" value="{{ $book->price }}" placeholder="Enter a price">

              @error('price')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="rate" class="form-label fw-medium">Rate</label>
              <input class="form-control" id="rate" type="number" name="rate" value="{{ $book->rate }}" placeholder="Enter a price rating">

              @error('rate')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="desc" class="form-label fw-medium">Description</label>
              <textarea class="form-control" id="desc" name="desc" placeholder="Describe the book">{{ $book->desc }}</textarea>

              @error('desc')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mt-4">
              <button type="submit" class="btn btn-primary">Save Changes</button>
              <a href="{{ route('books.index') }}" class="btn btn-danger">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </x-dashboard-layout>
@endsection
