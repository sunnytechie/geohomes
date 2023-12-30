@extends('layouts.app')

@section('content')
<style>
  .remove-this-item {
    display: none !important;
  }

  @media only screen and (max-width: 1024px) {
  .mt-12 {
    margin-top: 0 !important;
  }
  }

  /* override GoogleMap settings */
  .map-container {
    position: relative;
    width: 100%;
    padding-bottom: 75%; /* Adjust this value to control the aspect ratio of the map */
    height: 0;
    overflow: hidden;
  }

  .map-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  @media only screen and (max-width: 600px) {
    /* Adjust the breakpoint value as needed */
    .map-container {
      padding-bottom: 100%; /* Increase the aspect ratio for mobile */
    }
  }

  @media only screen and (min-width: 601px) {
    /* Adjust the breakpoint value as needed */
    .map-container {
      padding-bottom: 75%; /* Restore the aspect ratio for desktop */
    }
  }

  /* Custom style for reduced width on desktop */
  @media (min-width: 768px) {
    .custom-modal-dialog {
    width: 70%;
    }
  }

  /* Maintain full width on mobile */
  @media (max-width: 767px) {
    .custom-modal-dialog {
      width: 100%;
    }
  }

  @media (min-width: 576px) {
      .modal-dialog {
          max-width: 300px;
          margin: 1.75rem auto;
      }
  }

  @media (max-width: 1024px) {
      .hide-from-mobile {
            display: none;
      }
  }

  .card-img img {
  max-width: 100%; /* Make the image responsive */
  height: auto;
    }

    @media (max-width: 576px) { /* Adjust layout for screens smaller than 576px (Bootstrap's default mobile breakpoint) */
    .card-img {
        flex: 0 0 100%; /* Make the image take up the full width on smaller screens */
    }
    }


</style>

<main id="content">

  {{-- <section class="mt-12 pb-5 pb-lg-10 page-title bg-overlay bg-img-cover-center" style="background-image: url('assets/images/bg-home-6.jpg');">
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-light mb-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Projects completed</li>
            </ol>
          </nav>
          <h1 class="fs-18 fs-md-30 mb-0 text-white font-weight-normal text-center pt-8 pb-13 lh-15 px-lg-16" data-animate="fadeInDown">
            GeoHomes is an estate agency that helps people live in more thoughtful and beautiful ways.
          </h1>
        </div>
  </section> --}}
    {{-- <section class="pb-9 pb-md-11 mt-10">
        <div class="container">


            @foreach ($projects as $project)
            <div class="mb-5">
              <div class="row">
                <div class="col-md-4">
                  <a href="{{ route('estate.show', $project->id) }}">
                    <img src="/storage/{{ $project->image }}" class="card-img" alt="{{ $project->title }}">
                  </a>
                </div>

                <div class="col-md-4">
                  <div>
                    <h2 class="my-0">
                      <a href="{{ route('estate.show', $project->id) }}" class="fs-16 lh-2 text-dark hover-primary d-block">{{ $project->title }}</a>
                    </h2>
                    <p class="mb-2 font-weight-500 text-gray-light">{{ $project->address }}</p>
                    <p class="mb-2 mxw-571 ml-0"><p>{{ Str::limit($project->description, 150) }}</p>
                    <p class="mb-6">₦ {{ number_format($project->price, 2) }}</p>
                  </div>

                  <div class="d-flex mb-3">
                    <a href="{{ route('initiateLandPayment', $project->id) }}" class="btn btn-primary rounded-0 border-0" style="background: #00A75A;">Subscribe</a>

                    <form action="{{ route('inspection') }}" method="POST" style="padding: 0; margin-bottom: 0;">
                      @csrf
                      <input type="hidden" name="project_id" value="{{ $project->id }}">
                      <button type="submit" class="btn btn-primary rounded-0 border-0" style="background: #00A75A">Book Inspection</button>
                    </form>
                  </div>
                </div>

                <div class="col-md-4">
                  <!-- map height 200, width 100% -->
                  @if ($project->map_embed_code)
                    <div class="map-container">
                      {!! $project->map_embed_code !!}
                    </div>
                    <!-- End map -->
                  @endif

                </div>
              </div>
            </div>

            <!-- Modal -->
              <div class="modal fade" id="exampleModal{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered custom-modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Subscribe</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('subscription') }}" method="POST" style="padding: 0; margin-bottom: 0; margin-right: 10px">
                      @csrf
                      <input type="hidden" name="project_id" value="{{ $project->id }}">
                      <div class="modal-body">

                        <div class="my-2" style="color: #00A75A">After selecting the number of plots you want, you will first be prompted to subscribe for an allocation with a fee of ₦ 20,000 (twenty thousand naira). <br> After the allocation is made you have 14days to pay for the land else the plot(s) you subscribed for will be available for purchase to other customers.</div>

                        <div class="input-group input-group-lg">
                          <label for="plots">Select the Number of plots you want.</label>
                          <input class="shadow-none fs-13 form-control" value="2" name="plots" id="plots" type="number">

                          @error('plots')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="background: #00A75A">Proceed</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            @endforeach


        </div>
    </section> --}}

    <div class="mt-10 hide-from-mobile"></div>

    <section class="pt-7 pb-13">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mb-6 mb-lg-0">
              <div class="row align-items-sm-center mb-6">
                <div class="col-sm-6 mb-6 mb-sm-0">
                  <h2 class="fs-15 text-dark mb-0">We found <span class="text-primary">{{ $projects->count() }}</span> Estates
                    available
                    for
                    you
                  </h2>
                </div>
                <div class="col-sm-6">
                  <div class="d-flex align-items-center justify-content-sm-end">

                    <div class="input-group border rounded input-group-lg w-auto">
                        <label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3"
                               for="sortBy"><i class="fas fa-align-left fs-16 pr-2"></i>Sort by:</label>

                        <div class="btn-group">
                          <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $order }}
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('project.asc.order') }}" data-sort="alphabet">Ascending</a>
                            <a class="dropdown-item" href="{{ route('project.desc.order') }}" data-sort="alphabet">Descending</a>
                            <a class="dropdown-item" href="{{ route('project.desc.random') }}" data-sort="random">Randomly</a>
                          </div>
                        </div>
                    </div>

                  </div>
                </div>
              </div>

              @foreach ($projects as $project)
              <div class="card shadow border border-sm-0 mb-4 p-4">
                <div class="row no-gutters align-items-center">
                  <div class="col-sm-4 border-sm rounded-0 rounded-lg-top-left card-img">
                    <a href="{{ route('estate.show', $project->id) }}">
                      <img class="img-fluid" src="/storage/{{ $project->image }}" alt="{{ $project->title }}">
                    </a>
                  </div>
                  <div class="col-sm-8">
                    <div class="card-body px-6 py-sm-0 border-top border-sm-0">
                      <a href="{{ route('estate.show', $project->id) }}">
                        <h6 class="card-title text-dark lh-213 mb-0 hover-primary">{{ $project->title }}</h6>
                      </a>
                      <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ $project->address }}</p>
                      {{-- <p class="card-text"><i class="fas fa-pencil"></i> {{ Str::limit($project->description, 70) }}</p> --}}
                      <p class="card-text"><b>₦ {{ number_format($project->price, 2) }}</b></p>
                      <ul class="list-group list-group-no-border">

                        <li class="list-group-item d-flex align-items-sm-center lh-114 row m-0 px-0 pt-4 pb-0">
                          <span class="col-sm-3 p-0 fs-13 mb-1 mb-sm-0">Share</span>
                          <ul class="col-sm-9 list-inline text-gray-lighter m-0 p-0 z-index-2">
                            <li class="list-inline-item m-0">
                                <a href="{{ route('share.twitter', $project->title) }}" target="_blank" class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0 ml-2">
                                <a href="{{ route('share.facebook', $project->title) }}" target="_blank" class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            {{-- <li class="list-inline-item mr-0 ml-2">
                              <a href="#" class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                <i class="fab fa-instagram"></i>
                            </a>
                            </li> --}}
                            <li class="list-inline-item mr-0 ml-2">
                                <a href="{{ route('share.whatsapp', $project->title) }}" target="_blank" class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </li>
                          </ul>
                        </li>
                      </ul>

                      <div class="d-flex mt-3">
                        <a href="{{ route('initiateLandPayment', $project->id) }}" class="btn mr-4 btn-primary rounded-0 border-0" style="background: #00A75A;">Subscribe</a>

                        <form action="{{ route('inspection') }}" method="POST" style="padding: 0; margin-bottom: 0;">
                          @csrf
                          <input type="hidden" name="project_id" value="{{ $project->id }}">
                          <button type="submit" class="btn btn-primary rounded-0 border-0" style="background: #00A75A">Book Inspection</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                @endforeach
                <nav class="pt-6">
                    {{ $projects->links('vendor.pagination.bootstrap-4') }}
                </nav>
            </div>



            <div class="col-lg-4 primary-sidebar sidebar-sticky" id="sidebar">
              <div class="primary-sidebar-inner">
                <div class="card mb-4">
                  <div class="card-body text-center pt-7 pb-6 px-0">
                    <img src="{{ asset('assets/images/contact-widget.jpg') }}"
                                 alt="Want to become an Estate Partner ?">
                    <div class="text-dark mb-6 mt-n2 font-weight-500">Want to become an
                      <p class="mb-0 fs-18">Estate Partner?</p>
                    </div>
                    <a href="{{ route('auth.agent') }}" class="btn btn-primary" style="background: #00A75A;">Register</a>
                  </div>
                </div>

                {{-- <div class="card property-widget mb-4">
                  <div class="card-body px-6 pt-5 pb-6">
                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Featured Properties</h4>
                    <div class="slick-slider mx-0"
                                 data-slick-options='{"slidesToShow": 1, "autoplay":true}'>
                      <div class="box px-0">
                        <div class="card border-0">
                          <img src="images/feature-property-01.jpg" class="card-img" alt="Villa on Hollywood Boulevard">
                          <div class="card-img-overlay d-flex flex-column bg-gradient-3 rounded-lg">
                            <div class="d-flex mb-auto">
                              <a href="#" class="mr-1 badge badge-orange">featured</a>
                              <a href="#" class="badge badge-indigo">for Rent</a>
                            </div>
                            <div class="px-2 pb-2">
                              <a href="single-property-1.html" class="text-white"><h5
                                                        class="card-title fs-16 lh-2 mb-0">Villa on Hollywood
                                  Boulevard</h5>
                              </a>
                              <p class="card-text text-gray-light mb-0 font-weight-500">1421 San
                                Predro
                                St, Los Angeles</p>
                              <p class="text-white mb-0"><span
                                                        class="fs-17 font-weight-bold">$2500 </span>/month
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="box px-0">
                        <div class="card border-0">
                          <img src="images/feature-property-01.jpg" class="card-img" alt="Villa on Hollywood Boulevard">
                          <div class="card-img-overlay d-flex flex-column bg-gradient-3 rounded-lg">
                            <div class="d-flex mb-auto">
                              <a href="#" class="mr-1 badge badge-orange">featured</a>
                              <a href="#" class="badge badge-indigo">for Rent</a>
                            </div>
                            <div class="px-2 pb-2">
                              <a href="single-property-1.html" class="text-white"><h5
                                                        class="card-title fs-16 lh-2 mb-0">Villa on Hollywood
                                  Boulevard</h5>
                              </a>
                              <p class="card-text text-gray-light mb-0 font-weight-500">1421 San
                                Predro
                                St, Los Angeles</p>
                              <p class="text-white mb-0"><span
                                                        class="fs-17 font-weight-bold">$2500 </span>/month
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="box px-0">
                        <div class="card border-0">
                          <img src="images/feature-property-01.jpg" class="card-img" alt="Villa on Hollywood Boulevard">
                          <div class="card-img-overlay d-flex flex-column bg-gradient-3 rounded-lg">
                            <div class="d-flex mb-auto">
                              <a href="#" class="mr-1 badge badge-orange">featured</a>
                              <a href="#" class="badge badge-indigo">for Rent</a>
                            </div>
                            <div class="px-2 pb-2">
                              <a href="single-property-1.html" class="text-white"><h5
                                                        class="card-title fs-16 lh-2 mb-0">Villa on Hollywood
                                  Boulevard</h5>
                              </a>
                              <p class="card-text text-gray-light mb-0 font-weight-500">1421 San
                                Predro
                                St, Los Angeles</p>
                              <p class="text-white mb-0"><span
                                                        class="fs-17 font-weight-bold">$2500 </span>/month
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> --}}

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
              </div>
            </div>
          </div>
        </div>
      </section>



</main>

<script>
    // Get the header element
    const header = document.querySelector('header');

    // Remove the navbar-dark class
    header.classList.remove('navbar-dark');

    // Add the navbar-light class
    header.classList.add('navbar-light');
</script>

@endsection
