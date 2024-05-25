@extends('layouts.dashboard')

@section('title', "Dashboard - Users")

@section('content')
<x-dashboard-side-bar selected="user"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="flex-fill mw-100">
  <x-dashboard-navigation selected="users"></x-dashboard-navigation>
  
  <div class="container my-3">
    <div class="mb-3 d-flex align-items-center justify-content-between">
      <a class="btn btn-success" href="{{ route('users.create') }}">Add a user</a>

      <form action="" method="get" class="d-flex gap-1">
        <label for="sortBy">Sort by</label>
        <select class="form-select" id="sortBy" aria-label="Default select example">
          <option selected>Slect date</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>

        <select class="form-select" aria-label="Default select example">
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </form>
    </div>
    
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <th scope="col" width="5%">ID</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Level</th>
          <th scope="col" width="18%">Actions</th>
        </thead>
      
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->level }}</td>
      
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
  
    <x-paginate-links :links="$users"></x-paginate-links>
  </div>
</div>
@endsection