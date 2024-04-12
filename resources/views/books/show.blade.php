<div class="row">
  <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
    <div id="preview" class="cover-small">
      <img src="{{ Storage::url($book->img) }}" alt="Image not available">
    </div>
  </div>

  <div class="col-12 col-md-6">
    <div class="d-flex flex-column p-3">
      <article class="info mb-3">
        <b>Name</b>
        {{ $book->name }}
      </article>

      <article class="info mb-3">
        <b>ISBN</b>
        {{ $book->ISBN }}
      </article>

      <article class="info mb-3">
        <b>Price</b>
        ${{ $book->price }}
      </article>

      <article class="info mb-3">
        <b>Rate</b>
        ${{ $book->rate }}/hour
      </article>

      <article class="info mb-3">
        <b>Stock</b>
        {{ $book->stock }}
      </article>

      <article class="info">
        <b>Description</b>
        {{ $book->desc }}
      </article>
    </div>
  </div>
</div>