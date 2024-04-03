@extends('layouts.dashboard')

@section('title', 'Dashboard - Users')
    
@section('content')
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
  <article>
    <h5>User ID</h5>
    <span>{{ $user->id }}</span>
  </article>

  <article>
    <h5>Username</h5>
    <span>{{ $user->name }}</span>
  </article>

  <article>
    <h5>User email</h5>
    <span>{{ $user->email }}</span>
  </article>

  <article>
    <h5>User password</h5>
    <span>{{ $user->password }}</span>
  </article>

  <article>
    <h5>User Level</h5>
    <span>{{ $user->level }}</span>
  </article>
</div>
@endsection