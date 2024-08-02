@extends('layouts.app')

@section('title', "Access Denied")

@section('main')
<div class="container min-vh-100 d-flex flex-column align-items-center justify-content-center">
  <div class="d-flex flex-column align-items-center justify-content-center">
    <div class="text-center">
      <h3 class="text-danger mb-3">Sorry but you can't access that yet</h3>

      <div class="d-flex gap-1 justify-content-center align-items-center w-100">
        <a href="{{ route('/') }}" class="btn btn-primary">Go to home</a>
      </div>
    </div>
  </div>
</div>
@endsection

@section('extra')

@endsection