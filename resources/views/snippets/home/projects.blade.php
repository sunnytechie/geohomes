<section class="py-lg-8 my-lg-1">
    <div class="container container-xxl">
      <div class="row">
        <div class="col-md-6">
          <h2 class="text-heading">Our Estate</h2>
          <span class="heading-divider"></span>
          <p class="mb-6">Browse though our estate.</p>
        </div>
        <div class="col-md-6 text-md-right">
          <a href="{{ route('page.projects') }}" class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0"">See all Our Estates
            <i class="far fa-long-arrow-right ml-1"></i>
          </a>
        </div>
      </div>
      <div class="slick-slider mx-n2 custom-arrow-spacing-30" data-slick-options='{"slidesToShow": 5, "autoplay":false,"dots":false,"arrows":true,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":4,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>

        @foreach ($projects as $project)
        <div class="box px-3" data-animate="fadeInUp">
          <div class="card border-0 hover-change-image">
            <a href="{{ route('estate.show', $project->id) }}">
              <div class="rounded-lg card-img">
                    <img src="/storage/{{ $project->image }}" alt="{{ $project->title }}">

                    <div class="card-img-overlay d-flex flex-column justify-content-between"></div>
              </div>
            </a>

            <div class="card-body p-0">
              <h2 class="my-0 mt-1"><span class="fs-16 text-dark hover-primary lh-2">{{ $project->title }}</span>
              </h2>
              <p class="text-gray-light font-weight-500 mb-1">Location: {{ $project->address }}, {{ $project->state }}</p>
              <p class="fs-17 font-weight-bold text-heading mb-0">₦ {{ number_format($project->price, 2) }}</p>
            </div>
          </div>

        </div>
        @endforeach

      </div>
    </div>
  </section>
