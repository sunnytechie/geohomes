<section class="py-lg-12 my-lg-1 py-7">
    <div class="container container-xxl">
      <div class="row">
        <div class="col-md-6">
          <h2 class="text-heading">Our Estate</h2>
          <span class="heading-divider"></span>
          <p class="mb-7">Contact us today.</p>
        </div>
        <div class="col-md-6 text-md-right">
          <a href="{{ route('page.projects') }}" class="btn btn-lg text-secondary btn-accent rounded-lg mb-8">See all Our Estates
            <i class="far fa-long-arrow-right ml-1"></i>
          </a>
        </div>
      </div>
      <div class="slick-slider mx-n2 custom-arrow-spacing-30" data-slick-options='{"slidesToShow": 5, "autoplay":false,"dots":false,"arrows":true,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":4,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
        
        @foreach ($projects as $project)
        <div class="box px-3" data-animate="fadeInUp">
          <div class="card border-0 hover-change-image">
            <a href="{{ route('projects.show', $project->id) }}">
              <div class="rounded-lg card-img">
                    <img src="/storage/{{ $project->image }}" alt="{{ $project->title }}">
                
                    <div class="card-img-overlay d-flex flex-column justify-content-between"></div>
              </div>
            </a>
            
            <div class="card-body p-0">
              <h2 class="my-0 mt-1"><span class="fs-16 text-dark hover-primary lh-2">{{ $project->title }}</span>
              </h2>
              <p class="text-gray-light font-weight-500 mb-1">Location: {{ $project->address }}, {{ $project->state }}</p>
              <p class="fs-17 font-weight-bold text-heading mb-0">{{ $project->price }}</p>
            </div>
          </div>
          {{-- <div class="d-flex justify-content-between">
            <form class="w-50 mr-1" action="{{ route('subscription') }}" method="POST" style="padding: 0; margin: 0">
              @csrf
              <input type="hidden" name="project_id" value="{{ $project->id }}">
              <button type="submit" class="btn btn-primary w-100 rounded-0 border-0" style="background: #EAF1F2; color: #3e3e42 !important;">Subscribe</button>
            </form>

            <form class="w-50" action="{{ route('inspection') }}" method="POST" style="padding: 0; margin: 0">
              @csrf
              <input type="hidden" name="project_id" value="{{ $project->id }}">
              <button type="submit" class="btn btn-primary w-100 rounded-0 border-0" style="background: #00A75A">Inspection</button>
            </form>
          </div> --}}
        </div>
        @endforeach
        
      </div>
    </div>
  </section>