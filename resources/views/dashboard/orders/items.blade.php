<div class="d-flex justify-content-center h-100">
  <div class="row flex-fill d-flex align-items-center container">
    @foreach ($items as $item)
    <div class="col-12 col-md-4 mb-3">
      <div class="card svb-card svb-transition" data-item="{{ $item->book->id }}">
        <img src="{{ Storage::url($item->book->img) }}" class="card-img-top" alt="Image not available...">

        <div class="title svb-transition-fast">
          {{ $item->book->name }}
        </div>
      </div>
    </div>
    @endforeach

    @if (count($items) <= 0)
      <div class="col-12 mb-auto mb-md-3">
        No books were found...
      </div>
    @endif

    <div class="col-12 mt-auto">
      <div class="row d-flex align-items-center">
        <div class="col-12 col-md-6 mb-3 mb-lg-1">
          <ul class="pagination" hx-target="#detailsBody" hx-swap="innerHTML" style="margin: 0">
            @if ($items->onFirstPage())
              <li class="page-item disabled">
                <span class="page-link">Previous</span>
              </li>
            @else
              <li class="page-item">
                <a class="page-link" href="{{ $items->previousPageUrl() }}" hx-get="{{ $items->previousPageUrl() }}">Previous</a>
              </li>
            @endif

            @for ($i = 1; $i <= $items->lastPage(); $i++)
              <li class="page-item {{ ($items->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $items->url($i) }}" hx-get="{{ $items->url($i) }}">{{ $i }}</a>
              </li>
            @endfor

            @if ($items->hasMorePages())
              <li class="page-item">
                <a class="page-link" href="{{ $items->nextPageUrl() }}" hx-get="{{ $items->nextPageUrl() }}">Next</a>
              </li>
            @else
              <li class="page-item disabled">
                <span class="page-link">Next</span>
              </li>
            @endif
          </ul>
        </div>

        <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center">
          <button type="button" class="btn btn-primary"
            hx-get="{{ route('orders.show', $order->id) }}"
            hx-target="#detailsBody"
            hx-swap="innerHTML"
            >Back to profile
          </button>
        </div>
      </div>
    </div>
  </div>
</div>