@extends('layouts.app')

@section('title', 'Browse')

@section('main')
  <x-svb-navigation-bar :menus=true active="browse" :logo=true :login=true :avatar=true></x-svb-navigation-bar>

  <x-svb-footer></x-svb-footer>
@endsection