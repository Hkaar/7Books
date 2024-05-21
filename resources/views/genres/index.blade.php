@extends('layouts.dashboard')

@section('title', "Dashboard - Genres")

@section('content')
<x-dashboard-side-bar selected="genre"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="flex-fill mw-100">
  <x-dashboard-navigation selected="genres"></x-dashboard-navigation>

  <div class="container my-3">
    <div class="mb-3 d-flex align-items-center justify-content-end">
      <a class="btn btn-success" href="{{ route('genres.create') }}">Add a genre</a>
    </div>
    
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <th scope="col" width="5%">ID</th>
          <th scope="col">Name</th>
          <th scope="col" width="15%">Actions</th>
        </thead>
      
        <tbody>
          @foreach ($genres as $genre)
            <tr>
              <td>{{ $genre->id }}</td>
              <td>{{ $genre->name }}</td>
      
              <td class="d-flex gap-1">
                <button type="button" class="btn btn-info" 
                  data-bs-target="#detailsModal" 
                  data-bs-toggle="modal" 
                  hx-get="{{ route('genres.show', $genre->id) }}" 
                  hx-target="#detailsBody" 
                  hx-swap="innerHTML">Show
                </button>
  
                <button type="button" class="btn btn-danger" 
                  hx-confirm="Are you sure you want to delete this genre?"
                  hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}' 
                  hx-delete="{{ route('genres.destroy', $genre->id) }}" 
                  hx-target="closest tr" 
                  hx-swap="outerHTML">Delete
                </button>
    
                <a class="btn btn-small btn-warning" 
                  href="{{ route('genres.edit', $genre->id) }}">Edit
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
    <x-paginate-links :links="$genres"></x-paginate-links>
  </div>
</div>
@endsection