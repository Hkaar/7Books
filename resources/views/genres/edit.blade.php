@extends('layouts.dashboard')

@section('title', "Dashboard - Genres")

@section('content')
<x-dashboard-side-bar selected="genre" class="bg-primary"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="flex-fill mw-100 d-flex flex-column">
  <x-dashboard-navigation selected="genres"></x-dashboard-navigation>
  
  <div class="container flex-fill d-flex flex-column">
    <div class="row flex-fill mt-auto">
      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center mb-3">
        <div class="large-thumbnail mb-3 mb-md-0 mt-3 mt-md-0">
          <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="Image not available...">
        </div>
      </div>
  
      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div class="container">
          <form method="POST" action="{{ route('genres.update', $genre->id) }}" enctype="multipart/form-data" class="shadow p-3 rounded">
            @csrf
            @method('PUT')
        
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input class="form-control" id="name" type="text" name="name" placeholder="{{ $genre->name }}">
              
              @error('name')
                <span>{{ $message }}</span>
              @enderror
            </div>
        
            <div class="d-flex align-items-md-center flex-column flex-md-row gap-1">
              <button type="button" class="btn btn-secondary me-0 me-md-auto"
                data-bs-target="#selectItems"
                data-bs-toggle="modal"
                hx-get="{{ route('books.select') }}"
                hx-target="#selectItemsBody"
                hx-on::after-request="updateItemCards()"
                hx-swap="innerHTML"
              >Select Books</button>
        
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
  </div>
</div>
@endsection