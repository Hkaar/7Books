@extends('layouts.app')

@section('main')
<div class="d-flex min-vh-100">
  @yield('content')
</div>
@endsection

@section('extra')
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-lg-down modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center justify-content-between">
        <h1 class="modal-title fs-5" id="detailModal">Details</h1>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="fa-regular fa-x"></i>
        </button>
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
      <div class="modal-header d-flex align-items-center justify-content-between">
        <h1 class="modal-title fs-5" id="selectItemsLabel">Available Items</h1>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="fa-regular fa-x"></i>
        </button>
      </div>

      <div class="modal-body">
        <div class="container p-1" id="selectItemsBody" hx-on::after-request="updateItemCards()">
          ...
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="confirmModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center justify-content-between">
        <h5 class="modal-title" id="confirmModalLabel">Confirm Action</h5>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="fa-regular fa-x"></i>
        </button>
      </div>

      <div class="modal-body">
        <p id="confirmText" class="py-3"></p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="cancelButton" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmButton">Proceed Anyway</button>
      </div>
    </div>
  </div>
</div>
@endsection