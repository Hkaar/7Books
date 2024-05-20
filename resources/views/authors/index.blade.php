@extends('layouts.dashboard')

@section('title', "Dashboard - Authors")

@section('content')
<x-dashboard-side-bar selected="author"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="flex-fill mw-100">
  <x-dashboard-navigation selected="authors"></x-dashboard-navigation>

  <div class="container mt-3">
    <div class="mb-3 d-flex align-items-center justify-content-end">
      <a class="btn btn-success" href="{{ route('authors.create') }}">Add a author</a>
    </div>
    
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <th scope="col" width="5%">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Address</th>
          <th scope="col" width="15%">Phone</th>
          <th scope="col" width="15%">Actions</th>
        </thead>
      
        <tbody>
          @foreach ($authors as $author)
            <tr>
              <td>{{ $author->id }}</td>
              <td>{{ $author->name }}</td>
              <td>{{ $author->address }}</td>
              <td>{{ $author->phone }}</td>
      
              <td class="d-flex gap-1">
                <button type="button" class="btn btn-info" 
                  data-bs-target="#detailsModal" 
                  data-bs-toggle="modal" 
                  hx-get="{{ route('authors.show', $author->id) }}" 
                  hx-target="#detailsBody" 
                  hx-swap="innerHTML">Show
                </button>
  
                <button type="button" class="btn btn-danger" 
                  hx-confirm="Are you sure you want to delete this author?"
                  hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}' 
                  hx-delete="{{ route('authors.destroy', $author->id) }}" 
                  hx-target="closest tr" 
                  hx-swap="outerHTML">Delete
                </button>
    
                <a class="btn btn-warning" 
                  href="{{ route('authors.edit', $author->id) }}">Edit
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
    <x-paginate-links :links="$authors"></x-paginate-links>
  </div>
</div>
@endsection