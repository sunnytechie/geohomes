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
          <div class="media p-4 border rounded-lg shadow-hover-1 pr-lg-8 mb-6 flex-column flex-lg-row no-gutters" data-animate="fadeInUp">
            <div class="col-lg-4 mr-lg-5 card border-0 hover-change-image bg-hover-overlay">
              <img src="{{ asset('assets/images/2.jpg') }}" class="card-img" alt="Home in Metric Way">
              <div class="card-img-overlay p-2 d-flex flex-column">
                
                
              </div>
            </div>
            <div class="media-body mt-5 mt-lg-0">
              <h2 class="my-0">
                <a href="single-property-1.html" class="fs-16 lh-2 text-dark hover-primary d-block">Home in Metric Way</a>
              </h2>
              <p class="mb-2 font-weight-500 text-gray-light">1421 San Pedro St, Los Angeles</p>
              <p class="mb-6 mxw-571 ml-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>
              
              {{-- map height 200, width 100% --}}
              <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15858.08602767711!2d7.560468721056234!3d6.455408218398448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1044a5cafff89fc7%3A0x618ff6fe16b7aca5!2s400104%2C%20Enugu%20Airport%2C%20Enugu!5e0!3m2!1sen!2sng!4v1683582684695!5m2!1sen!2sng" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              {{-- End map --}}

            </div>
          </div>
          <nav class="pt-4">
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
          </nav>
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