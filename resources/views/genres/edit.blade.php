@extends('layouts.app')

@section('title', 'Dashboard - Genres')

@section('main')
  <x-dashboard-layout active="genre">
    <div class="row flex-fill mt-auto">
      <div class="col-12 col-md-6 d-md-flex align-items-center justify-content-center mb-md-0 mt-md-0 d-none mb-3 mt-3">
        <img src="{{ Vite::asset('resources/images/add-files.svg') }}" alt="Image not available..."
          class="img-fluid w-75 ratio-box">
      </div>

      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div class="container">
          <form method="POST" action="{{ route('genres.update', $genre->id) }}" enctype="multipart/form-data"
            class="rounded px-3 py-4 shadow-sm border">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="name" class="form-label fw-medium">Name</label>
              <input class="form-control" id="name" type="text" name="name" placeholder="{{ $genre->name }}">

              @error('name')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="d-flex align-items-md-center flex-column flex-md-row gap-1 mt-4">
              <button type="button" class="btn btn-secondary me-md-auto me-0" data-bs-target="#selectItems"
                data-bs-toggle="modal" hx-get="{{ route('books.select') }}" hx-target="#selectItemsBody"
                hx-on::after-request="updateItemCards()" hx-swap="innerHTML">Select Books</button>

              <div class="d-flex gap-1">
                <a href="{{ route('genres.index') }}" class="btn btn-danger flex-fill">Cancel</a>
                <button type="submit" class="btn btn-primary flex-fill">Save Changes</button>
              </div>
            </div>

            <input type="hidden" name="items" id="items" value="{{ $items }}">
          </form>
        </div>
      </div>
    </div>
  </x-dashboard-layout>
@endsection
