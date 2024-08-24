@extends('layouts.app')

@section('title', 'Dashboard - Orders')

@section('main')
  <x-dashboard-layout active="order">
    <div class="row flex-fill mt-auto">
      <div class="col-12 col-md-6 d-md-flex align-items-center justify-content-center mb-md-0 mt-md-0 d-none mb-3 mt-3">
        <img src="{{ Vite::asset('resources/images/add-files.svg') }}" alt="Image not available..."
          class="img-fluid w-75 ratio-box">
      </div>

      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div class="container">
          <form action="{{ route('orders.store') }}" method="POST" class="rounded px-3 py-4 shadow-sm border">
            @csrf

            <input type="hidden" name="items" id="items">

            <div class="mb-3">
              <label for="username" class="form-label fw-medium">Username or Email</label>
              <input class="form-control" id="username" type="text" name="username" required autofocus>

              @error('username')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="placed_date" class="form-label fw-medium">Placed Date</label>
              <input class="form-control" id="placed_date" type="datetime-local" name="placed_date"
                min="{{ now()->format('Y-m-d\TH:i') }}" required autofocus>

              @error('placed_date')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="return_date" class="form-label fw-medium">Return Date</label>
              <input class="form-control" id="return_date" type="datetime-local" name="return_date"
                min="{{ now()->format('Y-m-d\TH:i') }}" required autofocus>

              @error('return_date')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="status_id" class="form-label fw-medium">Status</label>

              <select name="status_id" id="status_id" class="form-select">
                @foreach ($statuses as $status)
                  <option value="{{ $status->id }}">{{ ucfirst(str_replace('_', ' ', $status->name)) }}</option>
                @endforeach
              </select>

              @error('status_id')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="d-flex align-items-md-center flex-column flex-md-row gap-1 mt-4">
              <button type="button" class="btn btn-secondary me-md-auto me-0" data-bs-target="#addBooks"
                data-bs-toggle="modal" hx-get="{{ route('books.multi-select') }}" hx-target="#addBooksBody"
                hx-on::after-request="updateItemCards()" hx-swap="innerHTML">Select Books
              </button>

              <div class="d-flex gap-1">
                <a href="{{ route('orders.index') }}" class="btn btn-danger flex-fill">Cancel</a>
                <button type="submit" class="btn btn-primary flex-fill">Create</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </x-dashboard-layout>

  <div class="modal fade" id="addBooks" tabindex="-1" aria-labelledby="addBooksLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addBooksLabel">
            Add Books
          </h1>
          <button type="button" class="btn ms-auto" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-regular fa-x"></i>
          </button>
        </div>

        <div class="modal-body" id="addBooksBody">
          ...
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
