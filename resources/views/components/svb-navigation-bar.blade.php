<nav class="navbar navbar-expand-lg shadow-sm sticky-top bg-body-tertiary">
  <div class="container-fluid">
    <span class="d-flex align-items-center gap-2 me-auto">
      <img src="{{ URL::asset('assets/imgs/logo.png') }}" class="img-fluid img-small-logo">
      <h6 class="m-0">Seven Books</h6>
    </span>
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @if ($menus)
          @auth
            @if ($active === "home")
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
              </li> 
            @endif
          @endauth

          @guest
            <li class="nav-item">
              <a class="nav-link disabled" aria-current="page" href="#">Home</a>
            </li>
          @endguest
          
          @if ($active === "browse")
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('browse') }}">Browse</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('browse') }}">Browse</a>
            </li>
          @endif
          
        @endif

        @auth
          @if ($search)
            <li class="nav-item">
              <form class="d-flex gap-1" role="search">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">

                <button class="btn btn-outline-primary" type="submit">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </form>
            </li>
          @endif

          <li class="nav-item dropdown dropstart ms-2 mt-2 mt-lg-0">
            <a class="d-flex gap-1 align-items-center text-decoration-none text-inherit" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ Storage::url(auth()->user()->img) }}" alt="Image not available" class="img-fluid rounded-circle img-small-logo">

              <i class="fa-solid fa-ellipsis-vertical d-none d-lg-block"></i>
              
              <span class="d-lg-none d-flex gap-1 align-items-center">
                Show actions <i class="fa-solid fa-chevron-down"></i>
              </span>
            </a>
            <ul class="dropdown-menu mt-2 mt-lg-0">
              <li><a class="dropdown-item" href="{{ route('users.me') }}">View account</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Logout</a></li>
            </ul>
          </li>
        @endauth

        @guest
          <div class="d-flex-gap-1 align-items-center ms-2">
            <a href="{{ route('login') }}" class="btn btn-outline-secondary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
          </div>
        @endguest
      </ul>
    </div>
  </div>
</nav>