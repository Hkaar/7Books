@extends('layouts.dashboard')

@section('title', "Dashboard - Books")

@section('content')
<x-dashboard-side-bar selected="order"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="container">
  <div class="row flex-fill">
    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center mb-3">
      <div class="large-thumbnail">
        <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="Image not available...">
      </div>
    </div>

    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
      <div class="container">
        <form action="{{ route('orders.store') }}" method="POST">
          @csrf

          <input type="hidden" name="items" id="items">

          <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input class="form-control" id="user_id" type="number" name="user_id" required autofocus>
            
            @error('user_id')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="return_date" class="form-label">Return Date</label>
            <input class="form-control" id="return_date" type="datetime-local" name="return_date" required autofocus>
            
            @error('return_date')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            
            <select name="status" id="status" class="form-select">
              <option value="pending">Pending</option>
              <option value="paid">Paid</option>
              <option value="returned">Returned</option>
            </select>
    
            @error('status')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="d-flex align-items-center">
            <button type="button" class="btn btn-secondary me-auto"
              data-bs-target="#selectItems"
              data-bs-toggle="modal"
              hx-get="{{ route('books.multi-select') }}"
              hx-target="#selectItemsBody"
              hx-on::after-request="updateItemCards()"
              hx-swap="innerHTML">Select Books
            </button>
      
            <a href="{{ route('orders.index') }}" class="btn btn-danger me-1">Cancel</a>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection