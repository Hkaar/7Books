@if (count($items) <= 0)
  <span class="d-flex align-items-center bg-body-tertiary gap-2 rounded p-3">
    <i class="fa-regular fa-magnifying-glass"></i>
    No results were found
  </span>
@else
  @foreach ($items as $i => $item)
    @if ($items->hasMorePages() && $i+1 === $items->perPage())
      <button type="button" data-item-id="{{ $item->id }}"
        data-item-title="{{ strip_tags($item[$display]) }}"
        class="btn d-flex align-items-center hover-grow active-shrink svb-transition p-3 shadow-sm">
        {{ strip_tags($item[$display]) }}
      </button>

      <div hx-get="{{ $items->nextPageUrl() }}" hx-trigger="revealed" hx-swap="outerHTML">
        <img src="{{ Vite::asset('resources/images/infinite-spinner.svg') }}" alt="Loading..." class="logo-lg">
      </div>
    @else
      <button type="button" data-item-id="{{ $item->id }}"
        data-item-title="{{ strip_tags($item[$display]) }}"
        class="btn d-flex align-items-center hover-grow active-shrink svb-transition p-3 shadow-sm">
        {{ strip_tags($item[$display]) }}
      </button>
    @endif
  @endforeach

  @if (!$items->hasMorePages())
    <span class="d-flex align-items-center p-3 shadow-sm flex-fill fw-semibold">
      No more items to show...
    </span>
  @endif
@endif
