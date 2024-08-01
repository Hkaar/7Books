@props(['paths' => explode('/', request()->path())])

<nav aria-label="breadcrumb">
  <ol class="breadcrumb m-0">
    @foreach ($paths as $i => $path)
      @if ($path === "manage")
        <li class="breadcrumb-item text-body-secondary">Dashboard</li>
      @else
        <li class="breadcrumb-item {{ $i === count($paths)-1 ? '' : 'text-body-secondary' }}" {{ $i === count($paths)-1 ? 'aria-current="page"' : '' }}>{{ ucfirst($path) }}</li>
      @endif
    @endforeach
  </ol>
</nav>