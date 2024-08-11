@extends('layouts.app')

@section('title', 'Genre Details - Dashboard')

@section('main')
  <x-dashboard-layout active="genre">
    <x-detail-layout title="genre" :model="$genre" editRoute="genres.edit" createRoute="genres.create">
      <div class="row mb-3">
        <div class="col-12 col-md-6">
          <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
            </svg>                        
  
            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Name
              </h6>
  
              <span>
                {{ $genre->name }}
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>                       
  
            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Featured
              </h6>
  
              <span>
                {{ count($genre->books) }} book(s)
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-md-7 d-flex align-items-center">
          <div class="shadow-sm rounded p-3 flex-fill">
            <div class="row mb-3">
              <div class="col-6">
                <span class="fw-medium">
                  Name
                </span>
              </div>
              <div class="col-6">
                <span>
                  {{ $genre->name }}
                </span>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <span class="fw-medium">
                  Featured in
                </span>
              </div>
              <div class="col-6">
                <span>
                  {{ count($genre->books) }} book(s)
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-5">

        </div>
      </div>
    </x-detail-layout>
  </x-dashboard-layout>
@endsection

{{--
    <div class="col-12">
      <div id="genreBooks" class="row">
        @foreach ($books as $book)
        <div class="col-12 col-md-4 mb-3">
          <div class="card svb-card svb-transition" data-item="{{ $book->id }}">
            <img src="{{ Storage::url($book->img) }}" class="card-img-top" alt="Image not available...">

            <div class="title svb-transition-fast">
              {{ $book->name }}
            </div>
          </div>
        </div>
        @endforeach

        @if (count($books) <= 0)
        <div class="col-12 mb-auto mb-md-3">
          <p>
            No related books were found...
          </p>
        </div>
        @endif
      </div>
    </div>

    <div class="col-12">
      <div class="row d-flex align-items-center">
        <div class="col-12 col-md-6">
          <ul class="pagination" hx-target="#genreBooks" hx-swap="innerHTML" style="margin: 0">
            @if ($books->onFirstPage())
              <li class="page-item disabled">
                <span class="page-link">Previous</span>
              </li>
            @else
              <li class="page-item">
                <a class="page-link" href="{{ $books->previousPageUrl() }}" hx-get="{{ $books->previousPageUrl() }}">Previous</a>
              </li>
            @endif

            @for ($i = 1; $i <= $books->lastPage(); $i++)
              <li class="page-item {{ ($books->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $books->url($i) }}" hx-get="{{ $books->url($i) }}">{{ $i }}</a>
              </li>
            @endfor

            @if ($books->hasMorePages())
              <li class="page-item">
                <a class="page-link" href="{{ $books->nextPageUrl() }}" hx-get="{{ $books->nextPageUrl() }}">Next</a>
              </li>
            @else
              <li class="page-item disabled">
                <span class="page-link">Next</span>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div> --}}