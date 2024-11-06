@extends('layouts.app')

@section('title', 'Library Details - Dashboard')

@section('main')
  <x-dashboard-layout active="library">
    <x-detail-layout title="library" :model="$library" editRoute="libraries.edit" createRoute="libraries.create">
      <div class="row mb-3">
        <div class="col-12 col-md-4">
          <div class="d-flex align-items-center gap-3 rounded p-3 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
            </svg>

            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Name
              </h6>

              <span>
                {{ $library->name }}
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4">
          <div class="d-flex align-items-center gap-3 rounded p-3 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="m20.893 13.393-1.135-1.135a2.252 2.252 0 0 1-.421-.585l-1.08-2.16a.414.414 0 0 0-.663-.107.827.827 0 0 1-.812.21l-1.273-.363a.89.89 0 0 0-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 0 1-1.81 1.025 1.055 1.055 0 0 1-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 0 1-1.383-2.46l.007-.042a2.25 2.25 0 0 1 .29-.787l.09-.15a2.25 2.25 0 0 1 2.37-1.048l1.178.236a1.125 1.125 0 0 0 1.302-.795l.208-.73a1.125 1.125 0 0 0-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 0 1-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 0 1-1.458-1.137l1.411-2.353a2.25 2.25 0 0 0 .286-.76m11.928 9.869A9 9 0 0 0 8.965 3.525m11.928 9.868A9 9 0 1 1 8.965 3.525" />
            </svg>

            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Region
              </h6>

              <span>
                {{ $library->region->name }}
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4">
          <div class="d-flex align-items-center gap-3 rounded p-3 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>

            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Total books
              </h6>

              <span>
                {{ count($library->books) }}
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="row px-2.5">
        <div class="col-12 col-md-7 d-flex flex-column gap-2 rounded px-4 py-3 shadow-sm">
          <x-detail-badge title="Name">
            {{ $library->name }}
          </x-detail-badge>

          <x-detail-badge title="Region">
            {{ $library->region->name }}
          </x-detail-badge>

          <x-detail-badge title="Placed date">
            @if (count($library->books) <= 0)
              No related book(s) were found
            @else
              @foreach ($library->books as $book)
                <span class="badge text-bg-secondary rounded p-2">{{ $book->name }}</span>
              @endforeach
            @endif
          </x-detail-badge>

          <x-detail-badge title="Description">
            {!! nl2br(e($library->desc ? strip_tags($library->desc) : 'No description was provided')) !!}
          </x-detail-badge>
        </div>

        <div class="col-12 col-md-5">
        </div>
      </div>
    </x-detail-layout>
  </x-dashboard-layout>
@endsection
