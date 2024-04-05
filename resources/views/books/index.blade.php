@extends('layouts.dashboard')

@section('title', "Dashboard - Books")

@section('content')
<nav id="side-nav" class="d-none d-lg-block" data-collapsed="false">
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

    <a href="#" class="nav-item">
      <i class="fa-solid fa-list"></i>
      <span class="nav-item-title">Orders</span>
    </a>

    <a href="" class="nav-item active">
      <i class="fa-solid fa-book"></i>
      <span class="nav-item-title">Books</span>
    </a>

    <a href="#" class="nav-item">
      <i class="fa-solid fa-pen"></i>
      <span class="nav-item-title">Authors</span>
    </a>

    <a href="#" class="nav-item mt-auto">
      <i class="fa-solid fa-gear"></i>
      <span class="nav-item-title">Settings</span>
    </a>
  </div>
</nav>

<div class="d-flex flex-column flex-fill container">
  <div class="action-bar justify-content-end">
    <a class="btn btn-primary" href="{{ URL::to('manage/books/create') }}">Add a new book</a>
  </div>
  
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <th scope="col" width="5%">ID</th>
        <th scope="col">Name</th>
        <th scope="col" width="10%">Price</th>
        <th scope="col" width="10%">Stock</th>
        <th scope="col" width="15%">Amount Borrowed</th>
        <th scope="col" width="10%"></th>
      </thead>
    
      <tbody>
        @foreach ($books as $book)
          <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->stock }}</td>
            <td>{{ $book->amount_borrowed }}</td>
    
            <td class="action-bar">
              <button 
                type="button" 
                class="btn btn-info" 
                data-bs-target="#detailsModal" 
                data-bs-toggle="modal" 
                hx-get="{{ URL::to('manage/books/' . $book->id) }}" 
                hx-target="#detailsBody" 
                hx-swap="innerHTML"
              >Show
              </button>

              <button 
                type="button" 
                class="btn btn-danger" 
                hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}' 
                hx-delete="{{ route('books.destroy', $book->id) }}" 
                hx-target="closest tr" 
                hx-swap="outerHTML"
              >Delete
              </button>

              <a class="btn btn-small btn-success" href="{{ route('books.edit', $book->id) }}">Edit</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{ $books->links() }}
</div>
@endsection

@section('modals')
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="detailModal">Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body" id="detailsBody">
        ...
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection