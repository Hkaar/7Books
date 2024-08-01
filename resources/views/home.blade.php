@extends('layouts.app')

@section('title', 'Home')

@section('main')
<section id="hero" class="min-vh-100 d-flex flex-column">
  <x-svb-navigation-bar :menus=true active="home" :logo=true :login=true :avatar=true class="sticky-top"></x-svb-navigation-bar>

  <div class="container flex-fill d-flex flex-column">
    <div class="row flex-fill">
      <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
        <article class="d-flex flex-column align-items-center align-items-md-start">
          <h1 class="mb-4 text-center text-md-start">Welcome back {{ auth()->user()->name }}!</h1>

          <p class="w-75 text-body-secondary text-center text-md-start">
            Here are some quick suggestions for new book
            series that you might want to check
          </p>
        </article>
      </div>

      <div class="col-md-6 d-none d-md-flex flex-column justify-content-center">
        <div class="h-75 d-flex flex-column justify-content-center">
          <div id="homeHeroSwiper" class="swiper h-75 w-50 my-auto">
            <div class="swiper-wrapper">
              <div class="swiper-slide bg-primary ratio-book-cover">Slide 1</div>
              <div class="swiper-slide bg-secondary ratio-book-cover">Slide 2</div>
              <div class="swiper-slide bg-primary ratio-book-cover">Slide 3</div>
              <div class="swiper-slide bg-secondary ratio-book-cover">Slide 4</div>
              <div class="swiper-slide bg-primary ratio-book-cover">Slide 5</div>
              <div class="swiper-slide bg-secondary ratio-book-cover">Slide 6</div>
              <div class="swiper-slide bg-primary ratio-book-cover">Slide 7</div>
              <div class="swiper-slide bg-secondary ratio-book-cover">Slide 8</div>
              <div class="swiper-slide bg-primary ratio-book-cover">Slide 9</div>
            </div>

            <div class="swiper-pagination text-white"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="recommended" class="py-5">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <h3 class="mb-3">
        Recommended for you
      </h3>
  
      <div class="d-flex gap-1">
        <div class="book-swiper-button-prev btn btn-light rounded-circle d-none d-md-block">
          <i class="fa-solid fa-chevron-left"></i>
        </div>
        <div class="book-swiper-button-next btn btn-light rounded-circle d-none d-md-block">
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </div>
    </div>

    <div class="swiper bookSwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 1</div>
        <div class="swiper-slide bg-secondary ratio-book-cover h-75">Slide 2</div>
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 3</div>
        <div class="swiper-slide bg-secondary ratio-book-cover h-75">Slide 4</div>
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 5</div>
        <div class="swiper-slide bg-secondary ratio-book-cover h-75">Slide 6</div>
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 7</div>
        <div class="swiper-slide bg-secondary ratio-book-cover h-75">Slide 8</div>
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 9</div>
      </div>
      
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

<section id="trending" class="py-5">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <h3 class="mb-3">
        Trending picks
      </h3>
  
      <div class="d-flex gap-1">
        <div class="book-swiper-button-prev btn btn-light rounded-circle d-none d-md-block">
          <i class="fa-solid fa-chevron-left"></i>
        </div>
        <div class="book-swiper-button-next btn btn-light rounded-circle d-none d-md-block">
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </div>
    </div>

    <div class="swiper bookSwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 1</div>
        <div class="swiper-slide bg-secondary ratio-book-cover h-75">Slide 2</div>
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 3</div>
        <div class="swiper-slide bg-secondary ratio-book-cover h-75">Slide 4</div>
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 5</div>
        <div class="swiper-slide bg-secondary ratio-book-cover h-75">Slide 6</div>
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 7</div>
        <div class="swiper-slide bg-secondary ratio-book-cover h-75">Slide 8</div>
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 9</div>
      </div>
      
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

<section id="new" class="py-5">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <h3 class="mb-3">
        New Releases
      </h3>
  
      <div class="d-flex gap-1">
        <div class="book-swiper-button-prev btn btn-light rounded-circle d-none d-md-block">
          <i class="fa-solid fa-chevron-left"></i>
        </div>
        <div class="book-swiper-button-next btn btn-light rounded-circle d-none d-md-block">
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </div>
    </div>

    <div class="swiper bookSwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 1</div>
        <div class="swiper-slide bg-secondary ratio-book-cover h-75">Slide 2</div>
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 3</div>
        <div class="swiper-slide bg-secondary ratio-book-cover h-75">Slide 4</div>
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 5</div>
        <div class="swiper-slide bg-secondary ratio-book-cover h-75">Slide 6</div>
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 7</div>
        <div class="swiper-slide bg-secondary ratio-book-cover h-75">Slide 8</div>
        <div class="swiper-slide bg-primary ratio-book-cover h-75">Slide 9</div>
      </div>
      
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

<section id="browseAction" class="py-5">
  <div class="container">
    <article class="d-flex flex-column align-items-center py-5">
      <h3 class="mb-3 text-center text-md-start">Can't find anything you like?</h3>
      
      <span class="mb-4 text-body-secondary text-center">
        Check out our browse page instead by clicking the button below
      </span>
    
      <a href="{{ route('browse') }}" class="btn btn-primary">
        Go to browse
      </a>
    </article>
  </div>
</section>

<x-svb-footer></x-svb-footer>
@endsection