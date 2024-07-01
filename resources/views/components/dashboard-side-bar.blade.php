<aside id="side-nav" {{ $attributes->merge(["class" => "z-10 absolute over-left lg-z-0 inset-0 lg-over-none min-vh-100 lg-relative shadow-sm"]) }} data-collapsed="true">
  <div class="nav-items">
    <span class="d-flex align-items-center justify-content-between">
      <a href="{{ route('users.me') }}" class="d-flex gap-3 align-items-center">
        @if (auth()->user()->img)
          <img src="{{ Storage::url(auth()->user()->img) }}" alt="Image not available" class="img-fluid rounded-circle ratio-box">
        @else
          <img src="{{ URL::asset('assets/imgs/default-avatar.png') }}" alt="Image not available" class="img-fluid rounded-circle ratio-box">
        @endif
        <span class="nav-item-title overflow-hidden">{{ auth()->user()->username }}</span>
      </a>

      <button type="button" class="side-nav-toggle btn btn-danger nav-item-title d-lg-none">
        <i class="fa-solid fa-x"></i>
      </button>
    </span>

    <hr>

    @if ($selected == "user")
    <a href="#" class="nav-item active">
    @else
    <a href="{{ route('users.index') }}" class="nav-item">
    @endif
      <i class="fa-solid fa-user"></i>
      <span class="nav-item-title">Users</span>
    </a>

    @if ($selected == "order")
    <a href="#" class="nav-item active">
    @else
    <a href="{{ route('orders.index') }}" class="nav-item">
    @endif
      <i class="fa-solid fa-list"></i>
      <span class="nav-item-title">Orders</span>
    </a>

    @if ($selected == "book")
    <a href="#" class="nav-item active">
    @else
    <a href="{{ route('books.index') }}" class="nav-item">
    @endif
      <i class="fa-solid fa-book"></i>
      <span class="nav-item-title">Books</span>
    </a>

    @if ($selected == "author")
    <a href="#" class="nav-item active">
    @else
    <a href="{{ route('authors.index') }}" class="nav-item">
    @endif
      <i class="fa-solid fa-pen"></i>
      <span class="nav-item-title">Authors</span>
    </a>

    @if ($selected == "genre")
    <a href="#" class="nav-item active">
    @else
    <a href="{{ route('genres.index') }}" class="nav-item">
    @endif
      <i class="fa-solid fa-tag"></i>
      <span class="nav-item-title">Genres</span>
    </a>
      
    <a href="#" class="nav-item mt-auto">
      <i class="fa-solid fa-gear"></i>
      <span class="nav-item-title">Settings</span>
    </a>
  </div>
</aside>