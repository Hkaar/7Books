@extends('layouts.app')

@section('title', "Access Denied")

@section('main')
<div class="container min-vh-100 d-flex flex-column align-items-center justify-content-center">
  <div class="shadow p-4 rounded">
    <a href="{{ route('/') }}" class="d-flex align-items-center justify-content-center flex-column flex-md-row gap-2 mb-3 text-center text-inherit text-none">
      <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="Image not available" class="img-fluid ratio-box img-logo">
      <h3>Seven Books</h3>
    </a>
  
    <div class="d-flex flex-column align-items-center justify-content-center">  
      <div class="text-center">
        <h3 class="text-danger mb-3">Sorry But You Can't Access That Page</h3>

        <p class="mb-3">
          The page you requested cannot be accessed...
        </p>
  
        <div class="d-flex gap-1 justify-content-center align-items-center w-100">
          <a href="{{ route('orders.index') }}" class="btn btn-danger">Go back</a>
          <button class="btn btn-info">What is this?</button>
          <a href="{{ route('/') }}" class="btn btn-primary">Go to home</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('extra')
    
@endsection