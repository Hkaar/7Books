@extends('layouts.app')

@section('title', 'Seven Books')

@section('main')
<x-svb-navigation-bar :menus=true active="" :logo=true :login=true :avatar=true></x-svb-navigation-bar>

<section id="hero" class="min-vh-100 d-flex py-5">
  <div class="container flex-fill">
    <div class="row h-100">
      <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-start">
        <article class="d-flex flex-column gap-4 align-items-center text-center align-items-lg-start text-lg-start">
          <h1 class="text-lg-h1 text-md-h2 text-h3 fw-bold">Stack up your Knowledge</h1>

          <div class="d-flex flex-column gap-2 justify-content-center align-items-center align-items-lg-start">
            <span class="d-flex flex-column gap-1">
              <h5 class="text-h5 fw-medium">Want to read a book from a library near you?</h5>

              <p>
                Get started by clicking the button below
              </p>
            </span>

            <a href="#" class="btn btn-primary">
              Get started
            </a>
          </div>
        </article>
      </div>

      <div
        class="col-12 col-lg-6 d-none d-md-flex align-items-center justify-content-center order-md-first order-lg-last">
        <img src="{{ Vite::asset('resources/images/hero.svg') }}" alt="Image not available"
          class="img-fluid w-75 ratio-box">
      </div>
    </div>
  </div>
</section>

<section class="py-5 d-flex bg-tertiary text-light">
  <div class="container flex-fill">
    <div class="row h-100">
      <div
        class="col-12 col-lg-6 d-flex flex-column gap-3 justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
        <h3 class="text-h3 fw-semibold">Who are we?</h3>

        <p class="pe-md-5">
          We're a group of passionate bookworms who wanted an an easier
          way for everyone on how to borrow a book from the local library
        </p>
      </div>
      <div
        class="col-12 col-lg-6 d-none d-md-flex align-items-center justify-content-center order-md-first order-lg-last">
        <img src="{{ Vite::asset('resources/images/reading.svg') }}" alt="Image not available"
          class="img-fluid w-75 ratio-box">
      </div>
    </div>
  </div>
</section>

<section id="trending" class="d-flex align-items-center justify-content-center py-5">
  <div class="container">
    <div class="d-flex flex-column gap-1 mb-3">
      <h3 class="text-h4 text-md-h3 fw-semibold">Trending Reads</h3>
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
        <span class="text-tertiary">
          Rising up the index of ranks
        </span>
        <div class="d-md-flex align-items-center gap-1 d-none">
          <button type="button" class="btn btn-light" id="trendingPrev">
            <i class="fa-solid fa-chevron-left"></i>
            Previous
          </button>
          <button type="button" class="btn btn-light" id="trendingNext">
            Next
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
    </div>

    <div id="trendingBookSlider" class="swiper">
      <div class="swiper-wrapper">
        @foreach($trendingBooks as $book)
        <div class="swiper-slide">
          <a class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink"
            href="{{ route('books.show', $book->id) }}">
            <img src="{{ $book->getPhotoAttribute() }}" class="card-img-top" alt="{{ $book->name }}">
            <div class="title svb-transition-fast">
              {{ $book->name }}
            </div>
          </a>
        </div>
        @endforeach
      </div>
      <div class="swiper-pagination" id="trendingBookSliderPagination"></div>
    </div>
  </div>
</section>

<section id="authors" class="d-flex align-items-center justify-content-center py-5">
  <div class="container">
    <div class="d-flex flex-column gap-1 mb-3">
      <h3 class="text-h4 text-md-h3 fw-semibold">Popular Authors</h3>
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
        <span class="text-tertiary">
          Reading is more than the content it's the people
        </span>
        <div class="d-md-flex align-items-center gap-1 d-none">
          <button type="button" class="btn btn-light" id="authorPrev">
            <i class="fa-solid fa-chevron-left"></i>
            Previous
          </button>
          <button type="button" class="btn btn-light" id="authorNext">
            Next
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
    </div>

    <div id="authorProfileSlider" class="swiper">
      <div class="swiper-wrapper">
        @foreach($popularAuthors as $author)
        <div class="swiper-slide">
          <div class="svb-profile svb-transition-fast hover-grow hover-darkened active-shrink"
            style="background-image: url({{ $author->getPhotoAttribute() }})">
            <span class="overlay svb-transition-fast">
              {{ $author->name }}
            </span>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<section id="new" class="d-flex align-items-center justify-content-center py-5">
  <div class="container">
    <div class="d-flex flex-column gap-1 mb-3">
      <h3 class="text-h4 text-md-h3 fw-semibold">New Releases</h3>
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
        <span class="text-tertiary">
          Newly released in libraries
        </span>
        <div class="d-md-flex align-items-center gap-1 d-none">
          <button type="button" class="btn btn-light" id="newestPrev">
            <i class="fa-solid fa-chevron-left"></i>
            Previous
          </button>
          <button type="button" class="btn btn-light" id="newestNext">
            Next
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
    </div>

    <div id="newestBookSlider" class="swiper">
      <div class="swiper-wrapper">
        @foreach($newReleases as $book)
        <div class="swiper-slide">
          <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
            <img src="{{ $book->getFirstMediaUrl('cover_image') ?: Vite::asset('resources/images/hero.svg') }}"
              class="card-img-top" alt="{{ $book->name }}">
            <div class="title svb-transition-fast">
              {{ $book->name }}
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="swiper-pagination" id="newestBookSliderPagination"></div>
    </div>
  </div>
</section>

<section id="genres" class="d-flex align-items-center justify-content-center py-5">
  <div class="container">
    <div class="d-flex flex-column gap-1 mb-3">
      <h3 class="text-h4 text-md-h3 fw-semibold">Popular Genres</h3>
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
        <span class="text-tertiary">
          More of a kind
        </span>
        <div class="d-md-flex align-items-center gap-1 d-none">
          <button type="button" class="btn btn-light" id="genrePrev">
            <i class="fa-solid fa-chevron-left"></i>
            Previous
          </button>
          <button type="button" class="btn btn-light" id="genreNext">
            Next
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
    </div>

    <div id="genreSlider" class="swiper">
      <div class="swiper-wrapper">
        @foreach($popularGenres as $genre)
        <div
          class="swiper-slide bg-primary rounded-circle ratio-box svb-profile d-flex flex-column justify-content-center text-h5 fw-semibold px-3 text-white shadow">
          {{ $genre->name }}
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<section id="faq" class="d-flex py-5">
  <div class="container flex-fill">
    <div class="row h-100">
      <div
        class="col-12 col-lg-6 d-flex flex-column align-items-center align-items-lg-start text-center text-lg-start justify-content-center mb-3 mb-lg-0">
        <h3 class="text-h3 fw-semibold mb-3 w-75">
          Commonly asked questions
        </h3>
        <p class="w-75 d-none d-md-block">
          Confused about something? See our most commonly
          asked questions for a quick answer
        </p>
      </div>

      <div class="col-12 col-lg-6">
        <div class="accordion" id="accordionExample">
          @foreach($faqs as $index => $faq)
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}"
                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $faq->id }}">
                <b>{{ $faq->question }}</b>
              </button>
            </h2>
            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                {{ $faq->answer }}
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<x-svb-footer></x-svb-footer>
@endsection