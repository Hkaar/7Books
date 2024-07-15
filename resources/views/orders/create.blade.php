@extends('layouts.dashboard')

@section('title', "Dashboard - Orders")

@section('content')
<x-dashboard-side-bar selected="order" class="bg-primary"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="flex-fill mw-100 d-flex flex-column">
  <x-dashboard-navigation selected="orders"></x-dashboard-navigation>

  <div class="container flex-fill d-flex flex-column">
    <div class="row flex-fill mt-auto">
      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center mb-3">
        <div class="large-thumbnail mb-3 mb-md-0 mt-3 mt-md-0">
          <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="Image not available...">
        </div>
      </div>
  
      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div class="container">
          <form action="{{ route('orders.store') }}" method="POST" class="shadow p-3 rounded">
            @csrf
  
            <input type="hidden" name="items" id="items">
  
            <div class="mb-3">
              <label for="username" class="form-label">Username or Email</label>
              <input class="form-control" id="username" type="text" name="username" required autofocus>
              
              @error('username')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="placed_date" class="form-label">Placed Date</label>
              <input class="form-control" id="placed_date" type="datetime-local" name="placed_date" min="{{ now()->format('Y-m-d\TH:i') }}" required autofocus>
              
              @error('placed_date')
                <span>{{ $message }}</span>
              @enderror
            </div>
  
            <div class="mb-3">
              <label for="return_date" class="form-label">Return Date</label>
              <input class="form-control" id="return_date" type="datetime-local" name="return_date" min="{{ now()->format('Y-m-d\TH:i') }}" required autofocus>
              
              @error('return_date')
                <span>{{ $message }}</span>
              @enderror
            </div>
  
            <div class="mb-3">
              <label for="status_id" class="form-label">Status</label>       
              
              <select name="status_id" id="status_id" class="form-select">
                @foreach ($statuses as $status)
                  <option value="{{ $status->id }}">{{ ucfirst(str_replace('_', ' ', $status->name)) }}</option>
                @endforeach
              </select>
      
              @error('status_id')
                <span>{{ $message }}</span>
              @enderror
            </div>
  
            <div class="d-flex align-items-md-center flex-column flex-md-row gap-1">
              <button type="button" class="btn btn-secondary me-0 me-md-auto"
                data-bs-target="#selectItems"
                data-bs-toggle="modal"
                hx-get="{{ route('books.multi-select') }}"
                hx-target="#selectItemsBody"
                hx-on::after-request="updateItemCards()"
                hx-swap="innerHTML">Select Books
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
  </div>
</div>
@endsection