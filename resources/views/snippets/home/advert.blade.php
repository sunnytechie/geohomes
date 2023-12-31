<style>
    .advert-slider .slick-slider .container {
      width: 100%;
      height: 100%; /* Set a fixed height */
      overflow: hidden; /* Hide overflowing content */
    }

    .advert-slider .slick-slider img {
      width: 100%;
      height: auto; /* Maintain aspect ratio */
      object-fit: cover; /* Cover the entire container while maintaining aspect ratio */
    }
    .advert-slider  {
        margin-top: 40px
      }

    @media (min-width: 425px) {
      .advert-slider  {
        margin-top: 60px
      }
    }
</style>

<section class="mb-8 advert-slider">

    <div class="container">
        <div class="col-md-6">
            <h2 class="text-heading">Newest Events</h2>
            <span class="heading-divider"></span>
            <p class="mb-7">Most interesting events</p>
          </div>

      <div class="slick-slider" data-slick-options='{"slidesToShow": 1, "autoplay":true, "autoplaySpeed": 15000, "dots":true, "arrows":true}'>

        @foreach ($adverts as $advert)
        <div data-animate="fadeInRight">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <img src="/storage/{{ $advert->thumbnail }}" alt="">
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
</section>
