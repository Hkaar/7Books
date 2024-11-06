@extends('layouts.app')

@section('title', 'User Details - Dashboard')

@section('main')
  <x-dashboard-layout active="user">
    <x-detail-layout title="user" :model="$user" editRoute="users.edit" createRoute="users.create">
      <div class="row mb-3">
        <div class="col-12 col-md-4 mb-3">
          <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
            <img src="{{ $user->img ? Storage::url($user->img) : Vite::asset('resources/images/default-avatar.png') }}" alt="No image" class="img-fluid size-1/10 rounded">

            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                {{ $user->name }}
              </h6>

              <span>
                {{ $user->role->name }}
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4 mb-3">
          <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
            </svg>

            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Total orders
              </h6>

              <span>
                {{ count($user->orders) }}
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4">
          <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
            </svg>

            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Total book ratings
              </h6>

              <span>
                {{ count($user->ratings) }}
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-md-7">
          <div class="px-4 py-3 d-flex flex-column gap-2 rounded shadow-sm">
            <x-detail-badge title="Display Name">
              {{ $user->name }}
            </x-detail-badge>

            <x-detail-badge title="Username">
              {{ $user->username }}
            </x-detail-badge>

            <x-detail-badge title="Email">
              {{ $user->email }}
            </x-detail-badge>

            <x-detail-badge title="Role">
              {{ $user->role->name }}
            </x-detail-badge>
          </div>
        </div>

        <div class="col-12 col-md-5 d-flex align-items-center justify-content-center">
          <img src="{{ $user->img ? Storage::url($user->img) : Vite::asset('resources/images/default-avatar.png') }}" alt="No image" class="img-fluid size-1/2 rounded">
        </div>
      </div>
    </x-detail-layout>
  </x-dashboard-layout>
@endsection
