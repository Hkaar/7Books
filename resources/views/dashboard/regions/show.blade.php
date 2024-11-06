@extends('layouts.app')

@section('title', 'Region Details - Dashboard')

@section('main')
  <x-dashboard-layout active="region">
    <x-detail-layout title="region" :model="$region" editRoute="regions.edit" createRoute="regions.create">
      <div class="row mb-3">
        <div class="col-12 col-md-3">
          <div class="d-flex align-items-center gap-3 rounded p-3 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="m6.115 5.19.319 1.913A6 6 0 0 0 8.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 0 0 2.288-4.042 1.087 1.087 0 0 0-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 0 1-.98-.314l-.295-.295a1.125 1.125 0 0 1 0-1.591l.13-.132a1.125 1.125 0 0 1 1.3-.21l.603.302a.809.809 0 0 0 1.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 0 0 1.528-1.732l.146-.292M6.115 5.19A9 9 0 1 0 17.18 4.64M6.115 5.19A8.965 8.965 0 0 1 12 3c1.929 0 3.716.607 5.18 1.64" />
            </svg>


            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Name
              </h6>

              <span>
                {{ $region->name }}
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-3">
          <div class="d-flex align-items-center gap-3 rounded p-3 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>

            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Timezone
              </h6>

              <span>
                {{ $region->timezone }}
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-3">
          <div class="d-flex align-items-center gap-3 rounded p-3 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-1/10">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
            </svg>

            <div class="d-flex flex-column gap-1">
              <h6 class="text-h6 fw-medium">
                Total libraries
              </h6>

              <span>
                {{ count($region->libraries) }}
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-3">
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
                {{ count($region->books) }}
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="row px-2.5">
        <div class="col-12 col-md-7 d-flex flex-column gap-2 rounded px-4 py-3 shadow-sm">
          <x-detail-badge title="Name">
            {{ $region->name }}
          </x-detail-badge>

          <x-detail-badge title="Timezone">
            {{ $region->timezone }}
          </x-detail-badge>

          <x-detail-badge title="Libraries">
            @if (count($region->libraries) <= 0)
              No related libraries were found
            @else
              @foreach ($region->libraries as $library)
                <span class="badge text-bg-secondary rounded p-2">{{ $library->name }}</span>
              @endforeach
            @endif
          </x-detail-badge>

          <x-detail-badge title="Books">
            @if (count($region->books) <= 0)
              No related books(s) were found
            @else
              @foreach ($region->books as $book)
                <span class="badge text-bg-secondary rounded p-2">{{ $book->name }}</span>
              @endforeach
            @endif
          </x-detail-badge>

          <x-detail-badge title="Users">
            @if (count($region->users) <= 0)
              No related users(s) were found
            @else
              @foreach ($region->users as $user)
                <span class="badge text-bg-secondary rounded p-2">{{ $user->name }}</span>
              @endforeach
            @endif
          </x-detail-badge>

          <x-detail-badge title="Description">
            {!! nl2br(e($region->desc ? strip_tags($region->desc) : 'No description was provided')) !!}
          </x-detail-badge>
        </div>

        <div class="col-12 col-md-5">
        </div>
      </div>
    </x-detail-layout>
  </x-dashboard-layout>
@endsection
