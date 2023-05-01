@extends('layouts.app')

@section('content')
<style>
  .remove-this-item {
    display: none !important;
  }
</style>

<main id="content">
    <section class="pb-8 page-title mt-12 shadow">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pt-6 pt-lg-2 lh-15 pb-5">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listing</li>
          </ol>
          <h1 class="fs-30 lh-1 mb-0 text-heading font-weight-600">Find a property from our list.</h1>
        </nav>
      </div>
    </section>
    <section class="pt-8 pb-11 bg-gray-01">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 order-2 order-lg-1 primary-sidebar sidebar-sticky" id="sidebar">
            <div class="primary-sidebar-inner">
              <div class="card mb-4">
                <div class="card-body px-6 py-4">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-3">Find your home</h4>
                  <form>
                    <div class="form-group">
                      <label for="key-word" class="sr-only">Key Word</label>
                      <input type="text" class="form-control form-control-lg border-0 shadow-none"
                                         id="key-word" name="search"
                                         placeholder="Enter keyword...">
                    </div>
                    <div class="form-group">
                      <label for="location" class="sr-only">Location</label>
                      <select class="form-control border-0 shadow-none form-control-lg selectpicker"
                                          name="location"
                                          title="Location" data-style="btn-lg py-2 h-52" id="location">
                        <option>Austin</option>
                        <option>Boston</option>
                        <option>Chicago</option>
                        <option>Denver</option>
                        <option>Los Angeles</option>
                        <option>New York</option>
                        <option>San Francisco</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="type" class="sr-only">Type</label>
                      <select class="form-control border-0 shadow-none form-control-lg selectpicker"
                                          name="type"
                                          title="All Types" data-style="btn-lg py-2 h-52" id="type">
                        <option>Apartment</option>
                        <option>Condo</option>
                        <option>Lot</option>
                        <option>Multi Family Home</option>
                        <option>Office</option>
                        <option>Shop</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="status" class="sr-only">Status</label>
                      <select class="form-control border-0 shadow-none form-control-lg selectpicker"
                                          title="All Status" data-style="btn-lg py-2 h-52" id="status" name="status">
                        <option>For Rent</option>
                        <option>For Sale</option>
                      </select>
                    </div>
                    <div class="form-row mb-4">
                      <div class="col">
                        <label for="bed" class="sr-only">Beds</label>
                        <select class="form-control border-0 shadow-none form-control-lg selectpicker"
                                              title="Beds" data-style="btn-lg py-2 h-52" id="bed" name="beds">
                          <option>3</option>
                          <option>4</option>
                        </select>
                      </div>
                      <div class="col">
                        <label for="baths" class="sr-only">Baths</label>
                        <select class="form-control border-0 shadow-none form-control-lg selectpicker"
                                              title="Baths" data-style="btn-lg py-2 h-52" id="baths" name="baths">
                          <option>3</option>
                          <option>4</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group slider-range slider-range-secondary">
                      <label for="price" class="mb-4 text-gray-light">Price Range</label>
                      <div data-slider="true"
                                       data-slider-options='{"min":0,"max":8000000,"values":[1000000,5000000],"type":"currency"}'></div>
                      <div class="text-center mt-2">
                        <input id="price" type="text" readonly name="price"
                                             class="border-0 amount text-center text-body font-weight-500">
                      </div>
                    </div>
                    <div class="form-group slider-range slider-range-secondary">
                      <label for="area-size" class="mb-4 text-gray-light">Area Size</label>
                      <div data-slider="true"
                                       data-slider-options='{"min":0,"max":15000,"values":[50,15000],"type":"sqrt"}'></div>
                      <div class="text-center mt-2">
                        <input id="area-size" type="text" readonly name="area"
                                             class="border-0 amount text-center text-body font-weight-500">
                      </div>
                    </div>
                    <a class="lh-17 d-inline-block" data-toggle="collapse" href="#other-feature"
                                 role="button"
                                 aria-expanded="false" aria-controls="other-feature">
                      <span class="text-primary d-inline-block mr-1"><i
                                          class="far fa-plus-square"></i></span>
                      <span class="fs-15 text-heading font-weight-500 hover-primary">Other Features</span>
                    </a>
                    <div class="collapse" id="other-feature">
                      <div class="card card-body border-0 px-0 pb-0 pt-3">
                        <ul class="list-group list-group-no-border">
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check1">
                              <label class="custom-control-label" for="check1">Air
                                Conditioning</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check2">
                              <label class="custom-control-label" for="check2">Laundry</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check3">
                              <label class="custom-control-label"
                                                         for="check3">Refrigerator</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check4">
                              <label class="custom-control-label" for="check4">Washer</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check5">
                              <label class="custom-control-label" for="check5">Barbeque</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check6">
                              <label class="custom-control-label" for="check6">Lawn</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check7">
                              <label class="custom-control-label" for="check7">Sauna</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check8">
                              <label class="custom-control-label" for="check8">WiFi</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check9">
                              <label class="custom-control-label" for="check9">Dryer</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check10">
                              <label class="custom-control-label" for="check10">Microwave</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check11">
                              <label class="custom-control-label" for="check11">Swimming
                                Pool</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check12">
                              <label class="custom-control-label" for="check12">Window
                                Coverings</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check13">
                              <label class="custom-control-label" for="check13">Gym</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check14">
                              <label class="custom-control-label" for="check14">Outdoor
                                Shower</label>
                            </div>
                          </li>
                          <li class="list-group-item px-0 pt-0 pb-2">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                                         name="features[]" id="check15">
                              <label class="custom-control-label" for="check15">TV Cable</label>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-none mt-4">Search
                    </button>
                  </form>
                </div>
              </div>

              <div class="card property-widget mb-4">
                <div class="card-body px-6 pt-5 pb-6">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-3">Featured Properties</h4>
                  <div class="slick-slider mx-0" data-slick-options='{"slidesToShow": 1, "autoplay":true}'>
                    
                    {{-- Slide only 3 feautured properties --}}
                    <div class="box px-0">
                      <div class="card border-0">
                        <img src="{{ asset('assets/images/feature-property-01.jpg') }}" class="card-img" alt="Abuja">
                        <div class="card-img-overlay d-flex flex-column bg-gradient-3 rounded-lg">
                          <div class="d-flex mb-auto">
                            <a href="#" class="mr-1 badge badge-orange">featured</a>
                            <a href="#" class="badge badge-indigo">for Rent</a>
                          </div>
                          <div class="px-2 pb-2">
                            <a href="#" class="text-white">
                              <h5 class="card-title fs-16 lh-2 mb-0">Gwagwaladi area 1</h5>
                            </a>
                            <p class="card-text text-gray-light mb-0 font-weight-500">1421 San Predro St, Nigeria</p>
                            <p class="text-white mb-0">
                              <span class="fs-17 font-weight-bold">$2500 </span>/month
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>

                    
                  </div>
                </div>
              </div>


              <div class="card">
                <div class="card-body px-6 py-4">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-3">Latest News</h4>
                  <ul class="list-group list-group-flush">

                    {{-- List three latest news --}}
                    <li class="list-group-item px-0 pt-0 pb-3">
                      <div class="media">
                        <div class="position-relative mr-3">
                          <a href="#" class="d-block w-100px rounded pt-11 bg-img-cover-center" style="background-image: url('assets/images/post-02.jpg')"></a>
                          <a href="#" class="badge text-white bg-dark-opacity-04 m-1 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute pos-fixed-top">
                            creative
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="fs-14 lh-186 mb-1">
                            <a href="#" class="text-dark hover-primary">
                              Retail banks wake up to digital lending this year
                            </a>
                          </h4>
                          <div class="text-gray-light">
                            Dec 16, 2018
                          </div>
                        </div>
                      </div>
                    </li>
                    
                  </ul>
                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-8 mb-8 mb-lg-0 order-1 order-lg-2">
            <div class="row align-items-sm-center mb-4">

              <div class="col-md-6">
                <h2 class="fs-15 text-dark mb-0">We found <span class="text-primary">1</span> properties
                  available for you
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
                                 href="listing-grid-with-left-filter.html">
                      <i class="fa fa-th-large"></i>
                    </a>
                  </div>
                </div>
              </div>


            </div>

            <div class="py-5 px-4 border rounded-lg shadow-hover-1 bg-white mb-4" data-animate="fadeInUp">
              <div class="media flex-column flex-sm-row no-gutters">
                <div class="col-sm-3 mr-sm-5 card border-0 hover-change-image bg-hover-overlay mb-sm-5">
                  <img src="{{ asset('assets/images/properties-list-03.jpg') }}" class="card-img" alt="Home in Metric Way">
                  <div class="card-img-overlay p-2">
                    <ul class="list-inline mb-0 d-flex justify-content-center align-items-center h-100 hover-image">
                      <li class="list-inline-item">
                        <a href="#" class="h-40 px-2 border rounded d-inline-flex align-items-center justify-content-center text-heading bg-white border-white bg-hover-primary border-hover-primary hover-white">
                          <i class="far fa-eye"></i> <span class="ml-1">View more</span>
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
            </div>

            {{-- pagination --}}
            <nav class="pt-6">
              <ul class="pagination rounded-active justify-content-center mb-0">
                <li class="page-item"><a class="page-link" href="#"><i class="far fa-angle-double-left"></i></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                <li class="page-item">...</li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="far fa-angle-double-right"></i></a></li>
              </ul>
            </nav>

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