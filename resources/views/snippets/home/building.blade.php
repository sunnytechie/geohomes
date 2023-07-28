<section class="pt-lg-12 pb-lg-15 py-11">
    <div class="container container-xxl">
      <h2 class="text-heading">Building Materials</h2>
      <span class="heading-divider"></span>
      <p class="mb-7">Book(Purchase) GeoHomes building materials.</p>
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
          </div>
        @endforeach
      </div>
      </div>
    </div>


    
  </section>