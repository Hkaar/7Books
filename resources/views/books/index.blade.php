@extends('layouts.dashboard')

@section('title', "Dashboard - Books")

@section('top-nav')
  <x-dashboard-navigation selected="books"></x-dashboard-navigation>
@endsection

@section('content')
<x-dashboard-side-bar selected="book"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="container">
  <div class="action-bar mb-3">
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
        <th scope="col" width="10%">Actions</th>
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
              <button type="button" class="btn btn-info" 
                data-bs-target="#detailsModal" 
                data-bs-toggle="modal" 
                hx-get="{{ URL::to('manage/books/' . $book->id) }}" 
                hx-target="#detailsBody" 
                hx-swap="innerHTML">Show
              </button>

              <button type="button" class="btn btn-danger"
                hx-confirm="Are you sure you want to delete this book?"
                hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}' 
                hx-delete="{{ route('books.destroy', $book->id) }}" 
                hx-target="closest tr" 
                hx-swap="outerHTML">Delete
              </button>

              <a class="btn btn-warning" 
                href="{{ route('books.edit', $book->id) }}" >Edit
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <x-paginate-links :links="$books"></x-paginate-links>
</div>
@endsection