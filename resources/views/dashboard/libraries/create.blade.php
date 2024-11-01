@extends('layouts.app')

@section('title', 'Dashboard - Libraries')

@section('main')
  <x-dashboard-layout active="library">
    <div class="row flex-fill mt-auto">
      <div class="col-12 col-md-6 d-md-flex align-items-center justify-content-center mb-md-0 mt-md-0 d-none mb-3 mt-3">
        <img src="{{ Vite::asset('resources/images/add-files.svg') }}" alt="Image not available..."
          class="img-fluid w-75 ratio-box">
      </div>

      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div class="container">
          <form method="POST" action="{{ route('libraries.store') }}" enctype="multipart/form-data"
            class="rounded px-3 py-4 shadow-sm border">
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label fw-medium">Name</label>
              <input class="form-control" id="name" type="text" name="name" placeholder="Enter a name" required autofocus>

              @error('name')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="region_id" class="form-label fw-medium">Region</label>

              <select name="region_id" id="region_id" class="form-control">
                <option selected disabled>Please select a region</option>

                @foreach ($regions as $region)
                  <option value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-4">
              <label for="desc" class="form-label fw-medium">Description</label>
              <textarea class="form-control" id="desc" name="desc" placeholder="Describe the library">{{ old('desc') }}</textarea>

              @error('desc')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="d-flex align-items-lg-center justify-content-lg-between flex-column flex-lg-row gap-1 mt-4">
              <button type="button" class="btn btn-secondary">
                Add Books
              </button>

              <div class="d-flex gap-1">
                <a href="{{ route('libraries.index') }}" class="btn btn-danger flex-fill">Cancel</a>
                <button type="submit" class="btn btn-primary flex-fill">Create</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </x-dashboard-layout>
@endsection
