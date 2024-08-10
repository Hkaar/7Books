@extends('layouts.app')

@section('title', 'Dashboard - Authors')

@section('main')
  <x-dashboard-layout active="author">
    <div class="row flex-fill mt-auto">
      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center mb-md-0 mt-md-0 mb-3 mt-3">
        <div id="preview" class="profile">
          <img src="{{ Storage::url($author->img) }}" alt="Image not available">
        </div>
      </div>

      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div class="container">
          <form method="POST" action="{{ route('authors.update', $author->id) }}" enctype="multipart/form-data"
            class="rounded px-3 py-4 shadow-sm border">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="img" class="form-label fw-medium">Profile Picture</label>
              <input class="form-control" id="img" type="file" name="img"
                accept="image/gif, image/jpeg, image/png, image/jpg">

              @error('img')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <input type="hidden" name="items" id="items" value="{{ $items }}">

            <div class="mb-3">
              <label for="name" class="form-label fw-medium">Name</label>
              <input class="form-control" id="name" type="text" name="name" placeholder="{{ $author->name }}"
                autofocus>

              @error('name')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="address" class="form-label fw-medium">Address</label>
              <input class="form-control" id="address" type="text" name="address"
                placeholder="{{ $author->address }}" autofocus>

              @error('address')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label fw-medium">Phone Number</label>
              <input class="form-control" id="phone" type="text" name="phone" placeholder="{{ $author->phone }}"
                autofocus>

              @error('phone')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="d-flex align-items-md-center flex-column flex-md-row gap-1 mt-4">
              <button type="button" class="btn btn-secondary me-md-auto me-0" data-bs-target="#selectItems"
                data-bs-toggle="modal" hx-get="{{ route('books.select') }}" hx-target="#selectItemsBody"
                hx-on::after-request="updateItemCards()" hx-swap="innerHTML">Select Books</button>

              <div class="d-flex gap-1">
                <a href="{{ route('authors.index') }}" class="btn btn-danger flex-fill">Cancel</a>
                <button type="submit" class="btn btn-primary flex-fill">Save changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </x-dashboard-layout>
@endsection
