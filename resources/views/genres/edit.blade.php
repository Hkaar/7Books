@extends('layouts.dashboard')

@section('title', "Dashboard - Authors")

@section('content')
<x-dashboard-side-bar selected="genre"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="container">
  <div class="row flex-fill">
    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center mb-3">
      <div id="preview" class="cover-small">
        <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="Image not available...">
      </div>
    </div>

    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
      <div class="container">
        <form method="POST" action="{{ route('genres.update', $genre->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
      
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" id="name" type="text" name="name" placeholder="{{ $genre->name }}">
            
            @error('name')
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
      
            <a href="{{ route('genres.index') }}" class="btn btn-danger me-1">Cancel</a>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
      
          <input type="hidden" name="items" id="items" value="{{ $items }}">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection