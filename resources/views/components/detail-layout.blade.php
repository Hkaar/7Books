<div class="d-flex align-items-center gap-3 mb-3">
  <a href="{{ url()->previous() }}" class="btn btn-primary">
    <i class="fa-regular fa-arrow-left"></i>
    Back
  </a>
  <h1 class="text-h5 text-md-h3 fw-semibold">{{ ucfirst($title) }} Details</h1>
</div>

<div class="d-flex gap-3 align-items-center justify-content-between mb-3">
  <div class="align-items-center gap-2 d-none d-lg-flex">
    <div class="d-flex align-items-center gap-2 shadow-sm rounded">
      <span class="fw-medium bg-tertiary p-3 text-white">
        Created
      </span>

      <span class="p-3">
        {{ $model->created_at }}
      </span>
    </div>

    <div class="d-flex align-items-center gap-2 shadow-sm rounded">
      <span class="fw-medium bg-tertiary text-white p-3">
        Updated
      </span>

      <span class="p-3">
        {{ $model->updated_at }}
      </span>
    </div>
  </div>

  <div class="d-flex align-items-center gap-2">
    <a href="{{ route($editRoute, $model->id) }}" class="btn btn-warning">
      <span class="d-flex gap-1 align-items-center">
        <i class="fa-regular fa-pencil"></i>
        Edit <span class="d-none d-md-block d-lg-none d-xl-block">this {{ strtolower($title) }}</span>
      </span>
    </a>

    <a href="{{ route($createRoute) }}" class="btn btn-success">
      <span class="d-flex gap-1 align-items-center">
        <i class="fa-regular fa-plus"></i>
        Add <span class="d-none d-md-block d-lg-none d-xl-block">a new {{ strtolower($title) }}</span>
      </span>
    </a>
  </div>
</div>

{{ $slot }}