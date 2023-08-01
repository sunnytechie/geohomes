<section class="pt-lg-5 pb-lg-15 py-5">
    <div class="container container-xxl">
      <div class="row">
        <div class="col-md-6">
          <h2 class="text-heading">Building Materials</h2>
          <span class="heading-divider"></span>
          <p class="mb-6">Book(Purchase) GeoHomes building materials.</p>
        </div>
        <div class="col-md-6 text-md-right">
          <a href="{{ route('listing.building.index') }}"
               class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">See more materials
            <i class="far fa-long-arrow-right ml-1"></i>
          </a>
        </div>
      </div>

      <div class="slick-slider mx-n2" data-slick-options='{"slidesToShow": 5,"arrows":true, "autoplay":false,"dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3}},{"breakpoint": 992,"settings": {"slidesToShow":3}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
        @foreach ($buildings as $building)
         <div class="box px-2" data-animate="fadeInUp">
            <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
              <img src="/storage/{{ $building->file }}" class="card-img" alt="Preview">
              <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                <a href="{{ route('booking.building.material.show', $building->id) }}" class="btn btn-sm btn-default" style="background: #ffffff">Book</a>
              </div>
            </div>
            <h2 class="card-title mb-0 fs-14 lh-182"><span class="text-black">{{ Str::limit($building->title, 200) }}</span></h2>
            <p class="card-title mb-0 fs-14 lh-182"><span class="text-black">₦ {{ $building->price }}</span></p>
          </div>
        @endforeach
      </div>
      </div>
    </div>



  </section>
