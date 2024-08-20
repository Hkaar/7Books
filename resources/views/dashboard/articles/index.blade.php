@extends('layouts.app')

@section('title', 'Articles - Dashboard')

@section('main')
  <x-dashboard-layout active="article">
    <div class="d-flex flex-column border shadow-sm rounded">
      <div class="d-flex align-items-center justify-content-between flex-column flex-lg-row gap-2 border-b border-body-tertiary px-3 py-4">
        <a class="btn btn-success w-100 w-lg-fit" href="{{ route('articles.create') }}">Create an article</a>

        <x-query-accordion>
          <form action="{{ route('articles.index') }}" method="get"
            class="d-flex flex-lg-row flex-column gap-lg-1 py-lg-0 gap-2 py-3">
            <input name="search" class="form-control" type="search" placeholder="Search"
              value="{{ request()->query('search', '') }}" aria-label="Search">

            <select name="o" class="form-select" aria-label="Default select example">
              <option selected disabled>Order by</option>

              @if (request()->query('o') === 'oldest')
                <option selected value="oldest">Oldest</option>
              @else
                <option value="oldest">Oldest</option>
              @endif

              @if (request()->query('o') === 'latest')
                <option selected value="latest">Latest</option>
              @else
                <option value="latest">Latest</option>
              @endif
            </select>

            <button class="btn btn-outline-primary" type="submit">Apply</button>
          </form>
        </x-query-accordion>
      </div>

      <div class="table-responsive px-3">
        <table class="table-striped table-bordered table-hover table">
          <thead>
            <th scope="col" width="5%">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col" width="18%">Actions</th>
          </thead>

          <tbody>
            @foreach ($articles as $i => $article)
              <tr>
                <td>{{ ($articles->currentPage() - 1) * $articles->perPage() + $i+1 }}</td>
                <td>{{ $article->title }}</td>
                <td></td>

                <td class="d-flex gap-1">
                  <a href="{{ route('articles.show', $article->id) }}" type="button" class="btn btn-info">
                    Show
                  </a>

                  <button type="button" class="btn btn-danger" hx-confirm="Are you sure you want to delete this user?"
                    hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                    hx-delete="{{ route('articles.destroy', $article->id) }}" hx-target="closest tr" hx-swap="outerHTML">Delete
                  </button>

                  <a class="btn btn-small btn-warning" href="{{ route('articles.edit', $article->id) }}">Edit
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="d-flex align-items-center justify-content-between px-3 pt-2 pb-3">
        <x-paginate-links :links="$articles" :useHtmx=false></x-paginate-links>

        <x-paginate-counter :items="$articles"></x-paginate-counter>
      </div>
    </div>
  </x-dashboard-layout>
@endsection