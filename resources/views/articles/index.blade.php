@extends('layouts.app')

@section('title', 'Blog')

@section('main')
<x-svb-navigation-bar :menus=true active="blog" :logo=true :login=true :avatar=true></x-svb-navigation-bar>

<div class="min-vh-100">
    <div class="container my-4">
        <div class="d-flex justify-content-center align-items-center mb-4">
            <form action="{{ route('blog') }}" method="get" class="d-flex w-75 gap-3">
                <div class="input-group w-100">
                    <input type="text" class="form-control" id="search" name="search"
                        placeholder="Try to search for something here..."
                        value="{{ old('search', request('search')) }}">
                    <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                        <i class="fa-regular fa-magnifying-glass"></i>
                        <span class="d-none d-md-block">Search</span>
                    </button>
                </div>
            </form>
        </div>

        <div class="row">
            @if ($articles->isEmpty())
            <div class="col-12">
                <p class="text-center">No articles found for your search query "<strong>{{ request('search')
                        }}</strong>". Please try again with different keywords.</p>
            </div>
            @else
            @foreach ($articles as $article)
            <div class="col-12 col-md-6 col-lg-4 p-4">
                <a href="{{ route('blog.show', $article->slug) }}"
                    class="card text-none svb-transition-fast hover-grow active-shrink h-100">
                    <img src="{{ $article->getFirstMediaUrl('images') }}" class="card-img-top ratio-box object-cover" alt="{{ $article->title }}">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3 gap-3">
                            <img src="{{ Vite::asset('resources/images/default-avatar.png') }}"
                                class="img-fluid logo-md rounded-circle">
                            <div class="d-flex flex-column gap-1">
                                <span class="fw-medium">{{ $article->user->name ?? 'Unknown Author' }}</span>
                                <span>{{ $article->created_at->format('jS F Y') }}</span>
                            </div>
                        </div>
                        <h5 class="card-title text-h5 fw-semibold mb-3">
                            {{ $article->title }}
                        </h5>

                        @foreach ($article->articleContents as $content)
                        <p class="card-text mb-3">
                            {{ Str::limit($content->content, 100) }}
                        </p>
                        @endforeach

                        <div class="d-flex align-items-center justify-content-between">
                            <!-- Additional footer info can go here -->
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $articles->links() }}
        </div>
    </div>
</div>

<x-svb-footer></x-svb-footer>
@endsection
