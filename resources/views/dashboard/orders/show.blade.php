@extends('layouts.app')

@section('title', 'Order Details - Dashboard')

@section('main')
  <x-dashboard-layout active="order">
    <x-detail-layout title="order" :model="$order" editRoute="orders.edit" createRoute="orders.create">
      <div class="row mb-3">
        <div class="col-12 col-md-3 ">
          <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>

            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Placed by
              </h6>

              <span>
                {{ $order->user->name }}
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-3">
          <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
            </svg>

            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Order Token
              </h6>

              <span>
                {{ $order->token }}
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-3">
          <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>

            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Total items
              </h6>

              <span>
                {{ count($order->items) }}
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-3">
          <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
            </svg>

            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Status
              </h6>

              <span>
                {{ $order->status->name }}
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="row px-2.5">
        <div class="col-12 col-md-7 px-4 py-3 shadow-sm rounded d-flex flex-column gap-2">
          <x-detail-badge title="Placed by">
            {{ $order->user->name }}
          </x-detail-badge>

          <x-detail-badge title="Token">
            {{ $order->token }}
          </x-detail-badge>

          <x-detail-badge title="Placed date">
            {{ $order->placed_date }}
          </x-detail-badge>

          <x-detail-badge title="Return Date">
            {{ $order->return_date }}
          </x-detail-badge>
          
          <x-detail-badge title="Status">
            {{ $order->status->name }}
          </x-detail-badge>

          <x-detail-badge title="Total Items">
            {{ count($order->items) }}
          </x-detail-badge>
        </div>

        <div class="col-12 col-md-5">
        </div>
      </div>
    </x-detail-layout>
  </x-dashboard-layout>
@endsection

{{-- <div class="row h-100">
  <div class="col-12">
    <button type="button" class="btn btn-primary"
      hx-get="{{ route('orders.items', $order->id) }}"
      hx-target="#detailsBody"
      hx-swap="innerHTML"
      >Show Books
    </button>
  </div>
</div> --}}
