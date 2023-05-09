<section class="py-lg-12 my-lg-1 py-7">
    <div class="container container-xxl">
      <div class="row">
        <div class="col-md-6">
          <h2 class="text-heading">Our Projects</h2>
          <span class="heading-divider"></span>
          <p class="mb-7">Contact us today.</p>
        </div>
        <div class="col-md-6 text-md-right">
          <a href="listing-grid-with-left-filter.html"
               class="btn btn-lg text-secondary btn-accent rounded-lg mb-8">See all projects
            <i class="far fa-long-arrow-right ml-1"></i>
          </a>
        </div>
      </div>
      <div class="slick-slider mx-n2 custom-arrow-spacing-30"
         data-slick-options='{"slidesToShow": 5, "autoplay":false,"dots":false,"arrows":true,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
        <div class="box px-2" data-animate="fadeInUp">
          <div class="card border-0 hover-change-image">
            <div class="bg-overlay-gradient-1 bg-hover-overlay-gradient-3 rounded-lg card-img">
              <img src="{{ asset('assets/images/properties-grid-12.jpg') }}"
                         alt="Villa on Hollywood Boulevard">
              <div class="card-img-overlay d-flex flex-column justify-content-between">
                
                {{-- Do not remove this list... --}}
                <ul class="list-inline mb-0 hover-image text-center">
                    {{-- Do not remove this list... --}}
                  {{-- <li class="list-inline-item">
                    <a href="#" class="w-52px h-52 rounded-circle d-inline-flex align-items-center justify-content-center text-heading bg-white bg-hover-primary hover-white" data-toggle="tooltip" title="Wishlist">
                      <i class="far fa-heart"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="w-52px h-52 rounded-circle d-inline-flex align-items-center justify-content-center text-heading bg-white bg-hover-primary hover-white" data-toggle="tooltip" title="Compare">
                      <i class="fas fa-exchange-alt"></i>
                    </a>
                  </li> --}}
                </ul>
                {{-- End Do not remove this list... --}}
                <ul class="list-inline d-flex mb-0 flex-wrap px-2 mr-n5">
                  <li class="list-inline-item text-white font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bedroom">
                    <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                      <use xlink:href="#icon-bedroom"></use>
                    </svg>
                    3 Br
                  </li>
                  <li class="list-inline-item text-white font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bathrooms">
                    <svg class="icon icon-shower fs-18 text-primary mr-1">
                      <use xlink:href="#icon-shower"></use>
                    </svg>
                    3 Ba
                  </li>
                  <li class="list-inline-item text-white font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="Size">
                    <svg class="icon icon-square fs-18 text-primary mr-1">
                      <use xlink:href="#icon-square"></use>
                    </svg>
                    2300 Sq.Ft
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body p-0">
              <h2 class="my-0 mt-1"><a href="#" class="fs-16 text-dark hover-primary lh-2">Villa on Hollywood Boulevard</a>
              </h2>
              <p class="text-gray-light font-weight-500 mb-1">1421 San Pedro St, Los Angeles</p>
              <p class="fs-17 font-weight-bold text-heading mb-0">$1.250.000</p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>