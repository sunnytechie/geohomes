@extends('layouts.app')

@section('content')
<style>
    .remove-this-item {
      display: none !important;
    }
</style>
    
<main id="content">
    <section class="bg-secondary mt-12">
      <div class="container">
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
                <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                  <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                  name="areas"
                                  title="All Areas" data-style="btn-lg py-2 h-52 bg-white">
                    <option>All Areas</option>
                    <option>Albany Park</option>
                    <option>Altgeld Gardens</option>
                    <option>Andersonville</option>
                    <option>Beverly</option>
                    <option>Brickel</option>
                    <option>Central City</option>
                    <option>Coconut Grove</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
                  <input type="text"
                                 class="form-control form-control-lg border-0 shadow-none bg-white"
                                 placeholder="Property ID" name="property-id">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-lg-5 pt-6 slider-range slider-range-primary">
                  <label for="price-2" class="mb-4 text-white">Price Range</label>
                  <div data-slider="true"
                               data-slider-options='{"min":0,"max":1000000,"values":[100000,700000],"type":"currency"}'></div>
                  <div class="text-center mt-2">
                    <input id="price-2" type="text" readonly
                                     class="border-0 amount text-center text-white bg-transparent font-weight-500"
                                     name="price">
                  </div>
                </div>
                <div class="col-md-6 col-lg-5 pt-6 slider-range slider-range-primary offset-lg-1">
                  <label for="area-size-2" class="mb-4 text-white">Area Size</label>
                  <div data-slider="true"
                               data-slider-options='{"min":0,"max":15000,"values":[0,12000],"type":"currency"}'></div>
                  <div class="text-center mt-2">
                    <input id="area-size-2" type="text" readonly
                                     class="border-0 amount text-center text-white bg-transparent font-weight-500"
                                     name="area">
                  </div>
                </div>
                <div class="col-12 pt-4 pb-2">
                  <a class="lh-17 d-inline-block other-feature collapsed" data-toggle="collapse"
                             href="#other-feature-2"
                             role="button"
                             aria-expanded="false" aria-controls="other-feature-2">
                    <span class="fs-15 text-white font-weight-500 hover-primary">Other Features</span>
                  </a>
                </div>
                <div class="collapse row mx-0" id="other-feature-2">
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check1-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check1-2">Air
                        Conditioning</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check2-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check2-2">Laundry</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check4-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check4-2">Washer</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check5-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check5-2">Barbeque</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check6-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check6-2">Lawn</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check7-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check7-2">Sauna</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check8-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check8-2">WiFi</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check9-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check9-2">Dryer</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check10-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check10-2">Microwave</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check11-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check11-2">Swimming
                        Pool</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check12-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check12-2">Window
                        Coverings</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check13-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check13-2">Gym</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check14-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check14-2">Outdoor
                        Shower</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check15-2" name="feature[]">
                      <label class="custom-control-label text-white" for="check15-2">TV Cable</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check16-2" name="feature[]">
                      <label class="custom-control-label text-white"
                                         for="check16-2">Refrigerator</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

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
                    <option>Abuja</option>
                  </select>
                </div>
                <div class="col-sm-6 pt-4 px-2">
                  <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                                  name="areas"
                                  title="All Areas" data-style="btn-lg py-2 h-52 bg-white">
                    <option>All Areas</option>
                    <option>Albany Park</option>
                    <option>Altgeld Gardens</option>
                    <option>Andersonville</option>
                    <option>Beverly</option>
                    <option>Brickel</option>
                    <option>Central City</option>
                    <option>Coconut Grove</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 pt-6 slider-range slider-range-primary">
                  <label for="price-2-mobile" class="mb-4 text-white">Price Range</label>
                  <div data-slider="true"
                               data-slider-options='{"min":0,"max":1000000,"values":[100000,700000],"type":"currency"}'></div>
                  <div class="text-center mt-2">
                    <input id="price-2-mobile" type="text" readonly
                                     class="border-0 amount text-center text-white bg-transparent font-weight-500"
                                     name="price">
                  </div>
                </div>
                <div class="col-md-6 pt-6 slider-range slider-range-primary">
                  <label for="area-size-2-mobile" class="mb-4 text-white">Area Size</label>
                  <div data-slider="true"
                               data-slider-options='{"min":0,"max":15000,"values":[0,12000],"type":"sqrt"}'></div>
                  <div class="text-center mt-2">
                    <input id="area-size-2-mobile" type="text" readonly
                                     class="border-0 amount text-center text-white bg-transparent font-weight-500"
                                     name="area">
                  </div>
                </div>
                <div class="col-12 pt-4 pb-2">
                  <a class="lh-17 d-inline-block other-feature collapsed" data-toggle="collapse"
                             href="#other-feature-2-mobile"
                             role="button"
                             aria-expanded="false" aria-controls="other-feature-2-mobile">
                    <span class="fs-15 text-white font-weight-500 hover-primary">Other Features</span>
                  </a>
                </div>
                <div class="collapse row mx-0" id="other-feature-2-mobile">
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check1-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check1-2-mobile">Air
                        Conditioning</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check2-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check2-2-mobile">Laundry</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check4-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check4-2-mobile">Washer</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check5-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check5-2-mobile">Barbeque</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check6-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check6-2-mobile">Lawn</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check7-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check7-2-mobile">Sauna</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check8-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check8-2-mobile">WiFi</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check9-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check9-2-mobile">Dryer</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check10-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check10-2-mobile">Microwave</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check11-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check11-2-mobile">Swimming
                        Pool</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check12-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check12-2-mobile">Window
                        Coverings</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check13-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check13-2-mobile">Gym</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check14-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check14-2-mobile">Outdoor
                        Shower</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check15-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white" for="check15-2-mobile">TV Cable</label>
                    </div>
                  </div>
                  <div class="col-sm-6 py-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"
                                         id="check16-2-mobile" name="feature[]">
                      <label class="custom-control-label text-white"
                                         for="check16-2-mobile">Refrigerator</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>


    <section class="py-14 py-lg-17 page-title bg-overlay-opacity-02"
       style="background-image: url('assets/images/BG4.jpg');background-size: cover;background-position: center">
      <div class="container">
        <h1 class="fs-22 fs-md-42 lh-15 mb-8 mb-lg-13 font-weight-normal text-center mxw-774 pt-2 text-white position-relative z-index-3" data-animate="fadeInDown">
          For more
          information about our services, get in touch with our expert consultants</h1>
      </div>
    </section>


    <section>
      <div class="container">
        <div class="card border-0 mt-n13 z-index-3 pb-8 pt-10">
          <div class="card-body p-0">
            <h2 class="text-heading mb-2 fs-22 fs-md-32 text-center lh-16">We're always eager to hear from
              you!</h2>
            <p class="text-center mxw-670 mb-8">
              Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscorem ipsum dolor sit ametcipsum
              ipsumg consec tetur cing elitelit.
            </p>
            <form class="mxw-751 px-md-5">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" placeholder="First Name"
                                     class="form-control form-control-lg border-0" name="first-name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" placeholder="Last Name" name="last-name"
                                     class="form-control form-control-lg border-0">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input placeholder="Your Email"
                                     class="form-control form-control-lg border-0"
                                     type="email" name="email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" placeholder="Your Phone" name="phone"
                                     class="form-control form-control-lg border-0">
                  </div>
                </div>
              </div>
              <div class="form-group mb-6">
                <textarea class="form-control border-0" placeholder="Message" name="message"
                                rows="5"></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary px-9">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mb-12">
          <div class="col-md-4 mb-6">
            <div class="card border-0">
              <div class="media align-items-end">
                <span class="text-primary fs-40 lh-1 d-inline-block mr-3">
                  <svg class="icon icon-f1"><use xlink:href="#icon-f1"></use></svg>
                </span>
                <div class="media-body">
                  <h4 class="fs-22 lh-15 mb-0 text-heading">San Francisco</h4>
                </div>
              </div>
              <div class="card-body px-0 pt-3 pb-0">
                <p class="card-text mb-0">
                  58 Howard Street #2 San Francisco, CA 941
                </p>
                <a href="tel:12390068668"
                         class="d-block text-heading lh-2 hover-primary text-decoration-none">123 900
                  68668</a>
                <a href="mailto:contact.sanfrancisco@homeid.com"
                         class="d-block text-body hover-primary text-decoration-none">contact.sanfrancisco@homeid.com</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-6">
            <div class="card border-0">
              <div class="media align-items-end">
                <span class="text-primary fs-40 lh-1 d-inline-block mr-3">
                  <svg class="icon icon-f2"><use xlink:href="#icon-f2"></use></svg>
                </span>
                <div class="media-body">
                  <h4 class="fs-22 lh-15 mb-0 text-heading">New York</h4>
                </div>
              </div>
              <div class="card-body px-0 pt-3 pb-0">
                <p class="card-text mb-0">
                  5685 Hunter Estates, New York
                </p>
                <a href="tel:123-900-68668"
                         class="d-block text-heading lh-2 hover-primary text-decoration-none">123 900
                  68668</a>
                <a href="mailto:contact.newyork@homeid.com"
                         class="d-block text-body hover-primary text-decoration-none">contact.newyork@homeid.com</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-6">
            <div class="card border-0">
              <div class="media align-items-end">
                <span class="text-primary fs-40 lh-1 d-inline-block mr-3">
                  <svg class="icon icon-f3"><use xlink:href="#icon-f3"></use></svg>
                </span>
                <div class="media-body">
                  <h4 class="fs-22 lh-15 mb-0 text-heading">Russia</h4>
                </div>
              </div>
              <div class="card-body px-0 pt-3 pb-0">
                <p class="card-text mb-0">
                  42 Lockman Gardens, Russia
                </p>
                <a href="tel:123-900-68668"
                         class="d-block text-heading lh-2 hover-primary text-decoration-none">123 900
                  68668</a>
                <a href="mailto:contact.russia@homeid.com"
                         class="d-block text-body hover-primary text-decoration-none">contact.russia@homeid.com</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section>
        <div id="map" class="mapbox-gl map-point-animate"
        style="height: 550px"
        data-mapbox-access-token="pk.eyJ1IjoiZHVvbmdsaCIsImEiOiJjanJnNHQ4czExMzhyNDVwdWo5bW13ZmtnIn0.f1bmXQsS6o4bzFFJc8RCcQ"
        data-mapbox-options='{"center":[-73.981566, 40.739011],"setLngLat":[-73.981566, 40.739011]}'
        data-mapbox-marker='[{"position":[-73.981566, 40.739011],"className":"marker","backgroundImage":"assets/images/googlle-market-01.png","backgroundRepeat":"no-repeat","width":"32px","height":"40px"}]'>
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