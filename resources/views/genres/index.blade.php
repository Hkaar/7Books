@extends('layouts.dashboard')

@section('title', "Dashboard - Authors")

@section('content')
<x-dashboard-side-bar selected="genre"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="container">
  <div class="action-bar mb-3">
    <a class="btn btn-primary" href="{{ route('genres.create') }}">Add a new genre</a>
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
    
            <td class="action-bar">
              <button type="button" class="btn btn-info" 
                data-bs-target="#detailsModal" 
                data-bs-toggle="modal" 
                hx-get="{{ route('genres.show', $genre->id) }}" 
                hx-target="#detailsBody" 
                hx-swap="innerHTML">Show
              </button>

              <button type="button" class="btn btn-danger" 
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

  {{ $genres->links() }}
</div>
@endsection