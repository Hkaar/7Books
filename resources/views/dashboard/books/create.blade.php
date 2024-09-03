@extends('layouts.app')

@section('title', 'Dashboard - Books')

@section('main')
  <x-dashboard-layout active="book">
    <div class="row flex-fill mt-auto">
      <div class="col-12 mb-4">
        <div class="container">
          <div class="d-flex align-items-center gap-3">
            <a href="{{ url()->previous() }}" class="btn btn-primary">
              <i class="fa-regular fa-arrow-left"></i>
              Back
            </a>
            <h1 class="text-h5 text-md-h3 fw-semibold">Book Creator</h1>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-6">
              <ul class="nav nav-tabs nav-fill">
                <li class="nav-item">
                  <button type="button" class="nav-link active" aria-current="page">Book Details</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link">Authors</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link">Genres</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link">Libraries</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link">Regions</button>
                </li>
              </ul>
              
              <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data" class="px-3 py-4 border rounded-bottom shadow-sm mb-3">
                @csrf
  
                <input type="hidden" id="authors" name="authors" value="{}">
                <input type="hidden" id="genres" name="genres" value="{}">
                <input type="hidden" id="libraries" name="libraries" value="{}">
                <input type="hidden" id="regions" name="regions" value="{}">
  
                <div class="mb-3">
                  <label for="img" class="form-label fw-medium">Book Cover</label>
                  <input class="form-control" id="img" type="file" name="img"
                    accept="image/gif, image/jpeg, image/png, image/jpg">
  
                  @error('img')
                    <span>{{ $message }}</span>
                  @enderror
                </div>
  
                <div class="mb-3">
                  <label for="name" class="form-label fw-medium">Name</label>
                  <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Enter a name"
                    required>
  
                  @error('name')
                    <span>{{ $message }}</span>
                  @enderror
                </div>
  
                <div class="mb-3">
                  <label for="isbn" class="form-label fw-medium">ISBN 10</label>
                  <input class="form-control" id="isbn10" type="text" name="isbn10" value="{{ old('isbn') }}" placeholder="Enter the ISBN"
                    autofocus>
  
                  @error('isbn10')
                    <span>{{ $message }}</span>
                  @enderror
                </div>
  
                <div class="mb-3">
                  <label for="isbn13" class="form-label fw-medium">ISBN 13</label>
                  <input class="form-control" id="isbn13" type="text" name="isbn13" value="{{ old('isbn') }}" placeholder="Enter the ISBN"
                    autofocus>
  
                  @error('isbn13')
                    <span>{{ $message }}</span>
                  @enderror
                </div>
  
                <div class="mb-3">
                  <label for="price" class="form-label fw-medium">Price</label>
                  <input class="form-control" id="price" type="number" name="price" value="{{ old('price') }}" placeholder="Enter a price"
                    required>
  
                  @error('price')
                    <span>{{ $message }}</span>
                  @enderror
                </div>
  
                <div class="mb-3">
                  <label for="rate" class="form-label fw-medium">Rate</label>
                  <input class="form-control" id="rate" type="number" name="rate" value="{{ old('rate') }}" placeholder="Enter a pricing rate"
                    required>
  
                  @error('rate')
                    <span>{{ $message }}</span>
                  @enderror
                </div>
  
                <div class="mb-3">
                  <label for="desc" class="form-label fw-medium">Description</label>
                  <textarea class="form-control" id="desc" name="desc" placeholder="Describe the book">{{ old('desc') }}</textarea>
  
                  @error('desc')
                    <span>{{ $message }}</span>
                  @enderror
                </div>
  
                <div class="mt-4">
                  <button type="submit" class="btn btn-primary">Create</button>
                  <a class="btn btn-danger" href="{{ route('books.index') }}">Cancel</a>
                </div>
              </form>
            </div>
  
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center mb-md-0 mt-md-0 mb-3 mt-3">
              <div id="preview" class="cover position-sticky">
                Cover page will appear here
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-6 mb-3">
              <div class="d-flex flex-column gap-2 shadow-sm p-3 rounded">
                <div class="mb-3 d-flex align-items-center">
                  <input type="text" class="form-control flex-fill" id="authorsSearchBox" placeholder="Search for an author"
                    svb-search="/manage/authors/search"
                    svb-container="#addAuthorSearchBody"
                    svb-target="#authors">
      
                  <button type="button" class="btn" svb-search-load
                    svb-container="#addAuthorSearchBody"
                    svb-target="#authors">
                    <i class="fa-regular fa-history"></i>
                  </button>
                </div>
      
                <div class="svb-search-box" id="addAuthorSearchBody">
                  <span class="d-flex align-items-center gap-2 bg-body-tertiary rounded p-3">
                    <i class="fa-regular fa-magnifying-glass"></i>
                    No results were found
                  </span>
                </div>
              </div>
            </div>
  
            <div class="col-12 col-lg-6 mb-3">
              <div class="d-flex flex-column gap-2 shadow-sm p-3 rounded">
                <div class="mb-3 d-flex align-items-center">
                  <input type="text" class="form-control" placeholder="Search for a genre"
                    svb-search="/manage/genres/search"
                    svb-container="#addGenreSearchBody"
                    svb-target="#genres">
      
                  <button type="button" class="btn" svb-search-load
                    svb-container="#addGenreSearchBody"
                    svb-target="#genres">
                    <i class="fa-regular fa-history"></i>
                  </button>
                </div>
      
                <div class="svb-search-box" id="addGenreSearchBody">
                  <span class="d-flex align-items-center gap-2 bg-body-tertiary rounded p-3">
                    <i class="fa-regular fa-magnifying-glass"></i>
                    No results were found
                  </span>
                </div>
              </div>
            </div>
  
            <div class="col-12 col-lg-6 mb-3">
              <div class="d-flex flex-column gap-2 shadow-sm p-3 rounded">
                <div class="mb-3 d-flex align-items-center">
                  <input type="text" class="form-control" placeholder="Search for a library"
                    svb-search="/manage/libraries/search"
                    svb-container="#addLibrarySearchBody"
                    svb-target="#libraries">
      
                  <button type="button" class="btn" svb-search-load
                    svb-container="#addLibrarySearchBody"
                    svb-target="#libraries">
                    <i class="fa-regular fa-history"></i>
                  </button>
                </div>
      
                <div class="svb-search-box" id="addLibrarySearchBody">
                  <span class="d-flex align-items-center gap-2 bg-body-tertiary rounded p-3">
                    <i class="fa-regular fa-magnifying-glass"></i>
                    No results were found
                  </span>
                </div>
              </div>
            </div>
  
            <div class="col-12 col-lg-6 mb-3">
              <div class="d-flex flex-column gap-2 shadow-sm p-3 rounded">
                <div class="mb-3 d-flex align-items-center">
                  <input type="text" class="form-control" placeholder="Search for a region"
                    svb-search="/manage/regions/search"
                    svb-container="#addRegionSearchBody"
                    svb-target="#regions">
      
                  <button type="button" class="btn" svb-search-load
                    svb-container="#addRegionSearchBody"
                    svb-target="#regions">
                    <i class="fa-regular fa-history"></i>
                  </button>
                </div>
      
                <div class="svb-search-box" id="addRegionSearchBody">
                  <span class="d-flex align-items-center gap-2 bg-body-tertiary rounded p-3">
                    <i class="fa-regular fa-magnifying-glass"></i>
                    No results were found
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-dashboard-layout>
@endsection
