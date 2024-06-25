@extends('layouts.app')

@section('title', "Seven Books")

@section('main')
<x-svb-navigation-bar :search=false :menus=false active=""></x-svb-navigation-bar>
<section id="display">
    <div class="container">
      <div class="row justify-content-center align-items-center mt-3">
        <div class="col-md-4">
            <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
        </div>
        <div class="col-md-5">
          <h3 class="fw-semibold">Harry Potter & The Deathly Hollows</h3>
          <p class="text-secondary ms-1">ISBN : 89223233990</p>
          <div class="d-flex justify-content-start">
            <i class="fa-solid fa-star p-1 text-primary me-2"></i>
            <p>4.5 / 5</p>
          </div>
          <p class="ms-1" style="text-align: justify;">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Dolore, voluptatibus porro! Assumenda rerum numquam illum
            ipsum quaerat ullam.
          </p>
          <div class="d-flex justify-content-start ms-1">
            <button class="btn rounded-pill border-2 border me-2">Fantasy</button>
            <button class="btn rounded-pill border-2 border me-2">Adventure</button>
            <button class="btn rounded-pill border-2 border me-2">Action</button>
            <button class="btn rounded-pill border-2 border me-2">Comedy</button>
          </div>
          <div class="d-flex justify-content-around mt-3 ms-1">
            <div class="col-md-4">
              <p class="fw-semibold">Total Borrowed</p>
              <p>143801 books</p>
            </div>
            <div class="col-md-3">
              <p class="fw-semibold">Available</p>
              <p>Yes</p>
            </div>
            <div class="col-md-3">
              <p class="fw-semibold">Cost/day</p>
              <p>$0.3</p>
            </div>
            <div class="col-md-2">
              <p class="fw-semibold">Late fee</p>
              <p>$10/day</p>
            </div>
          </div>
          <button class="btn btn-primary rounded-pill ms-1">Borrow</button>
          
        </div>
      </div>
    </div>
  </section>
@endsection