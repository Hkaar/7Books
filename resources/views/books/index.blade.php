@extends('layouts.dashboard')

@section('title', "Dashboard - Books")

@section('content')
<x-dashboard-side-bar selected="book" class="bg-primary"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="flex-fill mw-100">
  <x-dashboard-navigation selected="books"></x-dashboard-navigation>

  <div class="container my-4">
    <div class="mb-3 d-flex align-items-center justify-content-between flex-column flex-lg-row gap-2">
      <a class="btn btn-success w-100 w-lg-fit" href="{{ route('books.create') }}">Add a new book</a>

      <x-query-accordion>
        <form action="{{ route('books.index') }}" method="get" class="d-flex gap-2 flex-column flex-lg-row gap-lg-1 py-3 py-lg-0">
          <input name="search" class="form-control" type="search" placeholder="Search" value="{{ request()->query('search', '') }}" aria-label="Search">
  
          <select name="o" class="form-select" aria-label="Default select example">
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

          <div class="dropdown w-100 w-lg-fit">
            <button class="btn btn-secondary dropdown-toggle w-100 w-lg-fit" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Filter by
            </button>
            <ul class="dropdown-menu w-100 w-lg-fit p-1">
              <li class="mb-1">
                <input type="text" class="form-control" name="genre" placeholder="Enter a genre" value="{{ request()->query('genre', '') }}">
              </li>
              <li>
                <input type="text" class="form-control" name="author" placeholder="Enter a author" value="{{ request()->query('author', '') }}">
              </li>
            </ul>
          </div>
          
          <button class="btn btn-outline-primary" type="submit">Apply</button>
        </form>
      </x-query-accordion>
    </div>
    
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <th scope="col" width="5%">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Stock</th>
          <th scope="col" width="14%">Amount Borrowed</th>
          <th scope="col" width="18%">Actions</th>
        </thead>
      
        <tbody>
          @foreach ($books as $book)
            <tr>
              <td>{{ $book->id }}</td>
              <td>{{ $book->name }}</td>
              <td>{{ $book->price }}</td>
              <td>{{ $book->stock }}</td>
              <td>{{ $book->amount_borrowed }}</td>
      
              <td class="d-flex gap-1">
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
  
    <x-paginate-links :links="$books" :useHtmx=false></x-paginate-links>
  </div>
</div>
@endsection