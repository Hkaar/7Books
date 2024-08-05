<aside id="side-nav" {{ $attributes->merge(["class" => "z-10 absolute over-left lg-z-0 inset-0 lg-over-none min-vh-100 lg-relative shadow-sm d-flex flex-column"]) }} data-collapsed="true">
  <div class="d-flex flex-column gap-1 flex-fill">
    <span class="d-flex align-items-center gap-2 justify-content-between">
      <div class="dropdown">
        <button class="btn text-white p-2 p-md-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span href="{{ route('users.me') }}" class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2 justify-content-start">
              @if (auth()->user()->img)
                <img src="{{ Storage::url(auth()->user()->img) }}" alt="Image not available" class="img-fluid rounded-circle ratio-box">
              @else
                <img src="{{ URL::asset('assets/imgs/default-avatar.png') }}" alt="Image not available" class="img-fluid rounded-circle ratio-box">
              @endif

              <span class="nav-item-title overflow-hidden">{{ auth()->user()->username }}</span>
            </div>

            <i class="fa-solid fa-chevron-down nav-item-title"></i>
          </span>
        </button>

        <ul class="dropdown-menu w-100">
          <li>
            <a class="dropdown-item" href="{{ route('users.me') }}">View Profile</a>
          </li>

          <li><hr class="dropdown-divider"></li>

          <li>
            <a class="dropdown-item text-danger" href="{{ route('logout') }}">Logout</a>
          </li>
        </ul>
      </div>

      <button type="button" class="side-nav-toggle btn btn-danger rounded nav-item-title d-lg-none">
        <i class="fa-solid fa-x"></i>
      </button>
    </span>

    <hr>

    <div class="d-flex flex-column mb-3">
      <span class="fw-medium nav-item-title mb-2">User Management</span>

      @if (auth()->user()?->isPrivileged())
        <a href="{{ $selected === 'user' ? '#' : route('users.index') }}" class="nav-item p-3 rounded gap-2 {{ $selected === 'user' ? 'active' : '' }}">
          <i class="fa-solid fa-user"></i>
          <span class="nav-item-title">Users</span>
        </a>
      @endif

      <a href="{{ $selected === 'order' ? '#' : route('orders.index') }}" class="nav-item p-3 rounded gap-2 {{ $selected === 'order' ? 'active' : '' }}">
        <i class="fa-solid fa-list"></i>
        <span class="nav-item-title">Orders</span>
      </a>

      <a href="{{ $selected === 'articles' ? '#' : route('regions.index') }}" class="nav-item p-3 rounded gap-2 {{ $selected === 'region' ? 'active' : '' }}">
        <i class="fa-regular fa-file-lines"></i>
        <span class="nav-item-title">Articles</span>
      </a>
    </div>

    <div class="d-flex flex-column">
      <span class="fw-medium nav-item-title mb-2">Books Management</span>

      <a href="{{ $selected === 'book' ? '#' : route('books.index') }}" class="nav-item p-3 rounded gap-2 {{ $selected === 'book' ? 'active' : '' }}">
        <i class="fa-solid fa-book"></i>
        <span class="nav-item-title">Books</span>
      </a>
  
      <a href="{{ $selected === 'library' ? '#' : route('libraries.index') }}" class="nav-item p-3 rounded gap-2 {{ $selected === 'library' ? 'active' : '' }}">
        <i class="fa-solid fa-book-open"></i>
        <span class="nav-item-title">Libraries</span>
      </a>
  
      <a href="{{ $selected === 'author' ? '#' : route('authors.index') }}" class="nav-item p-3 rounded gap-2 {{ $selected === 'author' ? 'active' : '' }}">
        <i class="fa-solid fa-pen"></i>
        <span class="nav-item-title">Authors</span>
      </a>
  
      <a href="{{ $selected === 'genre' ? '#' : route('genres.index') }}" class="nav-item p-3 rounded gap-2 {{ $selected === 'genre' ? 'active' : '' }}">
        <i class="fa-solid fa-tag"></i>
        <span class="nav-item-title">Genres</span>
      </a>

      <a href="{{ $selected === 'region' ? '#' : route('regions.index') }}" class="nav-item p-3 rounded gap-2 {{ $selected === 'region' ? 'active' : '' }}">
        <i class="fa-solid fa-earth-americas"></i>
        <span class="nav-item-title">Regions</span>
      </a>
    </div>

    <a href="#" class="nav-item p-3 rounded gap-2 mt-auto">
      <i class="fa-solid fa-gear"></i>
      <span class="nav-item-title">Settings</span>
    </a>
  </div>
</aside>