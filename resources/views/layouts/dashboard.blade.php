@extends('layouts.app')

@section('main')
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <article class="brand">
      <h5>Dashboard</h5>
    </article>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('logout') }}">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="d-flex flex-fill" style="gap: 20px">
  @yield('content')
</div>
@endsection

@section('extra')
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-lg-down modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="detailModal">Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body" id="detailsBody">
        ...
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="selectItems" tabindex="-1" aria-labelledby="selectItemsLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-lg-down modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="selectItemsLabel">Select Items</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="container p-1" id="selectItemsBody">
          ...
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@yield('modals')
@endsection