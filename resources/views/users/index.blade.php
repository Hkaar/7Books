@extends('layouts.dashboard')

@section('title', "Dashboard - Users")

@section('content')
<x-dashboard-side-bar selected="user"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="container">
  <div class="action-bar mb-3">
    <a class="btn btn-primary" href="{{ route('users.create') }}">Add a user</a>
  </div>
  
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <th scope="col" width="5%">ID</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col" width="10%">Level</th>
        <th scope="col" width="15%">Actions</th>
      </thead>
    
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->level }}</td>
    
            <td class="action-bar">
              <button type="button" class="btn btn-info" 
                data-bs-target="#detailsModal" 
                data-bs-toggle="modal" 
                hx-get="{{ route('users.show' , $user->id) }}" 
                hx-target="#detailsBody" 
                hx-swap="innerHTML"
                >Show
              </button>

              <button type="button" class="btn btn-danger" 
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

  {{ $users->links() }}
</div>
@endsection