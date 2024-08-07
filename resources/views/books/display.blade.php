@extends('layouts.app')

@section('title', "Seven Books")

@section('main')
<x-svb-navigation-bar :menus=false active="" :logo=false :login=false :avatar=true></x-svb-navigation-bar>
<section id="display">
    <div class="container">
      <div class="row justify-content-center" style="margin-top: 2.1rem">
        <div class="col-md-12 col-lg-4 d-none d-md-block">
            <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid rounded">
        </div>
        <div class="col-md-12 d-block d-md-none">
            <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid rounded">
        </div>
        <div class="col-md-5 d-none d-md-block">
          <h3 class="fw-semibold">Harry Potter & The Deathly Hollows</h3>
          <h6 class="text-secondary mt-2">ISBN : 89223233990</h6>
          <div class="d-flex justify-content-start mt-3">
            <i class="fa-solid fa-star p-1 text-primary me-2"></i>
            <p class="">4.5 / 5</p>
          </div>
          <p style="text-align: justify;">
            A Book about the fantasy world based on the popular game Dungeons & Dragons.
            Explore a world filled with new possibilities alongside your friends.
          </p>
          <div class="d-flex justify-content-start gap-2">
            <button class="btn rounded-pill border-2 border">Fantasy</button>
            <button class="btn rounded-pill border-2 border">Adventure</button>
            <button class="btn rounded-pill border-2 border">Action</button>
            <button class="btn rounded-pill border-2 border">Comedy</button>
          </div>
          <div class="d-flex justify-content-around mt-3" style="flex-wrap: wrap">
            <div class="">
              <p class="fw-semibold">Total Borrowed</p>
              <p>143801 books</p>
            </div>
            <div class="">
              <p class="fw-semibold">Available</p>
              <p>Yes</p>
            </div>
            <div class="">
              <p class="fw-semibold">Cost/day</p>
              <p>$0.3</p>
            </div>
            <div class="">
              <p class="fw-semibold">Late fee</p>
              <p>$10/day</p>
            </div>
          </div>
          <button class="btn btn-primary rounded-pill">Borrow</button>

        </div>
        <div class="col-md-6 d-block d-md-none p-3">
          <h5 class="fw-semibold text-center mt-3">Harry Potter & The Deathly Hollows</h5>
          <h6 class="text-secondary mt-2 text-center">ISBN : 89223233990</h6>
          <div class="d-flex justify-content-center mt-3">
            <i class="fa-solid fa-star p-1 text-primary me-2"></i>
            <p class="">4.5 / 5</p>
          </div>
          <p style="text-align: justify;">
            A Book about the fantasy world based on the popular game Dungeons & Dragons.
            Explore a world filled with new possibilities alongside your friends.
          </p>
          <div class="d-flex flex-column justify-content-start gap-2">
            <button class="btn rounded-pill border-2 border">Fantasy</button>
            <button class="btn rounded-pill border-2 border">Adventure</button>
            <button class="btn rounded-pill border-2 border">Action</button>
            <button class="btn rounded-pill border-2 border">Comedy</button>
          </div>
          <div class="d-flex d-md-block justify-content-around mt-3 gap-4" style="flex-wrap: wrap">
            <div class="">
              <p class="fw-semibold">Total Borrowed</p>
              <p>143801 books</p>
            </div>
            <div class="">
              <p class="fw-semibold">Available</p>
              <p>Yes</p>
            </div>
            <div class="">
              <p class="fw-semibold">Cost/day</p>
              <p>$0.3</p>
            </div>
            <div class="">
              <p class="fw-semibold">Late fee</p>
              <p>$10/day</p>
            </div>
          </div>
          <button class="btn btn-primary rounded-pill" style="text-align: center">Borrow</button>

        </div>
      </div>
    </div>
  </section>
@endsection