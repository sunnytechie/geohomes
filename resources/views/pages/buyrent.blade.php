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
</style>
    
<main id="content">
    <section class="mt-12" style="background: #00A75A">
      <div class="container">
        @include('snippets.search')
      </div>
    </section>

    <section class="pb-4 page-title shadow">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pt-6 pt-lg-2 lh-15 pb-5">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listing</li>
          </ol>
          <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600">Search result: </h1>
          
        </nav>
      </div>
    </section>
    <section class="pt-8 pb-11 bg-gray-01">
      <div class="container">
        <div class="row">

          
          <div class="col-lg-8 mb-8 mb-lg-0 order-1 order-lg-1">
            {{-- <div class="row align-items-sm-center mb-4">
              <div class="col-md-6">
                <h2 class="fs-15 text-dark mb-0">We found <span class="text-primary">45</span> properties
                  available for
                  you
                </h2>
              </div>
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="d-flex justify-content-md-end align-items-center">
                  <div class="input-group border rounded input-group-lg w-auto bg-white mr-3">
                    <label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3"
                                     for="inputGroupSelect01"><i
                                      class="fas fa-align-left fs-16 pr-2"></i>Sortby:</label>
                    <select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby"
                                      data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3"
                                      id="inputGroupSelect01" name="sortby">
                      <option selected>Top Selling</option>
                      <option value="1">Most Viewed</option>
                      <option value="2">Price(low to high)</option>
                      <option value="3">Price(high to low)</option>
                    </select>
                  </div>
                  <div class="d-none d-md-block">
                    <a class="fs-sm-18 text-dark" href="#">
                      <i class="fas fa-list"></i>
                    </a>
                    <a class="fs-sm-18 text-dark opacity-2 ml-5"
                                 href="listing-grid-with-left-sidebar.html">
                      <i class="fa fa-th-large"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div> --}}
            
            {{-- Loop filtered result --}}
            {{-- <div class="py-5 px-4 border rounded-lg shadow-hover-1 bg-white mb-4" data-animate="fadeInUp">
              <div class="media flex-column flex-sm-row no-gutters">
                <div class="col-sm-3 mr-sm-5 card border-0 hover-change-image bg-hover-overlay mb-sm-5">
                  <img src="assets/images/properties-list-03.jpg" class="card-img"
                               alt="Home in Metric Way">
                  <div class="card-img-overlay p-2">
                    <ul class="list-inline mb-0 d-flex justify-content-center align-items-center h-100 hover-image">
                      <li class="list-inline-item">
                        <a href="#"
                                         class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-heading bg-white border-white bg-hover-primary border-hover-primary hover-white" data-toggle="tooltip" title="Wishlist">
                          <i class="far fa-heart"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#"
                                         class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-heading bg-white border-white bg-hover-primary border-hover-primary hover-white" data-toggle="tooltip" title="Compare">
                          <i class="fas fa-exchange-alt"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="media-body mt-3 mt-sm-0">
                  <h2 class="my-0"><a href="single-property-1.html"
                                              class="fs-16 lh-2 text-dark hover-primary d-block">Home in Metric Way</a>
                  </h2>
                  <p class="mb-1 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
                  <p class="fs-17 font-weight-bold text-heading mb-1">
                    $1.250.000
                  </p>
                  <p class="mb-2 ml-0">Lorem ipsum dolor sit amet, sectetur cing elit uspe ndisse suscorem ipsum dolor sitorem sit amet, sectetur cing elit uspe ndisse suscorem</p>
                </div>
              </div>
              <div class="d-sm-flex justify-content-sm-between">
                <ul class="list-inline d-flex mb-0 flex-wrap">
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bedroom">
                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                    3 Br
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bathrooms">
                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                      <use xlink:href="#icon-shower"></use>
                    </svg>
                    3 Ba
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Size">
                    <svg class="icon icon-square fs-18 text-primary mr-1">
                      <use xlink:href="#icon-square"></use>
                    </svg>
                    2300 Sq.Ft
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="1 Garage">
                    <svg class="icon icon-Garage fs-18 text-primary mr-1">
                      <use xlink:href="#icon-Garage"></use>
                    </svg>
                    1 Gr
                  </li>
                  <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Year">
                    <svg class="icon icon-year fs-18 text-primary mr-1">
                      <use xlink:href="#icon-year"></use>
                    </svg>
                    2020
                  </li>
                </ul>
                <span class="badge badge-primary mr-xl-2 mt-3 mt-sm-0">For Sale</span>
              </div>
            </div> --}}

            <div>Available soon</div>

            
            {{-- <nav class="pt-6">
              <ul class="pagination rounded-active justify-content-center mb-0">
                <li class="page-item"><a class="page-link" href="#"><i class="far fa-angle-double-left"></i></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                <li class="page-item">...</li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#"><i
                              class="far fa-angle-double-right"></i></a></li>
              </ul>
            </nav> --}}

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
                    @foreach ($properties as $property)
                    <div class="box px-0">
                      <div class="card border-0">
                        <img src="/storage/{{ $property->image }}" class="card-img" alt="{{ $property->title }}">
                        <div class="card-img-overlay d-flex flex-column bg-gradient-3 rounded-lg">
                          <div class="d-flex mb-auto">
                            <a href="#" class="mr-1 badge badge-orange">featured</a>
                            <a href="#" class="badge badge-indigo">{{ $property->lint_in }}</a>
                          </div>
                          <div class="px-2 pb-2">
                            <a href="{{ route('properties.show', $property->id) }}" class="text-white"><h5 class="card-title fs-16 lh-2 mb-0">{{ $property->title }}</h5>
                            </a>
                            <p class="card-text text-gray-light mb-0 font-weight-500">{{ $property->address }}</p>
                            <p class="text-white mb-0"><span class="fs-17 font-weight-bold">{{ $property->price }} </span>
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