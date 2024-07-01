<div class="row h-100">
  <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
    <div id="preview" class="cover-small">
      <img src="{{ Storage::url($book->img) }}" alt="Image not available">
    </div>
  </div>

  <div class="col-12 col-md-6">
    <div class="d-flex flex-column p-3">
      <div class="mb-3">
        <h5>{{$book->name}}</h5>
        <span>{{ $book->isbn }}</span>
      </div>

      <div class="accordion accordion-flush" id="infoAccordion">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#genres" aria-expanded="true" aria-controls="genres">
              Genres
            </button>
          </h2>
          <div id="genres" class="accordion-collapse collapse" data-bs-parent="#infoAccordion">
            <div class="accordion-body">
              <div class="d-flex gap-1 flex-column">
                @foreach ($genres as $genre)
                  <span>{{ $genre->name }}</span>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#authors" aria-expanded="true" aria-controls="authors">
              Authors
            </button>
          </h2>
          <div id="authors" class="accordion-collapse collapse" data-bs-parent="#infoAccordion">
            <div class="accordion-body">     
              <div class="d-flex gap-1 flex-column">
                @foreach ($authors as $author)
                  <span>{{ $author->name }}</span>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#addinfo" aria-expanded="true" aria-controls="addinfo">
              Additonal Info
            </button>
          </h2>
          <div id="addinfo" class="accordion-collapse collapse" data-bs-parent="#infoAccordion">
            <div class="accordion-body">
              <div class="row">
                <div class="col-12 col-md-6">
                  <article class="d-flex flex-column gap-1 flex-fill mb-3">
                    <b>Price :</b>
                    ${{ $book->price }}
                  </article>
                </div>
        
                <div class="col-12 col-md-6">
                  <article class="d-flex flex-column gap-1 flex-fill mb-3">
                    <b>Rate :</b>
                    ${{ $book->rate }}/hour
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#extra" aria-expanded="true" aria-controls="extra">
              Description
            </button>
          </h2>
          <div id="extra" class="accordion-collapse collapse" data-bs-parent="#infoAccordion">
            <div class="accordion-body">
              <p>
                {{ $book->desc }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>