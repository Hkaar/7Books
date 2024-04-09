<div class="row">
  @foreach ($books as $book)
  <div class="col-12 col-md-4 mb-3">
    <div class="card item-card" data-item="{{ $book->id }}">
      <img src="{{ Storage::url($book->img) }}" class="card-img-top" alt="Image not available">

      <div class="title">
        {{$book->name}}
      </div>
    </div>
  </div>
  @endforeach
</div>
