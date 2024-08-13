@extends('layouts.app')

@section('title', 'Blog')

@section('main')
  <x-svb-navigation-bar :menus=true active="blog" :logo=true :login=true :avatar=true></x-svb-navigation-bar>

  <div class="min-vh-100">
    <div class="container my-4">
      <div class="d-flex justify-content-center align-items-center mb-4">
        <form action="" method="get" class="d-flex w-75 gap-3">
          <div class="input-group w-100">
            <input type="text" class="form-control" id="search" name="search"
              placeholder="Try to search for something here...">

            <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
              <i class="fa-regular fa-magnifying-glass"></i>
              <span class="d-none d-md-block">
                Search
              </span>
            </button>
          </div>
        </form>
      </div>

      <div class="row">
        <div class="col-12 col-md-6 col-lg-4 p-4">
          <a href="{{ route('articles.demo') }}" class="card text-none svb-transition-fast hover-grow active-shrink h-100">
            <img src="{{ Vite::asset('resources/images/examples/flag.jpg') }}" class="card-img-top ratio-box object-cover"
              alt="...">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3 gap-3">
                <img src="{{ Vite::asset('resources/images/default-avatar.png') }}"
                  class="img-fluid logo-md rounded-circle">

                <div class="d-flex flex-column gap-1">
                  <span class="fw-medium">Shava Jaya</span>
                  <span>13th of August 2024</span>
                </div>
              </div>

              <h5 class="card-title text-h5 fw-semibold mb-3">
                Kemerdekaan Sebangsa Putih Merah
              </h5>

              <p class="card-text mb-3">
                Menjelajahi semangat persatuan dan kebanggaan nasional melalui perayaan kemerdekaan yang merangkul
                nilai-nilai kebangsaan.
              </p>

              <div class="d-flex align-items-center justify-content between">
                <div class="d-flex align-items-center">

                </div>

                <div class="d-flex align-items-center">

                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4 p-4">
          <a href="{{ route('articles.demo2') }}" class="card text-none svb-transition-fast hover-grow active-shrink h-100">
            <img src="{{ Vite::asset('resources/images/examples/collage.png') }}"
              class="card-img-top ratio-box object-cover" alt="...">

            <div class="card-body">
              <div class="d-flex align-items-center mb-3 gap-3">
                <img src="{{ Vite::asset('resources/images/default-avatar.png') }}"
                  class="img-fluid logo-md rounded-circle">

                <div class="d-flex flex-column gap-1">
                  <span class="fw-medium">Shava Jaya</span>
                  <span>13th of August</span>
                </div>
              </div>

              <h5 class="card-title text-h5 fw-semibold mb-3">
                Keanekaragaman Bangsa Besar
              </h5>

              <p class="card-text mb-3">
                Menggali keindahan dan kekuatan yang berasal dari keragaman budaya yang ada di Indonesia.
              </p>

              <div class="d-flex align-items-center justify-content between">
                <div class="d-flex align-items-center">

                </div>

                <div class="d-flex align-items-center">

                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4 p-4">
          <a href="" class="card text-none svb-transition-fast hover-grow active-shrink h-100">
            <img src="https://placehold.co/600x400" class="card-img-top ratio-box object-cover" alt="...">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3 gap-3">
                <img src="{{ Vite::asset('resources/images/default-avatar.png') }}"
                  class="img-fluid logo-md rounded-circle">

                <div class="d-flex flex-column gap-1">
                  <span class="fw-medium">Shava Jaya</span>
                  <span>8th of March 2024</span>
                </div>
              </div>

              <h5 class="card-title text-h5 fw-semibold mb-3">
                Celebrating Indonesian Independence Day
              </h5>

              <p class="card-text mb-3">
                Some quick example text to build on the card title and make up the bulk of the card's
                content.
              </p>

              <div class="d-flex align-items-center justify-content between">
                <div class="d-flex align-items-center">

                </div>

                <div class="d-flex align-items-center">

                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4 p-4">
          <a href="" class="card text-none svb-transition-fast hover-grow active-shrink h-100">
            <img src="https://placehold.co/600x400" class="card-img-top ratio-box object-cover" alt="...">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3 gap-3">
                <img src="{{ Vite::asset('resources/images/default-avatar.png') }}"
                  class="img-fluid logo-md rounded-circle">

                <div class="d-flex flex-column gap-1">
                  <span class="fw-medium">Shava Jaya</span>
                  <span>8th of March 2024</span>
                </div>
              </div>

              <h5 class="card-title text-h5 fw-semibold mb-3">
                Celebrating Indonesian Independence Day
              </h5>

              <p class="card-text mb-3">
                Some quick example text to build on the card title and make up the bulk of the card's
                content.
              </p>

              <div class="d-flex align-items-center justify-content between">
                <div class="d-flex align-items-center">

                </div>

                <div class="d-flex align-items-center">

                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4 p-4">
          <a href="" class="card text-none svb-transition-fast hover-grow active-shrink h-100">
            <img src="https://placehold.co/600x400" class="card-img-top ratio-box object-cover" alt="...">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3 gap-3">
                <img src="{{ Vite::asset('resources/images/default-avatar.png') }}"
                  class="img-fluid logo-md rounded-circle">

                <div class="d-flex flex-column gap-1">
                  <span class="fw-medium">Shava Jaya</span>
                  <span>8th of March 2024</span>
                </div>
              </div>

              <h5 class="card-title text-h5 fw-semibold mb-3">
                Celebrating Indonesian Independence Day
              </h5>

              <p class="card-text mb-3">
                Some quick example text to build on the card title and make up the bulk of the card's
                content.
              </p>

              <div class="d-flex align-items-center justify-content between">
                <div class="d-flex align-items-center">

                </div>

                <div class="d-flex align-items-center">

                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4 p-4">
          <a href="" class="card text-none svb-transition-fast hover-grow active-shrink h-100">
            <img src="https://placehold.co/600x400" class="card-img-top ratio-box object-cover" alt="...">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3 gap-3">
                <img src="{{ Vite::asset('resources/images/default-avatar.png') }}"
                  class="img-fluid logo-md rounded-circle">

                <div class="d-flex flex-column gap-1">
                  <span class="fw-medium">Shava Jaya</span>
                  <span>8th of March 2024</span>
                </div>
              </div>

              <h5 class="card-title text-h5 fw-semibold mb-3">
                Celebrating Indonesian Independence Day
              </h5>

              <p class="card-text mb-3">
                Some quick example text to build on the card title and make up the bulk of the card's
                content.
              </p>

              <div class="d-flex align-items-center justify-content between">
                <div class="d-flex align-items-center">

                </div>

                <div class="d-flex align-items-center">

                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <x-svb-footer></x-svb-footer>
@endsection
