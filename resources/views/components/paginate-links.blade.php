<ul class="pagination" style="margin: 0">
  @if ($links->onFirstPage())
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
  @else
    <li class="page-item">
      <a class="page-link" href="{{ $links->previousPageUrl() }}">Previous</a>
    </li>
  @endif
   
  @for ($i = 1; $i <= $links->lastPage(); $i++)
    <li class="page-item {{ ($links->currentPage() == $i) ? 'active' : '' }}">
      <a class="page-link" href="{{ $links->url($i) }}">{{ $i }}</a>
    </li>
  @endfor

  @if ($links->hasMorePages())
    <li class="page-item">
      <a class="page-link" href="{{ $links->nextPageUrl() }}">Next</a>
    </li>
  @else
    <li class="page-item disabled">
      <span class="page-link">Next</span>
    </li>
  @endif
</ul>
