<section class="pt-lg-12 pb-lg-15 py-11">
    <div class="container container-xxl">
      <h2 class="text-heading">Destinations We Love The Most</h2>
      <span class="heading-divider"></span>
      <p class="mb-7">GeoHomes Reels of different destinations we have properties.</p>
      <div class="slick-slider mx-n2"
         data-slick-options='{"slidesToShow": 5,"arrows":true, "autoplay":false,"dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3}},{"breakpoint": 992,"settings": {"slidesToShow":3}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
        
         @foreach ($destinations as $destination)
         <div class="box px-2" data-animate="fadeInUp">
            <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
              <img src="/storage/{{ $destination->image }}" class="card-img" alt="{{ $destination->state }}">
              <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                <h2 class="card-title mb-0 fs-20 lh-182"><span class="text-white">{{ Str::limit($destination->state, 15) }}</span></h2>
                <p class="card-text fs-12 font-weight-500 letter-spacing-087">{{ $destination->price_range }} </p>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </section>