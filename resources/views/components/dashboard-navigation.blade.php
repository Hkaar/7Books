<nav {{ $attributes->merge(["class" => "navbar navbar-expand-md shadow-sm py-3"]) }}>
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <div class="d-flex gap-3">
      <button type="button" class="btn btn-light border side-nav-toggle">
        <i class="fa-solid fa-bars fs-6 m-0"></i>
      </button>

      <article class="d-flex gap-1 align-items-center">
        <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="Image not available" class="img-fluid ratio-box img-small-logo">

        <span class="d-none d-md-flex align-items-center">
          <x-svb-bread-crumb></x-svb-bread-crumb>
        </span>

        <span class="d-md-none text-body-secondary">
          Dashboard
        </span>
      </article>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-ellipsis-vertical"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link"  href="{{ route('browse') }}">Browse</a>
        </li>
      </ul>
    </div>
  </div>
</nav>