<div class="d-flex h-100 w-100 justify-content-center">
  <div class="row container">
    @foreach ($books as $book)
    <div class="col-12 col-md-4 mb-3">
      <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink" item-card data-item="{{ $book->id }}">
        <img src="{{ Storage::url($book->img) }}" class="card-img-top" alt="Image not available">

        <div class="title svb-transition-fast">
          {{ $book->name }}
        </div>
      </div>
    </div>
    @endforeach

    @if (count($books) <= 0)
      <div class="col-12 mb-auto mb-md-3">
        No books were found...
      </div>
    @endif

    <div class="col-12 mt-auto">
      <x-paginate-links :links="$books" :useHtmx=true hx-target="#selectItemsBody" hx-swap="innerHTML"></x-paginate-links>
    </div>
  </div>
</div>
