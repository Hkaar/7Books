@extends('layouts.app')

@section('title', 'Home')

@section('main')
<x-svb-navigation-bar :search=true :menus=true active="home"></x-svb-navigation-bar>

<section id="hero" class="min-vh-100 bg-body-tertiary">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <h1>Welcome back {{ auth()->user()->name }}</h1>
      </div>

      <div class="col-md-6 d-none d-md-block"></div>
    </div>
  </div>
</section>

<section id="recommended">
  <div class="container">
    <h3>Recommended for you</h3>
  </div>
</section>

<section id="new">
  <div class="container">
    <h3>Newly stocked!</h3>
  </div>
</section>

<section id="trending">
  <div class="container">
    <h3>Trending picks</h3>
  </div>
</section>

<section id="browseAction">
  <div class="container">
    <h3>Can't find anything you like?</h3>
    <span>Then go to our browse page!</span>
    
    <button type="button" class="btn btn-primary">
      Go to browse
    </button>
  </div>
</section>

<x-svb-footer></x-svb-footer>
@endsection