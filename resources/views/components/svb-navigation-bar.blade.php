<nav {{ $attributes->merge(['class' => 'navbar navbar-expand-lg shadow-sm py-md-2 py-3']) }}>
  <div class="container-fluid">
    @if ($logo)
      <span class="d-flex align-items-center me-auto gap-2">
        <img src="{{ Vite::asset('resources/images/logo.svg') }}" class="img-fluid logo-lg">
        @auth
          <a href="{{ route('home') }}" class="text-h6 text-none fw-semibold text-inherit">
            SEVEN BOOKS
          </a>
        @endauth

        @guest
          <a href="{{ route('/') }}" class="text-h6 text-none fw-semibold text-inherit">
            SEVEN BOOKS
          </a>
        @endguest
      </span>
    @else
      <a href="{{ url()->previous() }}" class="btn text-h6 text-none fw-medium text-inherit">
        <i class="fa-solid fa-chevron-left"></i>
      </a>
    @endif

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars"></i>
    </button>

    <div class="navbar-collapse collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-lg-0 mb-2 ms-auto">
        @if ($menus)
          @auth
            @if ($active === 'home')
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

          @if ($active === 'browse')
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('browse') }}">Browse</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('browse') }}">Browse</a>
            </li>
          @endif

          @if ($active === 'blog')
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('browse') }}">Our blog</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('browse') }}">Our blog</a>
            </li>
          @endif

          @auth
            @if (auth()->user()->isPrivileged())
              <li class="nav-item">
                <a class="nav-link" href="{{ route('orders.index') }}">Dashboard</a>
              </li>
            @endif
          @endauth
        @endif

        @if ($avatar)
          @auth
            <li class="nav-item dropdown dropstart mt-lg-0 ms-2 mt-2">
              <a class="d-flex align-items-center text-decoration-none gap-1 text-inherit" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                @if (auth()->user()->img)
                  <img src="{{ Storage::url(auth()->user()->img) }}" alt="Image not available"
                    class="img-fluid rounded-circle logo-md">
                @else
                  <img src="{{ URL::asset('assets/imgs/default-avatar.png') }}" alt="Image not available"
                    class="img-fluid rounded-circle logo-md">
                @endif

                <i class="fa-solid fa-ellipsis-vertical d-none d-lg-block"></i>

                <span class="d-lg-none d-flex align-items-center gap-1">
                  Show actions <i class="fa-solid fa-chevron-down"></i>
                </span>
              </a>
              <ul class="dropdown-menu mt-lg-0 mt-2">
                <li><a class="dropdown-item" href="{{ route('users.me') }}">View account</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Logout</a></li>
              </ul>
            </li>
          @endauth
        @endif

        @if ($login)
          @guest
            <div class="d-flex-gap-1 align-items-center ms-lg-2">
              <a href="{{ route('login') }}" class="btn btn-outline-secondary">Login</a>
              <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
          @endguest
        @endif
      </ul>
    </div>
  </div>
</nav>
