@extends('layouts.dashboard')

@section('title', "Dashboard - Users")

@section('content')
<nav id="side-nav" class="d-none d-md-block" data-collapsed="false">
  <div class="nav-items">
    <a href="#" class="nav-item side-nav-open">
      <i class="fa-solid fa-arrow-right"></i>
    </a>

    <a href="#" class="nav-item side-nav-close">
      <i class="fa-solid fa-arrow-left"></i>
      <span class="nav-item-title">Close</span>
    </a>

    <a href="#" class="nav-item active">
      <i class="fa-solid fa-user"></i>
      <span class="nav-item-title">Users</span>
    </a>

    <a href="#" class="nav-item">
      <i class="fa-solid fa-list"></i>
      <span class="nav-item-title">Orders</span>
    </a>

    <a href="#" class="nav-item">
      <i class="fa-solid fa-book"></i>
      <span class="nav-item-title">Books</span>
    </a>

    <a href="#" class="nav-item">
      <i class="fa-solid fa-pen"></i>
      <span class="nav-item-title">Authors</span>
    </a>

    <a href="#" class="nav-item mt-3">
      <i class="fa-solid fa-gear"></i>
      <span class="nav-item-title">Settings</span>
    </a>
  </div>
</nav>

<div class="d-flex-flex-column">
  <div class="action-bar justify-content-end">
    <a class="btn btn-primary" href="{{ URL::to('users/create') }}">Add</a>
  </div>
  
  <table class="table table-striped">
    <thead>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Level</th>
      <th scope="col">Actions</th>
    </thead>
  
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->password }}</td>
          <td>{{ $user->level }}</td>
  
          <td class="action-bar">
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-small btn-danger">Delete</button>
            </form>

            <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $user->id) }}">Show</a>
            <a class="btn btn-small btn-info" href="{{ route('users.edit', $user->id) }}">Edit</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $users->links() }}
</div>
@endsection