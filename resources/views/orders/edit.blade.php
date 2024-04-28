@extends('layouts.dashboard')

@section('title', "Dashboard - Orders")

@section('top-nav')
  <x-dashboard-navigation selected="orders"></x-dashboard-navigation>
@endsection

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
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
          @csrf
          @method('PUT')

          <input type="hidden" name="items" id="items" value="{{ $items }}">

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" id="email" type="email" name="email" value="{{ $email }}" autofocus>
            
            @error('email')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="token" class="form-label">Token</label>
            <input class="form-control" id="token" type="text" name="token" placeholder="{{ $order->token }}" autofocus>
            
            @error('token')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="return_date" class="form-label">Return Date</label>
            <input class="form-control" id="return_date" type="datetime-local" name="return_date" value="{{ $order->return_date }}" autofocus>
            
            @error('return_date')
              <span>{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="placed" class="form-label">Placed Date</label>
            <input class="form-control" id="placed" type="datetime-local" name="placed" value="{{ $order->placed }}" autofocus>
            
            @error('placed')
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