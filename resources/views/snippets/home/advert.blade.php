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
  </style>
<section class="mb-10 advert-slider">

    <div class="container">
        <p class="text-primary letter-spacing-263 text-uppercase lh-186 mb-0">Newest Events</p>
      <h2 class="lh-1625 text-dark pb-1">
        Advertise!
      </h2>

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
