@extends('layouts.app')

@section('title', 'Book Details - Dashboard')

@section('main')
<x-dashboard-layout active="book">
  <x-detail-layout title="book" :model="$book" editRoute="books.edit" createRoute="books.create">
    <div class="row mb-3">
      <div class="col-12 col-md-3 ">
        <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-1/10">
            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
          </svg>

          <div class="d-flex flex-column gap-1">
            <h6 class="text-h6 fw-medium">
              ISBN-13
            </h6>

            <span>
              {{ $book->isbn }}
            </span>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 ">
        <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-1/10">
            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
          </svg>

          <div class="d-flex flex-column gap-1">
            <h6 class="text-h6 fw-medium">
              ISBN-10
            </h6>

            <span>
              {{ $book->isbn }}
            </span>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 ">
        <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-1/10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
          </svg>

          <div class="d-flex flex-column gap-1">
            <h6 class="text-h6 fw-medium">
              Rating
            </h6>

            <span>
              {{ $book->rating() }} out of 5 from {{ count($book->ratings) }} user(s)
            </span>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 ">
        <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-1/10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
          </svg>

          <div class="d-flex flex-column gap-1">
            <h6 class="text-h6 fw-medium">
              Ordered
            </h6>

            <span>
              {{ count($book->items) }} times
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-md-7 d-flex align-items-center">
        <div class="shadow-sm rounded p-3">
          <div class="row mb-3">
            <div class="col-6">
              <span class="fw-medium">
                Title
              </span>
            </div>
            <div class="col-6">
              <span>
                {{ $book->name }}
              </span>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-6">
              <span class="fw-medium">
                ISBN-13
              </span>
            </div>
            <div class="col-6">
              <span>
                {{ $book->isbn }}
              </span>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-6">
              <span class="fw-medium">
                ISBN-10
              </span>
            </div>
            <div class="col-6">
              <span>
                {{ $book->isbn }}
              </span>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-6">
              <span class="fw-medium">
                Price
              </span>
            </div>
            <div class="col-6">
              <span>
                $ {{ $book->price }}
              </span>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-6">
              <span class="fw-medium">
                Rate
              </span>
            </div>
            <div class="col-6">
              <span>
                $ {{ $book->rate }} / day
              </span>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-6">
              <span class="fw-medium">
                Rating
              </span>
            </div>
            <div class="col-6">
              <span>
                {{ $book->rating() }} out of 5 from {{ count($book->ratings) }} user(s)
              </span>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-6">
              <span class="fw-medium">
                Author(s)
              </span>
            </div>
            <div class="col-6">
              @if (count($book->authors) <= 0)
                No related author(s) were found
              @else
                <ul>
                  @foreach ($book->authors as $author)
                      <li>{{ $author->name }}</li>
                  @endforeach
                </ul>
              @endif
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-6">
              <span class="fw-medium">
                Genre(s)
              </span>
            </div>
            <div class="col-6">
              @if (count($book->genres) <= 0)
                No related genre(s) were found
              @else
                <ul>
                  @foreach ($book->genres as $genre)
                      <li>{{ $genre->name }}</li>
                  @endforeach
                </ul>
              @endif
            </div>
          </div>

          <div class="row">
            <div class="col-12 mb-3">
              <span class="fw-medium">
                Description
              </span>
            </div>
            <div class="col-12">
              <p>
                {{ $book->desc }}
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-5 d-flex align-items-center order-first order-md-last mb-3 mb-md-0">
        <div class="d-flex flex-column align-items-center justify-content-center">
          <img src="{{ Storage::url($book->img) }}" alt="Image not available" class="img-fluid ratio-book-cover size-1/2 mb-3">

          <span class="text-h6 fw-medium">
            {{ $book->name }}
          </span>
        </div>
      </div>
    </div>
  </x-detail-layout>
</x-dashboard-layout>
@endsection