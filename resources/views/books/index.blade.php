@extends('layouts.app')

@section('title', 'Dashboard - Books')

@section('main')
  <x-dashboard-layout active="book">
    <div class="d-flex flex-column border shadow-sm rounded">
      <div class="d-flex align-items-center justify-content-between flex-column flex-lg-row gap-2 border-b border-body-tertiary px-3 py-4">
        <a class="btn btn-success w-100 w-lg-fit" href="{{ route('books.create') }}">Add a new book</a>
  
        <x-query-accordion>
          <form action="{{ route('books.index') }}" method="get"
            class="d-flex flex-column flex-lg-row gap-lg-1 py-lg-0 gap-2 py-3">
            <input name="search" class="form-control" type="search" placeholder="Search"
              value="{{ request()->query('search', '') }}" aria-label="Search">
  
            <select name="o" class="form-select" aria-label="Default select example">
              <option selected disabled>Order by</option>
  
              @if (request()->query('o') === 'oldest')
                <option selected value="oldest">Oldest</option>
              @else
                <option value="oldest">Oldest</option>
              @endif
  
              @if (request()->query('o') === 'latest')
                <option selected value="latest">Latest</option>
              @else
                <option value="latest">Latest</option>
              @endif
            </select>
  
            <div class="dropdown w-100 w-lg-fit">
              <button class="btn btn-secondary dropdown-toggle w-100 w-lg-fit" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Filters
              </button>
              <ul class="dropdown-menu w-100 w-lg-fit p-1">
                <li class="mb-1">
                  <select name="genre" class="form-select" aria-label="Default select example">
                    <option disabled selected>Genre</option>
                    @foreach ($genres as $genre)
                      <option value="{{ $genre->name }}"
                        {{ request()->query('genre') === $genre->name ? 'selected' : '' }}>
                        {{ str_replace('_', ' ', ucfirst($genre->name)) }}</option>
                    @endforeach
                  </select>
                </li>
                <li>
                  <select name="author" class="form-select" aria-label="Default select example">
                    <option disabled selected>Author</option>
                    @foreach ($authors as $author)
                      <option value="{{ $author->name }}"
                        {{ request()->query('author') === $author->name ? 'selected' : '' }}>
                        {{ str_replace('_', ' ', ucfirst($author->name)) }}</option>
                    @endforeach
                  </select>
                </li>
              </ul>
            </div>
  
            <button class="btn btn-outline-primary" type="submit">Apply</button>
          </form>
        </x-query-accordion>
      </div>
  
      <div class="table-responsive px-3">
        <table class="table-striped table-bordered table-hover table">
          <thead>
            <th scope="col" width="5%">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col" width="18%">Actions</th>
          </thead>
  
          <tbody>
            @foreach ($books as $i => $book)
              <tr>
                <td>{{ ($books->currentPage() - 1) * $books->perPage() + $i+1 }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->price }}</td>
  
                <td class="d-flex gap-1">
                  <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">
                    Show
                  </a>
  
                  <button type="button" class="btn btn-danger" hx-confirm="Are you sure you want to delete this book?"
                    hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                    hx-delete="{{ route('books.destroy', $book->id) }}" hx-target="closest tr" hx-swap="outerHTML">Delete
                  </button>
  
                  <a class="btn btn-warning" href="{{ route('books.edit', $book->id) }}">Edit
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  
      <div class="d-flex align-items-center justify-content-between px-3 pt-2 pb-3">
        <x-paginate-links :links="$books" :useHtmx=false></x-paginate-links>

        <x-paginate-counter :items="$books"></x-paginate-counter>
      </div>
    </div>
  </x-dashboard-layout>
@endsection
