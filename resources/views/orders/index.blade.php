@extends('layouts.dashboard')

@section('title', "Dashboard - Orders")

@section('top-nav')
@endsection

@section('content')
<x-dashboard-side-bar selected="order" class="bg-primary"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="flex-fill mw-100">
  <x-dashboard-navigation selected="orders"></x-dashboard-navigation>

  <div class="container my-4">
    <div class="mb-3 d-flex align-items-center justify-content-between flex-column flex-lg-row gap-2">
      <a class="btn btn-success w-100 w-lg-fit" href="{{ route('orders.create') }}">Add a new order</a>

      <x-query-accordion>
        <form action="{{ route('orders.index') }}" method="get" class="d-flex gap-2 flex-column flex-lg-row gap-lg-1 py-3 py-lg-0">
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
  
          <select name="filter" class="form-select" aria-label="Default select example">
            <option selected disabled>Filter by</option>
  
            @if (request()->query('filter') === "overdue")
              <option selected value="overdue">Overdue only</option>
            @else
              <option value="overdue">Overdue only</option>
            @endif
  
            @if (request()->query('filter') === "due")
              <option selected value="due">Non overdue only</option>
            @else
              <option value="due">Non overdue only</option>
            @endif
          </select>
          
          <button class="btn btn-outline-primary" type="submit">Apply</button>
        </form>
      </x-query-accordion>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <th scope="col" width="5%">ID</th>
          <th scope="col">Username</th>
          <th scope="col">Token</th>
          <th scope="col">Status</th>
          <th scope="col" width="18%">Actions</th>
        </thead>
      
        <tbody>
          @foreach ($orders as $order)
            <tr>
              <td>{{ $order->id }}</td>
              <td>{{ $order->user->username }}</td>
              <td>{{ $order->token }}</td>
              <td>{{ $order->status }}</td>
      
              <td class="d-flex gap-1">
                <button type="button" class="btn btn-info" 
                  data-bs-target="#detailsModal" 
                  data-bs-toggle="modal" 
                  hx-get="{{ route('orders.show' , $order->id) }}" 
                  hx-target="#detailsBody" 
                  hx-swap="innerHTML">Show
                </button>
  
                <button type="button" class="btn btn-danger"
                  hx-confirm="Are you sure you want to delete this order?"
                  hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}' 
                  hx-delete="{{ route('orders.destroy', $order->id) }}" 
                  hx-target="closest tr" 
                  hx-swap="outerHTML">Delete
                </button>
  
                <a class="btn btn-warning" 
                  href="{{ route('orders.edit', $order->id) }}">Edit
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
    <x-paginate-links :links="$orders" :useHtmx=false></x-paginate-links>
  </div>
</div>
@endsection