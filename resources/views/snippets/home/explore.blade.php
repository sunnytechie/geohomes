<section>
    <div class="bg-gray-02 py-lg-5 pt-5 pb-6">
      <div class="container container-xxl">
        <div class="row">
          <div class="col-lg-4 pr-xl-13" data-animate="fadeInLeft">
            <h2 class="text-heading lh-1625">Explore <br>
               by Property Type</h2>
            <span class="heading-divider"></span>
            <p class="mb-6">Our Properties are organized in a way to help you find what you want.</p>
            <a href="{{ route('page.buy.rent') }}"
                   class="btn btn-lg text-secondary btn-accent">+2300 Available Properties
              <i class="far fa-long-arrow-right ml-1"></i>
            </a>
          </div>
          <div class="col-lg-8" data-animate="fadeInRight">
            <div class="slick-slider arrow-haft-inner custom-arrow-xxl-hide mx-0"
                     data-slick-options='{"slidesToShow": 4, "autoplay":true,"dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 3,"arrows":false,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 2,"arrows":false,"autoplay":true}}]}'>

              <div class="box px-0 py-6">
                <a href="{{ $apertmentUrl }}"
                           class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                  <img src="{{ asset('assets/images/verified.png') }}" class="card-img-top"
                                 alt="Apartment">
                  <div class="card-body px-0 pt-5 pb-0">
                    <h4 class="card-title fs-16 lh-2 text-dark mb-0">Apartment</h4>
                  </div>
                </a>
              </div>

              <div class="box px-0 py-6">
                <a href="{{ $houseUrl }}"
                           class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                  <img src="{{ asset('assets/images/sofa.png') }}" class="card-img-top"
                                 alt="House">
                  <div class="card-body px-0 pt-5 pb-0">
                    <h4 class="card-title fs-16 lh-2 text-dark mb-0">House</h4>
                  </div>
                </a>
              </div>

              <div class="box px-0 py-6">
                <a href="{{ $officeUrl }}"
                           class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                  <img src="{{ asset('assets/images/architecture-and-city.png') }}" class="card-img-top"
                                 alt="Office">
                  <div class="card-body px-0 pt-5 pb-0">
                    <h4 class="card-title fs-16 lh-2 text-dark mb-0">Office</h4>
                  </div>
                </a>
              </div>

              <div class="box px-0 py-6">
                <a href="{{ $landUrl }}"
                           class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                  <img src="{{ asset('assets/images/eco-house.png') }}" class="card-img-top"
                                 alt="Land">
                  <div class="card-body px-0 pt-5 pb-0">
                    <h4 class="card-title fs-16 lh-2 text-dark mb-0">Land</h4>
                  </div>
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
