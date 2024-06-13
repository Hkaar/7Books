@extends('layouts.dashboard')

@section('title', "Dashboard - Authors")

@section('content')
<x-dashboard-side-bar selected="author" class="bg-primary"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="flex-fill mw-100">
  <x-dashboard-navigation selected="authors"></x-dashboard-navigation>

  <div class="container my-4">
    <div class="mb-3 d-flex align-items-center justify-content-between flex-column flex-lg-row gap-2">
      <a class="btn btn-success w-100 w-lg-fit" href="{{ route('authors.create') }}">Add a new author</a>

      <x-query-accordion>
        <form action="{{ route('authors.filter') }}" method="get" class="d-flex gap-2 flex-column flex-lg-row gap-lg-1 py-3 py-lg-0">
          @csrf
          <input name="search" class="form-control" type="search" placeholder="Search" value="{{ request()->query('search', '') }}" aria-label="Search">
  
          <select name="o" class="form-select">
            <option selected disabled>Order by</option>
  
            @if (request()->query('o') === "oldest")
              <option selected value="oldest">Oldest</option> 
            @else
              <option value="oldest">Oldest</option>
            @endif
  
            @if (request()->query('o') === "latest")
              <option selected value="latest">Latest</option> 
            @else
              <option value="latest">Latest</option>
            @endif
          </select>
  
          <button class="btn btn-outline-primary" type="submit">Apply</button>
        </form>
      </x-query-accordion>
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