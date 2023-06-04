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
    <section class="bg-secondary mt-12">
      <div class="container">
        {{-- Desktop --}}
        <form class="property-search d-none d-lg-block">
          <div class="row align-items-lg-center" id="accordion-2">
            <div class="col-xl-2 col-lg-3 col-md-4">
              <div class="property-search-status-tab d-flex flex-row">
                <input class="search-field" type="hidden" name="status" value="for-rent"
                             data-default-value="">
                <button type="button" data-value="for-rent"
                              class="btn shadow-none btn-active-primary text-white rounded-0 hover-white text-uppercase h-lg-80 border-right-0 border-top-0 border-bottom-0 border-left border-white-opacity-03 active flex-md-1">
                  Rent
                </button>
                <button type="button" data-value="for-sale"
                              class="btn shadow-none btn-active-primary text-white rounded-0 hover-white text-uppercase h-lg-80 border-left-0 border-top-0 border-bottom-0 border-right border-white-opacity-03 flex-md-1">
                  Sale
                </button>
              </div>
            </div>
            <div class="col-xl-8 col-lg-7 d-md-flex">
              <select class="form-control shadow-none form-control-lg selectpicker rounded-right-md-0 rounded-md-top-left-0 rounded-lg-top-left flex-md-1 mt-3 mt-md-0"
                          title="All Types" data-style="btn-lg py-2 h-52 border-right bg-white" id="type-1"
                          name="type">
                <option>Condominium</option>
                <option>Single-Family Home</option>
                <option>Townhouse</option>
                <option>Multi-Family Home</option>
              </select>
              <div class="form-group mb-0 position-relative flex-md-3 mt-3 mt-md-0">
                <input type="text"
                             class="form-control form-control-lg border-0 shadow-none rounded-left-md-0 pr-8 bg-white placeholder-muted"
                             id="key-word-1" name="key-word"
                             placeholder="Enter an address, neighbourhood...">
                <button type="submit"
                              class="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 mr-4 shadow-none">
                  <i class="far fa-search"></i>
                </button>
              </div>
            </div>
            <div class="col-lg-2">
              <a href="#advanced-search-filters-2"
                     class="icon-primary btn advanced-search w-100 shadow-none text-white text-left rounded-0 fs-14 font-weight-600 position-relative collapsed px-0 d-flex align-items-center"
                     data-toggle="collapse" data-target="#advanced-search-filters-2" aria-expanded="true"
                     aria-controls="advanced-search-filters-2">
                Advanced Search
              </a>
            </div>
            <div id="advanced-search-filters-2" class="col-12 pb-6 pt-lg-2 collapse" data-parent="#accordion-2">
              <div class="row mx-n2">
                <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                  <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                  name="status"
                                  title="Status" data-style="btn-lg py-2 h-52 bg-white">
                    <option>All status</option>
                    <option>For Rent</option>
                    <option>For Sale</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                  <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                  name="bedroom"
                                  title="Bedrooms" data-style="btn-lg py-2 h-52 bg-white">
                    <option>All Bedrooms</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                  <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                  name="bathrooms"
                                  title="Bathrooms" data-style="btn-lg py-2 h-52 bg-white">
                    <option>All Bathrooms</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                  <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                  title="All Cities" data-style="btn-lg py-2 h-52 bg-white" name="city">
                    <option>All Cities</option>
                    <option>Abuja</option>
                    <option>Enugu</option>
                  </select>
                </div>
                
              </div>
              
             
            </div>
          </div>
        </form>

        {{-- Mobile --}}
        <form class="property-search property-search-mobile d-lg-none py-6">
          <div class="row align-items-lg-center" id="accordion-2-mobile">
            <div class="col-12">
              <div class="form-group mb-0 position-relative">
                <a href="#advanced-search-filters-2-mobile"
                         class="icon-primary btn advanced-search shadow-none pr-3 pl-0 d-flex align-items-center position-absolute pos-fixed-left-center py-0 h-100 border-right collapsed"
                         data-toggle="collapse" data-target="#advanced-search-filters-2-mobile"
                         aria-expanded="true"
                         aria-controls="advanced-search-filters-2-mobile">
                </a>
                <input type="text"
                             class="form-control form-control-lg border-0 shadow-none pr-9 pl-11 bg-white placeholder-muted"
                             name="key-word"
                             placeholder="Search...">
                <button type="submit"
                              class="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 px-3 shadow-none h-100 border-left bg-white">
                  <i class="far fa-search"></i>
                </button>
              </div>
            </div>
            <div id="advanced-search-filters-2-mobile" class="col-12 pt-2 collapse"
                   data-parent="#accordion-2-mobile">
              <div class="row mx-n2">
                <div class="col-sm-6 pt-4 px-2">
                  <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                  title="Select" data-style="btn-lg py-2 h-52 bg-white" name="type">
                    <option>All status</option>
                    <option>For Rent</option>
                    <option>For Sale</option>
                  </select>
                </div>
                <div class="col-sm-6 pt-4 px-2">
                  <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                  title="All Types" data-style="btn-lg py-2 h-52 bg-white" name="type">
                    <option>Condominium</option>
                    <option>Single-Family Home</option>
                    <option>Townhouse</option>
                    <option>Multi-Family Home</option>
                  </select>
                </div>
                <div class="col-sm-6 pt-4 px-2">
                  <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                  name="bedroom"
                                  title="Bedrooms" data-style="btn-lg py-2 h-52 bg-white">
                    <option>All Bedrooms</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </div>
                <div class="col-sm-6 pt-4 px-2">
                  <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                  name="bathrooms"
                                  title="Bathrooms" data-style="btn-lg py-2 h-52 bg-white">
                    <option>All Bathrooms</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </div>
                <div class="col-sm-6 pt-4 px-2">
                  <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                  title="All Cities" data-style="btn-lg py-2 h-52 bg-white" name="city">
                    <option>All Cities</option>
                    <option>New York</option>
                    <option>Los Angeles</option>
                    <option>Chicago</option>
                    <option>Houston</option>
                    <option>San Diego</option>
                    <option>Las Vegas</option>
                    <option>Las Vegas</option>
                    <option>Atlanta</option>
                  </select>
                </div>
                <div class="col-sm-6 pt-4 px-2">
                  <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                  name="areas"
                                  title="All Areas" data-style="btn-lg py-2 h-52 bg-white">
                    <option>All Areas</option>
                    <option>Abuja</option>
                    <option>Enugu</option>
                  </select>
                </div>
              </div>
              
            </div>
          </div>
        </form>
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
          <div class="col-lg-4 order-2 order-lg-1 primary-sidebar sidebar-sticky" id="sidebar">
            <div class="primary-sidebar-inner">

              {{-- Newsletter --}}
              <div class="card mb-4">
                <div class="card-body px-6 py-4">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-1">Newsletter Sign Up</h4>
                  <p class="card-text mb-5">Subscribe to new letter to receive exclusive offer and the latest
                    news</p>
                  <form>
                    <div class="form-group mb-3">
                      <label for="name" class="sr-only">Email</label>
                      <input type="text" class="form-control form-control-lg border-0 shadow-none"
                                         id="name"
                                         name="email"
                                         placeholder="Enter your email">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-none mb-2">
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
                    <div class="box px-0">
                      <div class="card border-0">
                        <img src="assets/images/feature-property-01.jpg" class="card-img" alt="Villa on Hollywood Boulevard">
                        <div class="card-img-overlay d-flex flex-column bg-gradient-3 rounded-lg">
                          <div class="d-flex mb-auto">
                            <a href="#" class="mr-1 badge badge-orange">featured</a>
                            <a href="#" class="badge badge-indigo">for Rent</a>
                          </div>
                          <div class="px-2 pb-2">
                            <a href="single-property-1.html" class="text-white"><h5 class="card-title fs-16 lh-2 mb-0">Villa on Hollywood Boulevard</h5>
                            </a>
                            <p class="card-text text-gray-light mb-0 font-weight-500">1421 San
                              Predro
                              St, Los Angeles</p>
                            <p class="text-white mb-0"><span class="fs-17 font-weight-bold">$2500 </span>/month
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>

                    
                  </div>
                </div>
              </div>

              {{-- Destination --}}
              <div class="card city-widget mb-4">
                <div class="card-body px-6 py-4">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-3">Destinations</h4>
                  <div class="row no-gutters m-n1">
                    
                    {{-- Loop latest 4  --}}
                    <div class="col-6 p-1">
                      <a href="listing-with-left-sidebar.html" class="card hover-zoom-in">
                        <div class="card-img bg-img" style="background-image: url('assets/images/small-los-angeles.jpg');background-size: cover;background-position: center"></div>
                        <div class="card-img-overlay bg-gradient-3 rounded-lg d-flex align-items-end">
                          <p class="card-text font-weight-500 lh-1 text-white">Los Angeles</p>
                        </div>
                      </a>
                    </div>

                  </div>
                </div>
              </div>


              <div class="card">
                <div class="card-body px-6 py-4">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-2">Agents</h4>
                  <ul class="list-group list-group-flush">

                    {{-- Loop 3 agents --}}
                    <li class="list-group-item px-0 pb-3 pt-0">
                      <div class="media align-items-center">
                        <a href="agent-details-1.html" class="d-block w-60px h-60 mr-3">
                          <img src="assets/images/agent-1.jpg" class="rounded-circle" alt="agent">
                        </a>
                        <div class="media-body">
                          <a href="agent-details-1.html" class="text-muted hover-dark font-weight-500 mb-0 lh-214">Oliver
                            Beddows</a>
                          <p class="mb-0 fs-13 mb-0 lh-2">Sales Excutive</p>
                          {{-- <ul class="list-inline mb-0">
                            <li class="list-inline-item fs-13 text-heading font-weight-500">4.8/5
                            </li>
                            <li class="list-inline-item fs-13 text-heading font-weight-500">
                              <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-0">
                                  <span class="text-warning fs-12 lh-2"><i
                                                              class="fas fa-star"></i></span>
                                </li>
                                <li class="list-inline-item mr-0">
                                  <span class="text-warning fs-12 lh-2"><i class="fas fa-star"></i></span>
                                </li>
                                <li class="list-inline-item mr-0">
                                  <span class="text-warning fs-12 lh-2"><i
                                                              class="fas fa-star"></i></span>
                                </li>
                                <li class="list-inline-item mr-0">
                                  <span class="text-warning fs-12 lh-2"><i
                                                              class="fas fa-star"></i></span>
                                </li>
                                <li class="list-inline-item mr-0">
                                  <span class="text-warning fs-12 lh-2"><i
                                                              class="fas fa-star"></i></span>
                                </li>
                              </ul>
                            </li>
                          </ul> --}}
                        </div>
                      </div>
                    </li>

                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 mb-8 mb-lg-0 order-1 order-lg-2">
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