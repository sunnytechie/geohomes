<title>{{ $property->title }}</title>
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
.MapPlaceHolder {
    max-height: 200px;
}

  .map {
    margin-bottom: 20px; /* Adjust the margin as needed */
  }

  @media only screen and (max-width: 1024px) {
    .hide-from-mobile {
    margin-top: 10px !important;
  }
}
  
</style>
    
<main id="content">
    <section>
      <div class="spacer mt-15 hide-from-mobile"></div>
      {{--<div class="container">
         <nav aria-label="breadcrumb">
          <ol class="breadcrumb pt-lg-0 pb-3">
            <li class="breadcrumb-item fs-12 letter-spacing-087">
              <a href=".">Home</a>
            </li>
            <li class="breadcrumb-item fs-12 letter-spacing-087">
              <a href="listing-grid-with-left-filter.html">Listing</a>
            </li>
            <li class="breadcrumb-item fs-12 letter-spacing-087 active">Villa on Hollywood Boulevard</li>
          </ol>
        </nav>
      </div> --}}
     
      <div class="container-fluid">
        <div class="position-relative" data-animate="zoomIn">
            
            <div class="row galleries m-n1">
              <div class="col-lg-6 p-1">
                <div class="item item-size-4-3">
                  <div class="card p-0">
                    {{-- <div class="card p-0 hover-zoom-in"> --}}
                    <a href="/storage/{{ $property->image }}" class="card-img"
                          data-gtf-mfp="true"
                          data-gallery-id="01"
                          style="background-image:url('/storage/{{ $property->image }}')">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 p-1">
                <div class="row m-n1">
                  @php
                      $images = ["$property->file1", "$property->file2", "$property->file3", "$property->file4"];
                  @endphp
                  @foreach ($images as $image)
                  @if ($image)
                      <div class="col-md-6 p-1">
                          <div class="item item-size-4-3">
                              <div class="card p-0 hover-zoom-in">
                                  <a href="/storage/{{ $image }}" class="card-img"
                                    data-gtf-mfp="true"
                                    data-gallery-id="01"
                                    style="background-image:url('/storage/{{ $image }}')">
                                  </a>
                              </div>
                          </div>
                      </div>
                  @endif
                  @endforeach
                </div>
              </div>
              </div>
            </div>
        </div>
      </div>
  </section>
  
  <div class="primary-content pt-8">
    <div class="container">
      <div class="row">
        <article class="col-lg-8 pr-xl-7">
          <section class="pb-7 border-bottom">
            <ul class="list-inline d-sm-flex align-items-sm-center mb-2">
                <li class="list-inline-item badge badge-orange mr-2">Featured</li>
                <li class="list-inline-item badge badge-primary mr-3">{{ $property->lint_in }}</li>
              <li class="list-inline-item mr-2 mt-2 mt-sm-0"><i class="fal fa-clock mr-1"></i>{{ \Carbon\Carbon::parse($property->created_at)->diffForHumans() }}
              </li>
              <li class="list-inline-item mt-2 mt-sm-0"><i class="fal fa-eye mr-1"></i>{{ $property->views }} views</li>
            </ul>
            <div class="d-sm-flex justify-content-sm-between">
              <div>
                <h2 class="fs-35 font-weight-600 lh-15 text-heading">{{ $property->title }}</h2>
                <p class="mb-0"><i class="fal fa-map-marker-alt mr-2"></i>{{ $property->address }}, {{ $property->state }}, {{ $property->country }}</p>
              </div>
              <div class="mt-2 text-lg-right">
                <p class="fs-22 text-heading font-weight-bold mb-0">₦ {{ $property->price }}</p>
                {{-- <p class="mb-0">$9350/SqFt</p> --}}
              </div>
            </div>
            <h4 class="fs-22 text-heading mt-6 mb-2">Description</h4>
            <p class="mb-0 lh-214">{{ $property->description }}</p>
          </section>

          <section class="pt-6 border-bottom">
            <h4 class="fs-22 text-heading mb-6">Features</h4>
            <div class="row">
              <div class="col-lg-3 col-sm-4 mb-6">
                <div class="media">
                  {{-- <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                    <svg class="icon icon-family fs-32 text-primary">
                      <use xlink:href="#icon-family"></use>
                    </svg>
                  </div> --}}
                  <div class="media-body">
                    <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Type</h5>
                    <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $property->house_type }}</p>
                  </div>
                </div>
              </div>
              {{-- <div class="col-lg-3 col-sm-4 mb-6">
                <div class="media">
                  <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                    <svg class="icon icon-year fs-32 text-primary">
                      <use xlink:href="#icon-year"></use>
                    </svg>
                  </div>
                  <div class="media-body">
                    <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">year built</h5>
                    <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $property->year_built }}</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-4 mb-6">
                <div class="media">
                  <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                    <svg class="icon icon-heating fs-32 text-primary">
                      <use xlink:href="#icon-heating"></use>
                    </svg>
                  </div>
                  <div class="media-body">
                    <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">heating</h5>
                    <p class="mb-0 fs-13 font-weight-bold text-heading">-</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-4 mb-6">
                <div class="media">
                  <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                    <svg class="icon icon-price fs-32 text-primary">
                      <use xlink:href="#icon-price"></use>
                    </svg>
                  </div>
                  <div class="media-body">
                    <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">SQFT(Size in Fit)</h5>
                    <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $property->size_in_fit }}</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-4 mb-6">
                <div class="media">
                  <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                    <svg class="icon icon-bedroom fs-32 text-primary">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                  </div>
                  <div class="media-body">
                    <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Bedrooms</h5>
                    <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $property->bedrooms }}</p>
                  </div>
                </div>
              </div> --}}
              {{-- <div class="col-lg-3 col-sm-4 mb-6">
                <div class="media">
                  <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                    <svg class="icon icon-sofa fs-32 text-primary">
                      <use xlink:href="#icon-sofa"></use>
                    </svg>
                  </div>
                  <div class="media-body">
                    <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">bathrooms</h5>
                    <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $property->bathrooms }}</p>
                  </div>
                </div>
              </div> --}}
              {{-- <div class="col-lg-3 col-sm-4 mb-6">
                <div class="media">
                  <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                    <svg class="icon icon-Garage fs-32 text-primary">
                      <use xlink:href="#icon-Garage"></use>
                    </svg>
                  </div>
                  <div class="media-body">
                    <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">GARAGE</h5>
                    <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $property->garages }}</p>
                  </div>
                </div>
              </div> --}}
              <div class="col-lg-3 col-sm-4 mb-6">
                <div class="media">
                  {{-- <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                    <svg class="icon icon-status fs-32 text-primary">
                      <use xlink:href="#icon-status"></use>
                    </svg>
                  </div> --}}
                  <div class="media-body">
                    <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Status</h5>
                    <p class="mb-0 fs-13 font-weight-bold text-heading">Active</p>
                  </div>
                </div>
              </div>
            </div>
          </section>


          <section class="pt-6 border-bottom pb-4">
            <h4 class="fs-22 text-heading mb-4">Additional Details</h4>
            <div class="row">
              <dl class="col-sm-6 mb-0 d-flex">
                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Property ID</dt>
                <dd>{{ $property->id }}</dd>
              </dl>
              <dl class="col-sm-6 mb-0 d-flex">
                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Price</dt>
                <dd>#{{ $property->price }}</dd>
              </dl>
              <dl class="col-sm-6 mb-0 d-flex">
                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Property type</dt>
                <dd>{{ $property->house_type }}</dd>
              </dl>
              <dl class="col-sm-6 mb-0 d-flex">
                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Property status</dt>
                <dd>For Sale</dd>
              </dl>
              {{-- <dl class="col-sm-6 mb-0 d-flex">
                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Rooms</dt>
                <dd>{{ $property->rooms }}</dd>
              </dl>
              <dl class="col-sm-6 mb-0 d-flex">
                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Bedrooms</dt>
                <dd>{{ $property->bedrooms }}</dd>
              </dl>
              <dl class="col-sm-6 mb-0 d-flex">
                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Size</dt>
                <dd>{{ $property->lot_size_in_fit }}</dd>
              </dl>
              <dl class="col-sm-6 mb-0 d-flex">
                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Bathrooms</dt>
                <dd>{{ $property->bathrooms }}</dd>
              </dl>
              <dl class="col-sm-6 mb-0 d-flex">
                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Garage</dt>
                <dd>{{ $property->garages }}</dd>
              </dl>
              <dl class="col-sm-6 mb-0 d-flex">
                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Bathrooms</dt>
                <dd>{{ $property->bathrooms }}</dd>
              </dl>
              <dl class="col-sm-6 mb-0 d-flex">
                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Garage size</dt>
                <dd>{{ $property->garage_size }}</dd>
              </dl>
              <dl class="col-sm-6 mb-0 d-flex">
                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Year build</dt>
                <dd>{{ $property->year_built }}</dd>
              </dl> --}}
              <dl class="offset-sm-6 col-sm-6 mb-0 d-flex">
                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Label</dt>
                <dd>{{ $property->lint_in }}</dd>
              </dl>
            </div>
          </section>

        </article>
  
        <aside class="col-lg-4 pl-xl-4 primary-sidebar sidebar-sticky" id="sidebar">
            <div class="primary-sidebar-inner">
                <div class="card border-0 widget-request-tour">
                  <ul class="nav nav-tabs d-flex" role="tablist">
                    <li class="nav-item" style="font-size: 20px">
                      Contact Agent
                    </li>
                  </ul>
                  <div class=" spacer p-2"></div>
                  <div class="card-body px-sm-6 shadow-xxs-2 pb-5 pt-0">
                    
                      <div class="pt-1 pb-0 px-0 shadow-none">
                        <div class="d-flex align-items-center">
                          
                          @if ($property->user && $property->user->image)
                          <a href="#" class="d-block w-60px h-60 mr-3">
                            <img src="/storage/{{ $property->user->image }}" class="rounded-circle" alt="{{ $property->user->name }}">
                          </a>
                          @else
                              <span>No contact available</span>
                          @endif
                            <div>
                              @if ($property->user && $property->user->position)
                              <p class="mb-0 fs-13 mb-0 lh-17">{{ $property->user->position }}</p>
                              @endif
                              @if ($property->user && $property->user->phone)
                                <p class="mb-0 fs-13 mb-0 lh-17"><span class="text-heading d-inline-block ml-2">{{ $property->user->phone }}</span>
                                  @endif 
                                @if ($property->user && $property->user->address)
                                <p class="mb-0 fs-13 mb-0 lh-17"><span class="text-heading d-inline-block ml-2">{{ $property->user->address }}</span> 
                                  @endif          
                              </p>
                            </div>
                          </div>
                      </div>
                   
                  </div>
                </div>
              </div>
        </aside>
      </div>
    </div>
  </div>
  
  <div class="mt-10"></div>
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