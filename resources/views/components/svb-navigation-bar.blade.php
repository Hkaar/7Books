<nav {{ $attributes->merge(["class" => "navbar navbar-expand-lg shadow-sm bg-body-tertiary"]) }}>
  <div class="container-fluid">
    @if ($logo)
      <span class="d-flex align-items-center gap-1 me-auto">
        <img src="{{ URL::asset('assets/imgs/logo.png') }}" class="img-fluid img-small-logo">
        @auth
          <a href="{{ route('home') }}" class="text-h6 text-none text-inherit fw-medium">
            Seven Books
          </a>
        @endauth

        @guest
          <a href="{{ route('/') }}" class="text-h6 text-none text-inherit fw-medium">
            Seven Books
          </a>
        @endguest
      </span>

    @else
      <a href="{{ url()->previous() }}" class="btn text-h6 text-none text-inherit fw-medium">
        <i class="fa-solid fa-chevron-left"></i>
      </a>
    @endif
  
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

          @if ($priviledged)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('orders.index') }}">Dashboard</a>
            </li>
          @endif
        @endif

        @if ($search)
          <li class="nav-item ms-2">
            <form class="d-flex gap-1" role="search">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search">

              <button class="btn btn-outline-primary" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </form>
          </li>
        @endif

        @if ($avatar)
          @auth
            <li class="nav-item dropdown dropstart ms-2 mt-2 mt-lg-0">
              <a class="d-flex gap-1 align-items-center text-decoration-none text-inherit" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if (auth()->user()->img)
                  <img src="{{ Storage::url(auth()->user()->img) }}" alt="Image not available" class="img-fluid rounded-circle img-small-logo">
                @else
                <img src="{{ URL::asset('assets/imgs/default-avatar.png') }}" alt="Image not available" class="img-fluid rounded-circle img-small-logo">
                @endif

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
        @endif

        @if ($login)
          @guest
            <div class="d-flex-gap-1 align-items-center ms-2">
              <a href="{{ route('login') }}" class="btn btn-outline-secondary">Login</a>
              <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
          @endguest
        @endif
      </ul>
    </div>
  </div>
</nav>