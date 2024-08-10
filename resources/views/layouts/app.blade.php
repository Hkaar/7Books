<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>@yield('title')</title>

  @vite(['resources/scss/app.scss'])
  @stack('css')
</head>
<body>
  @yield('main')

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

  @vite(['resources/js/app.js'])
  @stack('js')
</body>
</html>