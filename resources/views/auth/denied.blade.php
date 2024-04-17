@extends('layouts.app')

@section('title', "Access Denied")

@section('main')
<div class="flex-fill d-flex flex-column align-items-center justify-content-center">
  <div class="brand mb-3">
    <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="Image not available">
    <h3>Seven Books</h3>
  </div>

  <div class="bordered p-3 d-flex flex-column align-items-center justify-content-center mb-3">  
    <div class="text-center">
      <h5 class="text-danger">Sorry but you don't have permission to access that page</h5>
      <p>
        You can access the other <a href="{{ route('orders.index') }}">menus here</a> 
        or go back to the <a href="{{ route('login') }}">login page</a>
      </p>
    </div>
  </div>
</div>
@endsection

@section('extra')
    
@endsection