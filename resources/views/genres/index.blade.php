@extends('layouts.dashboard')

@section('title', "Dashboard - Authors")

@section('content')
<nav id="side-nav" class="d-none d-md-block" data-collapsed="false">
  <div class="nav-items">
    <a href="#" class="nav-item side-nav-open">
      <i class="fa-solid fa-arrow-right"></i>
    </a>

    <a href="#" class="nav-item side-nav-close">
      <i class="fa-solid fa-arrow-left"></i>
      <span class="nav-item-title">Close</span>
    </a>

    <a href="{{ route('users.index') }}" class="nav-item">
      <i class="fa-solid fa-user"></i>
      <span class="nav-item-title">Users</span>
    </a>

    <a href="{{ route('orders.index') }}" class="nav-item">
      <i class="fa-solid fa-list"></i>
      <span class="nav-item-title">Orders</span>
    </a>

    <a href="{{ route('books.index') }}" class="nav-item">
      <i class="fa-solid fa-book"></i>
      <span class="nav-item-title">Books</span>
    </a>

    <a href="{{ route('authors.index') }}" class="nav-item">
      <i class="fa-solid fa-pen"></i>
      <span class="nav-item-title">Authors</span>
    </a>

    <a href="#" class="nav-item active">
      <i class="fa-solid fa-tag"></i>
      <span class="nav-item-title">Genres</span>
    </a>

    <a href="#" class="nav-item mt-auto">
      <i class="fa-solid fa-gear"></i>
      <span class="nav-item-title">Settings</span>
    </a>
  </div>
</nav>

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
  
              <a class="btn btn-small btn-secondary" 
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