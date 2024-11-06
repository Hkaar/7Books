@extends('layouts.app')

@section('title', 'Author Details - Dashboard')

@section('main')
<x-dashboard-layout active="author">
  <x-detail-layout title="author" :model="$author" editRoute="authors.edit" createRoute="authors.create">
    <div class="row mb-3">
      <div class="col-12 col-md-4">
        <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-1/10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
          </svg>

          <div class="d-flex flex-column gap-1">
            <h6 class="text-h6 fw-medium">
              Name
            </h6>

            <span>
              {{ $author->name }}
            </span>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-1/10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
          </svg>

          <div class="d-flex flex-column gap-1">
            <h6 class="text-h6 fw-medium">
              Phone
            </h6>

            <span>
              {{ $author->phone }}
            </span>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="d-flex align-items-center gap-3 p-3 shadow-sm rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-1/10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
          </svg>

          <div class="d-flex flex-column gap-1">
            <h6 class="text-h6 fw-medium">
              Authored
            </h6>

            <span>
              {{ count($author->books) }} book(s)
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-md-7 d-flex align-items-center">
        <div class="shadow-sm rounded px-4 py-3 flex-fill d-flex flex-column gap-2">
          <x-detail-badge title="Name">
            {{ $author->name }}
          </x-detail-badge>

          <x-detail-badge title="Address">
            {{ $author->address }}
          </x-detail-badge>

          <x-detail-badge title="Phone">
            {{ $author->phone }}
          </x-detail-badge>

          <x-detail-badge title="Total authored books">
            {{ count($author->books) }} book(s)
          </x-detail-badge>
        </div>
      </div>

      <div class="col-12 col-md-5 d-flex align-items-center order-first order-md-last mb-3 mb-md-0">
        <div class="d-flex align-items-center justify-content-center flex-fill">
          <img src="{{ $author->img ? Storage::url($author->img) : Vite::asset('resources/images/default-avatar.png') }}" alt="Profile picture not available" class="img-fluid size-1/2 ratio-box rounded">
        </div>
      </div>
    </div>
  </x-detail-layout>
</x-dashboard-layout>
@endsection

{{--
      <button type="button" class="btn btn-primary"
        hx-get="{{ URL::to('/manage/authors/authored', $author->id) }}"
        hx-target="#detailsBody"
        hx-swap="innerHTML"
        >Show Books
      </button>
</div> --}}