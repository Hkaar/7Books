<div class="d-flex flex-column h-100 w-100 justify-content-center">
  <div class="input-group mb-3">
    <span class="input-group-text" id="amountLabel">Amount</span>
    <input type="number" class="form-control" id="selectAmount" aria-describedby="amountLabel">
  </div>

  <div id="booksDisplay" class="row container" hx-on::after-request="updateItemCards()">
    @foreach ($books as $book)
    <div class="col-12 col-md-4 mb-3">
      <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink" data-item="{{ $book->id }}">
        <img src="{{ Storage::url($book->img) }}" class="card-img-top" alt="Image not available">
  
        <div class="title svb-transition-fast">
          {{$book->name}}
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
      <div class="row d-flex align-items-center">
        <div class="col-12 col-md-6">
          <ul class="pagination" hx-target="#booksDisplay" hx-swap="innerHTML" style="margin: 0">
            @if ($books->onFirstPage())
              <li class="page-item disabled">
                <span class="page-link">Previous</span>
              </li>
            @else
              <li class="page-item">
                <a class="page-link" href="{{ $books->previousPageUrl() }}" hx-get="{{ $books->previousPageUrl() }}">Previous</a>
              </li>
            @endif
        
            @for ($i = 1; $i <= $books->lastPage(); $i++)
              <li class="page-item {{ ($books->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $books->url($i) }}" hx-get="{{ $books->url($i) }}">{{ $i }}</a>
              </li>
            @endfor
        
            @if ($books->hasMorePages())
              <li class="page-item">
                <a class="page-link" href="{{ $books->nextPageUrl() }}" hx-get="{{ $books->nextPageUrl() }}">Next</a>
              </li>
            @else
              <li class="page-item disabled">
                <span class="page-link">Next</span>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
