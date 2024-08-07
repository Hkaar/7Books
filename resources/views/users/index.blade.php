@extends('layouts.dashboard')

@section('title', "Dashboard - Users")

@section('content')
<x-dashboard-side-bar selected="user" class="bg-primary"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="flex-fill mw-100">
  <x-dashboard-navigation selected="users"></x-dashboard-navigation>

  <div class="container my-4">
    <div class="mb-3 d-flex align-items-center justify-content-between flex-column flex-lg-row gap-2">
      <a class="btn btn-success w-100 w-lg-fit" href="{{ route('users.create') }}">Add a new user</a>

      <x-query-accordion>
        <form action="{{ route('users.index') }}" method="get" class="d-flex flex-lg-row flex-column gap-2 gap-lg-1 py-3 py-lg-0">
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

          <select name="role" class="form-select" aria-label="Default select example">
            <option selected disabled>Filter by</option>

            @foreach ($roles as $role)
              @if (request()->query('role') === $role->name)
                <option selected value="{{ strtolower( $role->name ) }}">{{ ucfirst($role->name) }} only</option>
              @else
                <option value="{{ strtolower( $role->name ) }}">{{ ucfirst($role->name) }} only</option>
              @endif
            @endforeach
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
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col" width="18%">Actions</th>
        </thead>

        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->role->name }}</td>

              <td class="d-flex gap-1">
                <button type="button" class="btn btn-info"
                  data-bs-target="#detailsModal"
                  data-bs-toggle="modal"
                  hx-get="{{ route('users.show' , $user->id) }}"
                  hx-target="#detailsBody"
                  hx-swap="innerHTML"
                  >Show
                </button>

                <button type="button" class="btn btn-danger"
                  hx-confirm="Are you sure you want to delete this user?"
                  hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                  hx-delete="{{ route('users.destroy', $user->id) }}"
                  hx-target="closest tr"
                  hx-swap="outerHTML">Delete
                </button>

                <a class="btn btn-small btn-warning"
                  href="{{ route('users.edit', $user->id) }}">Edit
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <x-paginate-links :links="$users" :useHtmx=false></x-paginate-links>
  </div>
</div>
@endsection