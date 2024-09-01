@extends('layouts.app')

@section('title', 'Dashboard - Regions')

@section('main')
  <x-dashboard-layout active="region">
    <div class="d-flex flex-column rounded border shadow-sm">
      <div class="d-flex align-items-center justify-content-between flex-column flex-lg-row gap-2 border-b border-body-tertiary px-3 py-4">
        <a class="btn btn-success w-100 w-lg-fit" href="{{ route('regions.create') }}">Add a new region</a>

        <x-query-accordion>
          <form action="{{ route('regions.index') }}" method="get"
            class="d-flex flex-column flex-lg-row gap-lg-1 py-lg-0 gap-2 py-3">
            <input name="search" class="form-control" type="search" placeholder="Search"
              value="{{ request()->query('search', '') }}" aria-label="Search">

            <select name="o" class="form-select">
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

            <button class="btn btn-outline-primary" type="submit">Apply</button>
          </form>
        </x-query-accordion>
      </div>

      <div class="table-responsive px-3">
        <table class="table-striped table-bordered table-hover table">
          <thead>
            <th scope="col" width="5%">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Timezone</th>
            <th scope="col" width="15%">Actions</th>
          </thead>

          <tbody>
            @foreach ($regions as $i => $region)
              <tr>
                <td>{{ ($regions->currentPage() - 1) * $regions->perPage() + $i+1 }}</td>
                <td>{{ $region->name }}</td>
                <td>{{ $region->timezone }}</td>

                <td class="d-flex gap-1">
                  <button type="button" class="btn btn-info" data-bs-target="#detailsModal" data-bs-toggle="modal"
                    hx-get="{{ route('regions.show', $region->id) }}" hx-target="#detailsBody" hx-swap="innerHTML">Show
                  </button>

                  <button type="button" class="btn btn-danger" hx-confirm="region"
                    hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                    hx-delete="{{ route('regions.destroy', $region->id) }}" hx-target="closest tr"
                    hx-swap="outerHTML"
                    delete-confirmation>Delete
                  </button>

                  <a class="btn btn-warning" href="{{ route('regions.edit', $region->id) }}">Edit
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="d-flex align-items-center justify-content-between px-3 pt-2 pb-3">
        <x-paginate-links :links="$regions" :useHtmx=false></x-paginate-links>

        <x-paginate-counter :items="$regions"></x-paginate-counter>
      </div>
    </div>
  </x-dashboard-layout>
@endsection
