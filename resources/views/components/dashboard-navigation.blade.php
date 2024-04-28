<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <article class="brand">
      <h5>Dashboard</h5>
    </article>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-3 mb-lg-0 mt-2 mt-lg-0">
        @if ($selected == "users")
          <li class="nav-item d-lg-none">
            <a class="nav-link active" aria-current="page" href="{{ route('users.index') }}">Users</a>
          </li>
        @else
          <li class="nav-item d-lg-none">
            <a class="nav-link" aria-current="page" href="{{ route('users.index') }}">Users</a>
          </li>
        @endif

        @if ($selected == "orders")
          <li class="nav-item d-lg-none">
            <a class="nav-link active" aria-current="page" href="{{ route('orders.index') }}">Orders</a>
          </li>
        @else
          <li class="nav-item d-lg-none">
            <a class="nav-link" aria-current="page" href="{{ route('orders.index') }}">Orders</a>
          </li>
        @endif

        @if ($selected == "books")
          <li class="nav-item d-lg-none">
            <a class="nav-link active" aria-current="page" href="{{ route('books.index') }}">Books</a>
          </li>
        @else
          <li class="nav-item d-lg-none">
            <a class="nav-link" aria-current="page" href="{{ route('books.index') }}">Books</a>
          </li>
        @endif
        
        @if ($selected == "authors")
          <li class="nav-item d-lg-none">
            <a class="nav-link active" aria-current="page" href="{{ route('authors.index') }}">Authors</a>
          </li>
        @else
          <li class="nav-item d-lg-none">
            <a class="nav-link" aria-current="page" href="{{ route('authors.index') }}">Authors</a>
          </li>
        @endif

        @if ($selected == "genres")
          <li class="nav-item d-lg-none">
            <a class="nav-link active" aria-current="page" href="{{ route('genres.index') }}">Genres</a>
          </li>
        @else
          <li class="nav-item d-lg-none">
            <a class="nav-link" aria-current="page" href="{{ route('genres.index') }}">Genres</a>
          </li>
        @endif

        <li class="nav-item mt-3 mt-lg-0">
          <a class="nav-link btn btn-danger px-3" aria-current="page" href="{{ route('logout') }}">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>