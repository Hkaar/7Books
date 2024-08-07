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

              <a href="#" class="btn btn-primary w-fit">
                Get started
              </a>
            </div>
          </article>
        </div>

        <div class="col-12 col-lg-6 d-none d-md-flex align-items-center justify-content-center order-md-first order-lg-last">
          <img src="{{ Vite::asset('resources/images/hero.svg') }}" alt="Image not available" class="img-fluid w-75 ratio-box">
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 d-flex bg-tertiary text-light">
    <div class="container flex-fill">
      <div class="row h-100">
        <div class="col-12 col-lg-6 d-flex flex-column gap-3 justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h3 class="text-h3 fw-semibold">Who are we?</h3>

          <p class="pe-md-5">
            We're a group of passionate bookworms who wanted an an easier
            way for everyone on how to borrow a book from the local library
          </p>
        </div>
        <div class="col-12 col-lg-6 d-none d-md-flex align-items-center justify-content-center order-md-first order-lg-last">
          <img src="{{ Vite::asset('resources/images/reading.svg') }}" alt="Image not available" class="img-fluid w-75 ratio-box">
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
            Current trends in papers
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
          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>
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
          <div class="swiper-slide bg-primary rounded-circle ratio-box" style="height: 200px">Slide 1</div>
          <div class="swiper-slide bg-secondary rounded-circle ratio-box" style="height: 200px">Slide 2</div>
          <div class="swiper-slide bg-primary rounded-circle ratio-box" style="height: 200px">Slide 3</div>
          <div class="swiper-slide bg-secondary rounded-circle ratio-box" style="height: 200px">Slide 4</div>
          <div class="swiper-slide bg-primary rounded-circle ratio-box" style="height: 200px">Slide 5</div>
          <div class="swiper-slide bg-secondary rounded-circle ratio-box" style="height: 200px">Slide 6</div>
          <div class="swiper-slide bg-primary rounded-circle ratio-box" style="height: 200px">Slide 7</div>
          <div class="swiper-slide bg-secondary rounded-circle ratio-box" style="height: 200px">Slide 8</div>
          <div class="swiper-slide bg-primary rounded-circle ratio-box" style="height: 200px">Slide 9</div>
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
          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">

              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>
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
          <div class="swiper-slide bg-primary rounded-circle ratio-box" style="height: 200px">Slide 1</div>
          <div class="swiper-slide bg-secondary rounded-circle ratio-box" style="height: 200px">Slide 2</div>
          <div class="swiper-slide bg-primary rounded-circle ratio-box" style="height: 200px">Slide 3</div>
          <div class="swiper-slide bg-secondary rounded-circle ratio-box" style="height: 200px">Slide 4</div>
          <div class="swiper-slide bg-primary rounded-circle ratio-box" style="height: 200px">Slide 5</div>
          <div class="swiper-slide bg-secondary rounded-circle ratio-box" style="height: 200px">Slide 6</div>
          <div class="swiper-slide bg-primary rounded-circle ratio-box" style="height: 200px">Slide 7</div>
          <div class="swiper-slide bg-secondary rounded-circle ratio-box" style="height: 200px">Slide 8</div>
          <div class="swiper-slide bg-primary rounded-circle ratio-box" style="height: 200px">Slide 9</div>
        </div>
      </div>
    </div>
  </section>

  <section id="faq" class="d-flex py-5">
    <div class="container flex-fill">
      <div class="row h-100">
        <div class="col-12 col-lg-6 d-flex flex-column justify-content-center">
          <h3 class="text-h3 fw-semibold mb-3 w-75">
            Commonly asked questions
          </h3>

          <p class="w-75">
            Confused about something? See our most commonly
            asked questions for a quick answer
          </p>
        </div>

        <div class="col-12 col-lg-6">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <b>What is Seven Books?</b>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Seven Books is a digital physical book lending web service a.k.a a web service
                  that let's you lend a book from a physical library thorough the internet.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <b>How do i lend a book?</b>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  To lend a book, <b>(1) first</b> you must already have an account registered with us.
                  Then <b>(2) second</b> go to the browse page to search for a book or pick a book you already
                  have in mind. Finally <b>(3) third</b> after clicking the book you want to lend, just simply
                  press lend and pick a library of your choice, and then your all done.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <b>How does it work?</b>
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Seven Books works by being a bridge between you and the library as the handler
                  for all the communication and handling of tracking lendings and other things
                  that are combersome and complicated between the parties.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <b>How do i pickup my order?</b>
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  To pickup an order you've made before hand. Just go to the library of question and
                  hand them the code that was provided with the order.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <x-svb-footer></x-svb-footer>
@endsection
