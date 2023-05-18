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
                      <label class="custom-control-label text-white"
                                         for="check5-2-mobile">Barbeque</label>
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
                      <label class="custom-control-label text-white"
                                         for="check10-2-mobile">Microwave</label>
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
                      <label class="custom-control-label text-white" for="check15-2-mobile">TV
                        Cable</label>
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


    <section style="background-image: url('assets/images/bg-about-us.jpg')"
       class="bg-img-cover-center py-10 pt-md-16 pb-md-17 bg-overlay">
      <div class="container position-relative z-index-2 text-center">
        <a href="http://www.youtube.com/watch?v=0O2aH4XLbto"
         class="d-inline-block m-auto position-relative play-animation"
         data-gtf-mfp="true" data-mfp-options='{"type":"iframe"}'>
          <span class="text-white bg-primary w-78px h-78 rounded-circle d-flex align-items-center justify-content-center">
            <i class="fas fa-play"></i>
          </span>
        </a>
        <div class="mxw-751">
          <h1 class="text-white fs-30 fs-md-42 lh-15 font-weight-normal mt-4 mb-10" data-animate="fadeInRight">We
            believe in design as a powerful force for good.</h1>
        </div>
      </div>
    </section>


    <section class="bg-patten-03 bg-gray-01 pb-13">
      <div class="container">
        <div class="card border-0 mt-n13 z-index-3 mb-12">
          <div class="card-body p-6 px-lg-14 py-lg-13">
            <p class="letter-spacing-263 text-uppercase text-primary mb-6 font-weight-500 text-center">welcome to
              grandhome</p>
            <h2 class="text-heading mb-4 fs-22 fs-md-32 text-center lh-16 px-6">We see change as opportunity, not a
              threat and
              start
              with the
              belief that
              there is
              a better way. </h2>
            <p class="text-center px-lg-11 fs-15 lh-17 mb-11">
              Over the past 25 years we’ve created more than 5,000 new homes and 1.5 million sq ft of workspace in
              over 60 regeneration projects. Have a look at the short film below to learn more about how we’ve
              achieved this and what drives us.
            </p>
            <p class="letter-spacing-263 text-uppercase mb-4 font-weight-500 text-center">Jump to</p>
            <div class="d-flex flex-wrap justify-content-center">
              <a href="#service" class="btn btn-lg bg-gray-01 text-body mr-4 mb-4 hover-primary">Services</a>
              <a href="#leadership" class="btn btn-lg bg-gray-01 text-body mr-4 mb-4 hover-primary">Leadership</a>
              <a href="#office" class="btn btn-lg bg-gray-01 text-body mr-4 mb-4 hover-primary">Offices Location</a>
              <a href="#work" class="btn btn-lg bg-gray-01 text-body mr-4 mb-4 hover-primary">Work with us</a>
            </div>
            <div id="service"></div>
          </div>
        </div>
        <h2 class="text-dark lh-1625 text-center mb-2 fs-22 fs-md-32">Our services</h2>
        <p class="mxw-751 text-center mb-1 px-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim</p>
        <div class="row mt-8">
          <div class="col-md-4 mb-6 mb-lg-0">
            <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <span class="text-primary fs-90 lh-1">
                    <img width="70" height="70" src="{{ asset('assets/images/gh1.png') }}" alt="">
                </span>
              </div>
              <div class="card-body px-0 pt-6 pb-0 text-center">
                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Property Management</h4>
                <p class="card-text px-2">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                  incididunt ut labore et dolore magna
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-6 mb-lg-0">
            <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <span class="text-primary fs-90 lh-1">
                    <img width="70" height="70" src="{{ asset('assets/images/gh2.png') }}" alt="">
                </span>
              </div>
              <div class="card-body px-0 pt-6 pb-0 text-center">
                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Mortgage Service</h4>
                <p class="card-text px-2">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                  incididunt ut labore et dolore magna
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-6 mb-lg-0">
            <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <span class="text-primary fs-90 lh-1">
                    <img width="70" height="70" src="{{ asset('assets/images/gh3.png') }}" alt="">
                </span>
              </div>
              <div class="card-body px-0 pt-6 text-center pb-0">
                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Consulting Service</h4>
                <p class="card-text px-2">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                  incididunt ut labore et dolore magna
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="py-12" id="leadership">
      <div class="container">
        <h2 class="text-dark lh-1625 text-center mb-2 fs-22 fs-md-32">Leadership</h2>
        <p class="mxw-751 text-center mb-1 px-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim</p>
        <div class="row mx-lg-n6 mt-8">

          <div class="col-md-4 col-sm-12 mb-md-7 mb-4 px-lg-6">
            <div class="card border-0 our-team text-center">
              <div class="rounded overflow-hidden bg-hover-overlay d-inline-block">
                <img class="card-img" src="{{ asset('assets/images/our-team-01.jpg') }}" alt="Dollie Horton">
                <ul class="list-inline text-gray-lighter position-absolute w-100 m-0 p-0 z-index-2">
                  <li class="list-inline-item m-0">
                    <a href="#" class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li class="list-inline-item mr-0 ml-2">
                    <a href="#" class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li class="list-inline-item mr-0 ml-2">
                    <a href="#" class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li class="list-inline-item mr-0 ml-2">
                    <a href="#" class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i class="fab fa-linkedin-in"></i></a>
                  </li>
                </ul>
              </div>
              <div class="card-body pt-5">
                <h3 class="fs-22 text-heading lh-164 mb-0">
                  <a href="#" class="text-heading hover-primary">Dollie Horton</a>
                </h3>
                <p class="m-0">President & CEO</p>
              </div>
            </div>
          </div>
          
        </div>
       
      </div>
    </section>


    <section id="office">
      <div>
        <div class="position-relative">
          <div id="map" class="mapbox-gl map-point-animate" style="height: 550px"
               data-mapbox-access-token="pk.eyJ1IjoiZHVvbmdsaCIsImEiOiJjanJnNHQ4czExMzhyNDVwdWo5bW13ZmtnIn0.f1bmXQsS6o4bzFFJc8RCcQ"
               data-mapbox-options='{"center":[-73.981566, 40.739011],"setLngLat":[-73.981566, 40.739011]}'
               data-mapbox-marker='[{"position":[-73.981566, 40.739011],"className":"marker","backgroundImage":"assets/images/googlle-market-01.png","backgroundRepeat":"no-repeat","width":"32px","height":"40px"}]'
          ></div>
          <div class="container">
            <div class="map-info position-absolute">
              <div class="card border-0 shadow-xs-4">
                <div class="card-body pl-7 pr-6 pt-7 pb-10">
                  <h4 class="fs-22 lh-238 mb-0">Offices Location</h4>
                  <p class="mb-8">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscorem
                    ipsum dolor sit
                    ametcipsum ipsumg elit. consec tetur cing elitipsum dozlpsmg elit.</p>
                  <h5 class="fs-16 lh-2 mb-0">Visit our office at</h5>
                  <p class="mb-0">2005 Stokes Isle Apt. 896, Venaville, New York</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="pt-12" id="work">
      <div class="container">
        <h2 class="text-heading mb-4 fs-22 fs-md-32 text-center lh-16 px-md-13">
          GrandHome is an estate agency that helps people live in more thoughtful and beautiful ways.
        </h2>
        <p class="text-center px-md-17 fs-15 lh-17 mb-8">
          Our home is at the heart of the design, allowing us to engage with our community through talks and events,
          and uphold our company culture with film screenings, yoga classes and team lunches.
        </p>
        <div class="text-center mb-11">
          <a href="#" class="btn btn-lg btn-primary">Join our team</a>
        </div>
        <div class="row galleries mb-lg-n16">
          <div class="col-sm-8 mb-6">
            <div class="item item-size-2-1">
              <a href="{{ asset('assets/images/gallery-lg-08.jpg') }}" class="card p-0 hover-zoom-in"
                     data-gtf-mfp="true" data-gallery-id="02">
                <div class="card-img img"
                           style="background-image:url('assets/images/gallery-08.jpg')">
                </div>
              </a>
            </div>
          </div>
          <div class="col-sm-4 mb-6">
            <div class="item item-size-2-1">
              <a href="{{ asset('assets/images/gallery-lg-09.jpg') }}" class="card p-0 hover-zoom-in"
                     data-gtf-mfp="true" data-gallery-id="02">
                <div class="card-img img"
                           style="background-image:url('assets/images/gallery-09.jpg')">
                </div>
              </a>
            </div>
          </div>
          <div class="col-sm-6 mb-6">
            <div class="item item-size-2-1">
              <a href="{{ asset('assets/images/gallery-lg-10.jpg') }}" class="card p-0 hover-zoom-in"
                     data-gtf-mfp="true" data-gallery-id="02">
                <div class="card-img img"
                           style="background-image:url('assets/images/gallery-10.jpg')">
                </div>
              </a>
            </div>
          </div>
          <div class="col-sm-6 mb-6">
            <div class="item item-size-2-1">
              <a href="{{ asset('assets/images/gallery-lg-11.jpg') }}" class="card p-0 hover-zoom-in"
                     data-gtf-mfp="true" data-gallery-id="02">
                <div class="card-img img"
                           style="background-image:url('assets/images/gallery-11.jpg')">
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="bg-gray-01 pt-10 pt-lg-17 pb-10">
      <div class="container">
        <h2 class="text-dark lh-1625 text-center mb-8 fs-22 fs-md-32 pt-lg-10">Keep exploring</h2>
        <div class="row">
          <div class="col-sm-6 col-lg-4 mb-6 mb-lg-0">
            <a href="{{ route('page.agents') }}"
                 class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <img src="{{ asset('assets/images/icon-box-4.png') }}"
                           alt="Meet our agents">
              </div>
              <div class="card-body px-0 pt-2 pb-0 text-center">
                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Meet our agents</h4>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-lg-4 mb-6 mb-lg-0">
            <a href="#"
                 class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <img src="{{ asset('assets/images/icon-box-5.png') }}"
                           alt="Sell your home">
              </div>
              <div class="card-body px-0 pt-2 pb-0 text-center">
                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Sell your home</h4>
              </div>
            </a>
          </div>
          {{-- <div class="col-sm-6 col-lg-3 mb-6 mb-lg-0">
            <a href="blog-grid-with-sidebar.html"
                 class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <img src="images/icon-box-6.png"
                           alt="Latest news">
              </div>
              <div class="card-body px-0 pt-2 text-center pb-0">
                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Latest news</h4>
              </div>
            </a>
          </div> --}}
          <div class="col-sm-6 col-lg-4 mb-6 mb-lg-0">
            <a href="{{ route('page.contact') }}"
                 class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <img src="{{ asset('assets/images/icon-box-7.png') }}"
                           alt="Contact us">
              </div>
              <div class="card-body px-0 pt-2 text-center pb-0">
                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Contact us</h4>
              </div>
            </a>
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