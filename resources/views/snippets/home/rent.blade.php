<section class="pt-lg-12 pb-lg-11 py-11">
    <div class="container container-xxl">
      <div class="row">
        <div class="col-md-6">
          <h2 class="text-heading">Best Properties For Rent</h2>
          <span class="heading-divider"></span>
          <p class="mb-6">Find the best properties to rent.</p>
        </div>
        <div class="col-md-6 text-md-right">
          <a href="{{ route('page.buy.rent') }}"
               class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">See all properties
            <i class="far fa-long-arrow-right ml-1"></i>
          </a>
        </div>
      </div>
      <div class="slick-slider slick-dots-mt-0 custom-arrow-spacing-30"
         data-slick-options='{"slidesToShow": 4,"dots":true,"arrows":false,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":3}},{"breakpoint": 992,"settings": {"slidesToShow":2,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
       
         @foreach ($propertiesForRent as $property)
        <div class="box pb-7 pt-2">
          <div class="card shadow-hover-2" data-animate="zoomIn">
            <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
              <img 
                src="/storage/{{ $property->image }}"
                  alt="{{ $property->title }}">
              <div class="card-img-overlay p-2 d-flex flex-column">
                <div>
                  <span class="badge mr-2 badge-orange">featured</span>
                  <span class="badge mr-2 badge-primary">for Rent</span>
                </div>
               
                
              </div>
            </div>
            <div class="card-body pt-3">
              <h2 class="card-title fs-16 lh-2 mb-0">
                <a href="#"
                class="text-dark hover-primary">{{ $property->title }}</a></h2>
              <p class="card-text font-weight-500 text-gray-light mb-2">{{ $property->address }}, {{ $property->city }}, {{ $property->state }}</p>
              <ul class="list-inline d-flex mb-0 flex-wrap mr-n5">
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                            data-toggle="tooltip" title="{{ $property->bedrooms }} Bedrooms">
                  <svg class="icon icon-bedroom fs-18 text-primary mr-1">
                    <use xlink:href="#icon-bedroom"></use>
                  </svg>
                  {{ $property->bedrooms }} Bedrooms
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                            data-toggle="tooltip" title="{{ $property->bathrooms }} Bathrooms">
                  <svg class="icon icon-shower fs-18 text-primary mr-1">
                    <use xlink:href="#icon-shower"></use>
                  </svg>
                  {{ $property->bathrooms }} Ba
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                            data-toggle="tooltip" title="{{ $property->size_in_fit }}">
                  <svg class="icon icon-square fs-18 text-primary mr-1">
                    <use xlink:href="#icon-square"></use>
                  </svg>
                  {{ $property->size_in_fit }} Sq.Ft
                </li>
                <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5"
                            data-toggle="tooltip" title="{{ $property->garage_size }} Garage">
                  <svg class="icon icon-Garage fs-18 text-primary mr-1">
                    <use xlink:href="#icon-Garage"></use>
                  </svg>
                  {{ $property->garage_size }} Gr
                </li>
              </ul>
            </div>
            <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
              <p class="fs-17 font-weight-bold text-heading text-center mb-0">{{ $property->price }}</p>
              {{-- <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="#" 
                  class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent"
                  data-toggle="tooltip" title="Wishlist"><i class="fas fa-heart"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="#"
                  class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent"
                  data-toggle="tooltip" title="Compare"><i class="fas fa-exchange-alt"></i></a>
                </li>
              </ul> --}}
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>