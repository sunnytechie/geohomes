{{-- @extends('layouts.share')
@section('content')

    <section class="pt-2 pb-13 page-title bg-img-cover-center bg-white-overlay"
         style="background-image: url('https://cdn.pixabay.com/photo/2014/08/03/23/41/house-409451_1280.jpg');">
        <div class="container">

            <h1 class="fs-30 lh-15 mb-0 text-heading font-weight-500 text-center pt-12" data-animate="fadeInDown">
                {{ $post->title }}
            </h1>
        </div>
      </section>

      <section class="pt-13 pb-12">
        <div class="container">
          <div class="row ml-xl-0 mr-xl-n6">
            <div class="col-lg-8 mb-6 mb-lg-0 pr-xl-6 pl-xl-0">
                <div class="position-relative">
                    <img class="rounded-lg d-block" src="/storage/{{ $post->image }}" alt="Placeholder Image">
                    <a href="#" class="badge text-white bg-dark-opacity-04 fs-13 font-weight-500 bg-hover-primary hover-white m-2 position-absolute letter-spacing-1 pos-fixed-bottom">
                    {{ $post->category->title ?? "No tag" }}
                    </a>
                </div>
                <ul class="list-inline mt-4">
                    <li class="list-inline-item mr-4"><i class="far fa-calendar mr-1"></i> {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</li>
                    <li class="list-inline-item mr-4"><i class="far fa-eye mr-1"></i> {{ $post->views }} views</li>
                </ul>
                <h3 class="fs-md-32 text-heading lh-141 mb-2">
                    {{ $post->title }}
                </h3>

                <div class="lh-214 mb-4 pb-2" style="border-bottom: 0.1rem solid #f9f9f9">
                    <p>
                        {!! $post->body !!}
                    </p>
                </div>

                <div class="row pb-7 mb-6 border-bottom align-items-center">
                    <div class="col-sm-6 d-flex">
                    <span class="d-inline-block mr-2"><i class="fal fa-tags"></i></span>
                    <ul class="list-inline">

                        <li class="list-inline-item mr-0"><a href="#" class="text-muted hover-dark">{{ $post->category->title ?? "No tag" }}</a>
                        </li>
                    </ul>
                    </div>

                    @php
                        $id = "$post->id";
                        $pamaLink = "blog/$id";
                    @endphp

                    @include('snippets.share')
                </div>


            </div>
          <div class="col-lg-4 pl-xl-6 pr-xl-0 primary-sidebar sidebar-sticky" id="sidebar">
            <div class="primary-sidebar-inner">

              <div class="card mb-4">
                <div class="card-body px-6 pt-5 pb-6">

                  <h4 class="card-title fs-16 lh-2 text-dark mb-3">Latest Posts</h4>
                  <ul class="list-group list-group-flush">
                    @foreach ($posts as $post)

                    <li class="list-group-item px-0 pt-0 pb-3">
                      <div class="media">
                        <div class="position-relative mr-3">
                          <a href="{{ route('blog.show', $post->id) }}"
                            class="d-block w-100px rounded pt-11 bg-img-cover-center"
                            style="background-image: url('/storage/{{ $post->image }}')">
                          </a>
                          <a href="{{ route('blog.show', $post->id) }}"
                                class="badge text-white bg-dark-opacity-04 m-1 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute pos-fixed-top">
                            {{ Str::limit($post->category->title ?? "No tag", 5) }}
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="fs-14 lh-186 mb-1">
                            <a href="{{ route('blog.show', $post->id) }}"
                                                   class="text-dark hover-primary">
                              {{ $post->title }}
                            </a>
                          </h4>
                          <div class="text-gray-light">
                            {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}
                          </div>
                        </div>
                      </div>
                    </li>

                    @endforeach
                  </ul>
                </div>
              </div>

              <div class="card mb-4">
                <div class="card-body px-6 py-5">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-3">Popular Tags</h4>
                  <ul class="list-inline mb-0">

                    @foreach ($categories as $category)
                    <li class="list-inline-item mb-2" style="cursor: default">
                      <span class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">{{ $category->title }}</span>
                    </li>
                    @endforeach


                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection --}}
