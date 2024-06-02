@extends('layouts.dashboard')

@section('title', "Dashboard - Orders")

@section('top-nav')
@endsection

@section('content')
<x-dashboard-side-bar selected="order" class="bg-primary"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="flex-fill mw-100">
  <x-dashboard-navigation selected="orders"></x-dashboard-navigation>

  <div class="container my-3">
    <div class="mb-3 d-flex align-items-center justify-content-end">
      <a class="btn btn-success" href="{{ route('orders.create') }}">Add a new order</a>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <th scope="col" width="5%">ID</th>
          <th scope="col" width="10%">User ID</th>
          <th scope="col">Token</th>
          <th scope="col">Status</th>
          <th scope="col" width="18%">Actions</th>
        </thead>
      
        <tbody>
          @foreach ($orders as $order)
            <tr>
              <td>{{ $order->id }}</td>
              <td>{{ $order->user_id }}</td>
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
  
    <x-paginate-links :links="$orders"></x-paginate-links>
  </div>
</div>
@endsection