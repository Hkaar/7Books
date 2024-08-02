<div {{ $attributes->merge(["class" => "overflow-auto py-3"]) }}>
  <ul class="pagination" style="margin: 0">
  @if ($links->onFirstPage())
    <li class="page-item disabled">
      <span class="page-link d-flex align-items-center gap-2">
        <i class="fa-solid fa-chevron-left"></i>
        Previous
      </span>
    </li>
  @else
    <li class="page-item">
      @if ($useHtmx)
        <a class="page-link d-flex align-items-center gap-2" href="" hx-get="{{ $links->previousPageUrl() }}">
          <i class="fa-solid fa-chevron-left"></i>
          Previous
        </a>
      @else
        <a class="page-link d-flex align-items-center gap-2" href="{{ $links->previousPageUrl() }}">
          <i class="fa-solid fa-chevron-left"></i>
          Previous
        </a>
      @endif
    </li>
  @endif

  @for ($i = 1; $i <= $links->lastPage(); $i++)
    @if (($i >= $links->currentPage()-1 && $i <= $links->currentPage()+2) || $i == 1 || $i == $links->lastPage())
      @if ($useHtmx)
        <li class="page-item {{ ($links->currentPage() == $i) ? 'active' : '' }}">
          <a class="page-link" href="" hx-get="{{ $links->url($i) }}">
            {{ $i }}
          </a>
        </li>
      @else
        <li class="page-item {{ ($links->currentPage() == $i) ? 'active' : '' }}">
          <a class="page-link" href="{{ $links->url($i) }}">
            {{ $i }}
          </a>
        </li>
      @endif
    @endif
  @endfor

  @if ($links->hasMorePages())
    <li class="page-item">
      @if ($useHtmx)
        <a class="page-link d-flex align-items-center gap-2" href="" hx-get="{{ $links->nextPageUrl() }}">
          Next
          <i class="fa-solid fa-chevron-right"></i>
        </a>
      @else
        <a class="page-link d-flex align-items-center gap-2" href="{{ $links->nextPageUrl() }}">
          Next
          <i class="fa-solid fa-chevron-right"></i>
        </a>
      @endif

    </li>
  @else
    <li class="page-item disabled">
      <span class="page-link d-flex align-items-center gap-2">
        Next
        <i class="fa-solid fa-chevron-right"></i>
      </span>
    </li>
  @endif
</ul>
</div>
