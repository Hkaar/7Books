<div class="d-flex justify-content-center h-100">
  <div class="row flex-fill d-flex align-items-center container">
    @foreach ($books as $book)
    <div class="col-12 col-md-4 mb-3">
      <div class="card svb-card svb-transition" data-item="{{ $book->id }}">
        <img src="{{ Storage::url($book->img) }}" class="card-img-top" alt="Image not available...">
  
        <div class="title svb-transition-fast">
          {{$book->name}}
        </div>
      </div>
    </div>
    @endforeach

    @if (count($books) <= 0)
      <div class="col-12 mb-auto mb-md-3">
        No authored books were found...
      </div>
    @endif
  
    <div class="col-12 mt-auto">
      <div class="row d-flex align-items-center">
        <div class="col-12 col-md-6">
          <ul class="pagination m-0" hx-target="#detailsBody" hx-swap="innerHTML">
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

        <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center">
          <button type="button" class="btn btn-primary"
            hx-get="{{ route('authors.show', $author->id) }}" 
            hx-target="#detailsBody" 
            hx-swap="innerHTML"
            >Back to profile
          </button>
        </div>
      </div>
    </div>
  </div>
</div>