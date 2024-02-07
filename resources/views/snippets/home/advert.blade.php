<style>
    /* @media (min-width: 425px) {
        .advert-slider .slick-slider .container {
        width: 620px;
        margin: 0 auto;
        overflow: hidden;
        }

        .advert-slider .slick-slider img {
        object-fit: cover;
        }
    } */

    @media (min-width: 430px) {
        .advert-slider .slick-slider {
        width: 620px;
        margin: 0 auto;
        overflow: hidden;
        }

        .advert-slider .slick-slider img {
        object-fit: cover;
        }
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
                <a href="{{ $advert->link }}" target="_blank">
                    <img class="img-advert-responsive" src="/storage/{{ $advert->thumbnail }}" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
</section>
