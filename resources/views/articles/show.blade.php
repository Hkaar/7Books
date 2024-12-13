@extends('layouts.app')

@section('title', $article->title)

@section('main')
<x-svb-navigation-bar :menus=true active="blog" :logo=true :login=true :avatar=true></x-svb-navigation-bar>

<div class="min-vh-100">
    <div class="container my-4">
        <!-- Article Header -->
        <div class="mb-4">
            <h1 class="text-h1 fw-bold">{{ $article->title }}</h1>
            <div class="d-flex align-items-center gap-3 mt-2">
                <img src="{{ Vite::asset('resources/images/default-avatar.png') }}"
                    class="img-fluid logo-md rounded-circle" alt="Author Avatar">
                <div>
                    <span class="fw-medium">{{ $article->user->name ?? 'Unknown Author' }}</span>
                    <span class="d-block text-muted">{{ $article->created_at->format('jS F Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Article Content -->
        <div class="mb-4">
            @if($article->getFirstMediaUrl('images'))
            <img src="{{ $article->getFirstMediaUrl('images') }}" class="img-fluid mb-4 rounded"
                alt="{{ $article->title }}">
            @endif

            @foreach($article->articleContents as $content)
            <p class="mb-3">{{ $content->content }}</p>
            @endforeach
        </div>

        <!-- Additional Content -->
        <div class="mt-5">
            <!-- You can add tags, categories, or related articles here -->
        </div>
    </div>
</div>

<x-svb-footer></x-svb-footer>
@endsection
