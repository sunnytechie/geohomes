@extends('layouts.app')

@section('content')
<style>
  .remove-this-item {
    display: none !important;
  }

  @media only screen and (max-width: 1024px) {
  .mt-12 {
    margin-top: 0 !important;
  }
  }


  .map {
    margin-bottom: 20px; /* Adjust the margin as needed */
  }
</style>
    
<main id="content">

  <section class="mt-12 pb-5 pb-lg-10 page-title bg-overlay bg-img-cover-center" style="background-image: url('assets/images/BG3.jpg');">
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-light mb-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Projects completed</li>
            </ol>
          </nav>
          <h1 class="fs-18 fs-md-30 mb-0 text-white font-weight-normal text-center pt-8 pb-13 lh-15 px-lg-16" data-animate="fadeInDown">
            GeoHomes is an estate agency that helps people live in more thoughtful and beautiful ways.
          </h1>
        </div>
      </section>
    <section class="pb-9 pb-md-11 mt-14">
        <div class="container">

          @foreach ($projects as $project)
            <div class="media p-4 border rounded-lg shadow-hover-1 pr-lg-8 mb-6 flex-column flex-lg-row no-gutters" data-animate="fadeInUp">
              <div class="col-lg-4 mr-lg-5 card border-0 hover-change-image bg-hover-overlay">
                <img src="/storage/{{ $project->image }}" class="card-img" alt="{{ $project->title }}">
                <div class="card-img-overlay p-2 d-flex flex-column">
                </div>
              </div>

              <div class="media-body mt-5 mt-lg-0">
                <h2 class="my-0">
                  <a href="single-property-1.html" class="fs-16 lh-2 text-dark hover-primary d-block">{{ $project->title }}</a>
                </h2>
                <p class="mb-2 font-weight-500 text-gray-light">{{ $project->address }}</p>
                <p class="mb-6 mxw-571 ml-0">{{ $project->description }}</p>
                
                {{-- map height 200, width 100% --}}
                <div class="map">
                  {!! $project->map_embed_code !!}
                </div>
                {{-- End map --}}

              </div>
            </div>
            @endforeach

          {{-- <nav class="pt-4">
            <ul class="pagination rounded-active justify-content-center mb-0">
              <li class="page-item"><a class="page-link" href="#"><i class="far fa-angle-double-left"></i></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active"><a class="page-link" href="#">2</a></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
              <li class="page-item">...</li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#"><i
						class="far fa-angle-double-right"></i></a></li>
            </ul>
          </nav> --}}
          
        </div>
    </section>
</main>

<script>
    // Get the header element
    const header = document.querySelector('header');

    // Remove the navbar-dark class
    header.classList.remove('navbar-dark');

    // Add the navbar-light class
    header.classList.add('navbar-light');
</script>

@endsection