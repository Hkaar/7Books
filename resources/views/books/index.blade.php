@extends('layouts.dashboard')

@section('title', "Dashboard - Users")

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

    <a href="#" class="nav-item">
      <i class="fa-solid fa-user"></i>
      <span class="nav-item-title">Users</span>
    </a>

    <a href="#" class="nav-item">
      <i class="fa-solid fa-list"></i>
      <span class="nav-item-title">Orders</span>
    </a>

    <a href="#" class="nav-item active">
      <i class="fa-solid fa-book"></i>
      <span class="nav-item-title">Books</span>
    </a>

    <a href="#" class="nav-item">
      <i class="fa-solid fa-pen"></i>
      <span class="nav-item-title">Authors</span>
    </a>

    <a href="#" class="nav-item mt-3">
      <i class="fa-solid fa-gear"></i>
      <span class="nav-item-title">Settings</span>
    </a>
  </div>
</nav>

<div class="d-flex-flex-column">
  <div class="action-bar justify-content-end">
    <a class="btn btn-primary" href="{{ URL::to('manage/books/create') }}">Add</a>
  </div>
  
  <table class="table table-striped">
    <thead>
      <th scope="col">ID</th>
      <th scope="col">ISBN</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Rate</th>
      <th scope="col">Amount Borrowed</th>
    </thead>
  
    <tbody>
      @foreach ($books as $book)
        <tr>
          <td>{{ $book->id }}</td>
          <td>{{ $book->isbn }}</td>
          <td>{{ $book->name }}</td>
          <td>{{ $book->desc }}</td>
          <td>{{ $book->price }}</td>
          <td>{{ $book->stock }}</td>
          <td>{{ $book->rate }}</td>
          <td>{{ $book->amount_borrowed }}</td>
  
          <td class="action-bar">
            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-small btn-danger">Delete</button>
            </form>

            <a class="btn btn-small btn-success" href="{{ URL::to('books/' . $book->id) }}">Show</a>
            <a class="btn btn-small btn-info" href="{{ route('books.edit', $book->id) }}">Edit</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $books->links() }}
</div>
@endsection