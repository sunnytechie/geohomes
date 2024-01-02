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

    .img-fluid-responsive {
      width: 100%;
      height: 150px;
      object-fit: cover;
    }

    .img-fluid-responsive-2 {
      width: 100%;
      height: 250px;
      object-fit: cover;
    }
</style>

<main id="content">
    <section class="mt-12" style="background: #00A75A">
      <div class="container">
        @include('snippets.search')
      </div>
    </section>

    {{-- <section class="page-title shadow">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pt-6 pt-lg-2 lh-15 pb-5">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listing</li>
          </ol>
          <h1 class="fs-20 lh-1 mb-0 text-heading font-weight-600">Find properties to rent or buy </h1>

        </nav>
      </div>
    </section> --}}
    <section class="pt-8 pb-11 bg-gray-01">
      <div class="container">
        <div class="row">


          <div class="col-lg-8 mb-8 mb-lg-0 order-1 order-lg-1">
            @if ($properties->count() == 0)
              <div>No properties are posted yet.</div>
            @endif

            {{-- Loop filtered result --}}
            @foreach ($properties as $property)
            <div class="py-5 px-4 border rounded-lg shadow-hover-1 bg-white mb-4" data-animate="fadeInUp">
              <div class="media flex-column flex-sm-row no-gutters">

                <div class="col-sm-3 mr-sm-5 card border-0 hover-change-image bg-hover-overlay mb-sm-5">
                  <a href="{{ route('gh.property.show', $property->id) }}">
                    <img class="img-fluid-responsive" src="/storage/{{ $property->image }}" class="card-img" alt="{{ $property->title }}">

                 <div class="card-img-overlay p-2">
                    <ul class="list-inline mb-0 d-flex justify-content-center align-items-center h-100 hover-image">

                    </ul>
                  </div>
                </a>
                </div>

                <div class="media-body mt-3 mt-sm-0">
                  <h2 class="my-0">
                    <a href="{{ route('gh.property.show', $property->id) }}" class="fs-16 lh-2 text-dark hover-primary d-block">{{ $property->title }}</a>
                  </h2>
                  <p class="mb-1 font-weight-500 text-gray-light">{{ $property->address }}</p>
                  <p class="fs-17 font-weight-bold text-heading mb-1">
                    #{{ $property->price }}
                  </p>
                  <p class="mb-2 ml-0">{{ Str::limit($property->description, 50) }}</p>
                  {{-- Share property --}}
                  @php
                        $id = "$property->id";
                        $pamaLink = "listing/property/$id";
                    @endphp
                <div class="text-left text-sm-left pb-3">
                  <span class="d-inline-block text-heading font-weight-500 lh-17 mr-1">Share this property</span>
                  <ul class="p-0 m-0">
                    <li class="list-inline-item">
                        <form action="{{ route('share.twitter') }}" method="post" target="_blank">
                          @csrf
                          <input type="hidden" name="url" value="{{ $pamaLink }}">
                          <button type="submit" class="text-muted fs-15 hover-dark lh-1 px-2" style="border: none; padding: 10px"><i class="fab fa-twitter"></i></button>
                        </form>
                      </li>

                      <li class="list-inline-item">
                        <form action="{{ route('share.facebook') }}" method="post" target="_blank">
                          @csrf
                          <input type="hidden" name="url" value="{{ $pamaLink }}">
                          <button type="submit" class="text-muted fs-15 hover-dark lh-1 px-2" style="border: none; padding: 10px"><i class="fab fa-facebook-f"></i></button>
                        </form>
                      </li>

                      <li class="list-inline-item">
                        <form action="{{ route('share.whatsapp') }}" method="post" target="_blank">
                          @csrf
                          <input type="hidden" name="url" value="{{ $pamaLink }}">
                          <button type="submit" class="text-muted fs-15 hover-dark lh-1 px-2" style="border: none; padding: 10px"><i class="fab fa-whatsapp"></i></button>
                        </form>
                      </li>

                  </ul>
                </div>
                </div>
              </div>
              <div class="d-sm-flex justify-content-sm-between">
                <ul class="list-inline d-flex mb-0 flex-wrap">
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="{{ $property->bedrooms }} Bedroom">
                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                    {{ $property->bedrooms }} Br
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="{{ $property->bathrooms }} Bathrooms">
                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                      <use xlink:href="#icon-shower"></use>
                    </svg>
                    {{ $property->bathrooms }} Ba
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Size">
                    <svg class="icon icon-square fs-18 text-primary mr-1">
                      <use xlink:href="#icon-square"></use>
                    </svg>
                    {{ $property->size_in_fit }} Sq.Ft
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="{{ $property->garage_size }} Garage">
                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                      <use xlink:href="#icon-Garage"></use>
                    </svg>
                    {{ $property->garage_size }} Gr
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Year">
                    <svg class="icon icon-year fs-18 text-primary mr-1">
                      <use xlink:href="#icon-year"></use>
                    </svg>
                    {{ $property->year_built }}
                  </li>
                </ul>
                <span class="badge badge-default">{{ $property->lint_in }}</span>
              </div>
            </div>
            @endforeach


            <nav class="pt-6">
                {{ $properties->links('vendor.pagination.bootstrap-4') }}
            </nav>

          </div>

          <div class="col-lg-4 order-2 order-lg-2 primary-sidebar sidebar-sticky" id="sidebar">
            <div class="primary-sidebar-inner">

              {{-- Newsletter --}}
              <div class="card mb-4">
                <div class="card-body px-6 py-4">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-1">Newsletter Sign Up</h4>
                  <p class="card-text mb-5">Subscribe to new letter to receive exclusive offer and the latest
                    news</p>
                    <form id="newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST">
                      @csrf
                    <div class="form-group mb-3">
                      <label for="email" class="sr-only">Email</label>
                      <input type="email" class="form-control form-control-lg border-0 shadow-none"
                                         id="email"
                                         name="email"
                                         placeholder="Enter your email">
                    </div>
                    <div class="text-center mb-2" id="response-message" style="color: #00A75A"></div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-none mb-2" style="background: #00A75A">
                      Subscribe
                    </button>
                  </form>
                </div>
              </div>

              {{-- Lastest property --}}
              <div class="card property-widget mb-4">
                <div class="card-body px-6 pt-5 pb-6">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-3">Recent Properties</h4>
                  <div class="slick-slider mx-0" data-slick-options='{"slidesToShow": 1, "autoplay":true}'>

                    {{-- Loop only 4 latest properties here --}}
                    @foreach ($slideproperties as $property)
                    <div class="box px-0">
                      <div class="card border-0">
                        <img src="/storage/{{ $property->image }}" class="card-img img-fluid-responsive-2" alt="{{ $property->title }}">
                        <div class="card-img-overlay d-flex flex-column bg-gradient-3 rounded-lg">
                          <div class="d-flex mb-auto">
                            <a href="#" class="mr-1 badge badge-orange">featured</a>
                            <a href="#" class="badge badge-indigo">{{ $property->lint_in }}</a>
                          </div>
                          <div class="px-2 pb-2">
                            <a href="{{ route('gh.property.show', $property->id) }}" class="text-white"><h5 class="card-title fs-16 lh-2 mb-0">{{ $property->title }}</h5>
                            </a>
                            <p class="card-text text-gray-light mb-0 font-weight-500">{{ $property->address }}</p>
                            <p class="text-white mb-0"><span class="fs-17 font-weight-bold">#{{ $property->price }} </span>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach


                  </div>
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
