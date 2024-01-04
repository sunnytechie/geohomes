@extends('layouts.app')
<title>Blog Posts - Geohomes</title>
@section('content')

<style>
    .img-fluid-responsive {
        height: 200px;
        width: 100% !important;
        object-fit: cover;
    }

    @media (max-width: 1024px) {
        #py-md {
            padding: 30px !important;
        }
    }


</style>

  <section id="py-md" class="py-17 bg-gray-01">
    <div class="container">
      <h2 class="fs-30 lh-16 mb-10 text-dark font-weight-600 text-center">
        @if ($posts->count() < 1)
            No posts yet
        @else
        Interesting articles and posts
        @endif
      </h2>
      <div class="row">

        @foreach ($posts as $post)
        <div class="col-md-4 mb-6">
          <div class="card border-0 shadow-xxs-3">
            <div class="position-relative align-items-end card-img-top">
              <a href="{{ route('blog.show', $post->id) }}" class="hover-shine">
                <img class="img-fluid-responsive" src="/storage/{{ $post->image }}" alt="{{ $post->title }}">
              </a>
              @isset($post->category->title)
              <a href="{{ route('blog.show', $post->id) }}" class="badge text-white bg-dark-opacity-04 fs-13 font-weight-500 bg-hover-primary hover-white mx-2 my-4 position-absolute pos-fixed-bottom">
                {{ $post->category->title ?? '' }}
              </a>
              @endisset
            </div>
            <div class="card-body px-5 pt-3 pb-5">
            <p class="mb-1 fs-13">{{ $post->created_at->format('M d, Y') }}</p>
              <h3 class="fs-18 text-heading lh-194 mb-1">
                <a href="{{ route('blog.show', $post->id) }}" class="text-heading hover-primary">{{ $post->title }}</a>
              </h3>
            <p class="mb-3">{{ Str::limit($post->description, 50) }}</p>
              <a class="text-heading font-weight-500" href="{{ route('blog.show', $post->id) }}">Learn more <i
                            class="far fa-long-arrow-right text-primary ml-1"></i></a>
            </div>
          </div>
        </div>
        @endforeach

      </div>

      <nav class="pt-6">
        {{ $posts->links('vendor.pagination.bootstrap-4') }}
    </nav>

    </div>
  </section>
<script>
    // Get the header element
    const header = document.querySelector('header');

    // Remove the navbar-dark class
    header.classList.remove('navbar-dark');

    // Add the navbar-light class
    header.classList.add('navbar-light');
</script>
@endsection
