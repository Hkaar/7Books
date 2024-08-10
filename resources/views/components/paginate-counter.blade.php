<span>
  @if ($items->currentPage() === 1)
    Showing {{ $items->count() === 0 ? '0' : '1' }} to {{ count($items) }} rows from {{ $items->total() }} rows
  @else
    Showing {{ ($items->currentPage() - 1) * $items->perPage() + 1 }} to
    {{ min($items->currentPage() * $items->perPage(), $items->total()) }} rows from {{ $items->total() }} rows
  @endif
</span>