@extends('layouts.app')

@section('title', 'Dashboard - Orders')

@section('main')
  <x-dashboard-layout active="order">
    <div class="d-flex flex-column border shadow-sm rounded">
      <div class="d-flex align-items-center justify-content-between flex-column flex-lg-row gap-2 border-b border-body-tertiary px-3 py-4">
        <a class="btn btn-success w-100 w-lg-fit" href="{{ route('orders.create') }}">Add a new order</a>

        <x-query-accordion>
          <form action="{{ route('orders.index') }}" method="get"
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

            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Filters
              </button>

              <ul class="dropdown-menu px-1">
                <li class="mb-1">
                  <select name="status" class="form-select" aria-label="Filter select">
                    <option disabled selected>Status</option>

                    @foreach ($statuses as $status)
                      <option value="{{ $status->name }}"
                        {{ strtolower($status->name) === request()->query('status') ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_', ' ', $status->name)) }}
                      </option>
                    @endforeach
                  </select>
                </li>
                <li>
                  <select name="date" class="form-select" aria-label="Filter select">
                    <option disabled selected>Due dates</option>
                    <option value="overdue" {{ request()->query('date') === 'overdue' ? 'selected' : '' }}>Overdue only
                    </option>
                    <option value="due" {{ request()->query('date') === 'due' ? 'selected' : '' }}>Due only</option>
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
            <th scope="col">Username</th>
            <th scope="col">Token</th>
            <th scope="col">Status</th>
            <th scope="col" width="18%">Actions</th>
          </thead>

          <tbody>
            @foreach ($orders as $i => $order)
              <tr>
                <td>{{ ($orders->currentPage() - 1) * $orders->perPage() + $i+1 }}</td>
                <td>{{ $order->user->username }}</td>
                <td>{{ $order->token }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $order->status->name)) }}</td>

                <td class="d-flex gap-1">
                  <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">
                    Show
                  </a>

                  <button type="button" class="btn btn-danger" hx-confirm="Are you sure you want to delete this order?"
                    hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                    hx-delete="{{ route('orders.destroy', $order->id) }}" hx-target="closest tr" hx-swap="outerHTML">Delete
                  </button>

                  <a class="btn btn-warning" href="{{ route('orders.edit', $order->id) }}">Edit
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="d-flex align-items-center justify-content-between px-3 pt-2 pb-3">
        <x-paginate-links :links="$orders" :useHtmx=false></x-paginate-links>

        <x-paginate-counter :items="$orders"></x-paginate-counter>
      </div>
    </div>
  </x-dashboard-layout>
@endsection
