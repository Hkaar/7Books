<nav id="side-nav" class="d-none d-lg-block" data-collapsed="false">
  <div class="nav-items">
    <a href="#" class="nav-item side-nav-open">
      <i class="fa-solid fa-arrow-right"></i>
    </a>

    <a href="#" class="nav-item side-nav-close">
      <i class="fa-solid fa-arrow-left"></i>
      <span class="nav-item-title">Close</span>
    </a>

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
</nav>