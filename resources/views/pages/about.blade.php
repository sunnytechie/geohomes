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
</style>
    
<main id="content">
  <div class="mt-10"></div>
    <section style="background-image: url('assets/images/bg-about-us.jpg')"
       class="bg-img-cover-center py-10 pt-md-16 pb-md-17 bg-overlay">
      <div class="container position-relative z-index-2 text-center">
        <a href="http://www.youtube.com/watch?v=0O2aH4XLbto"
         class="d-inline-block m-auto position-relative play-animation"
         data-gtf-mfp="true" data-mfp-options='{"type":"iframe"}'>
          <span class="text-white bg-primary w-78px h-78 rounded-circle d-flex align-items-center justify-content-center">
            <i class="fas fa-play"></i>
          </span>
        </a>
        <div class="mxw-751">
          <h1 class="text-white fs-30 fs-md-42 lh-15 font-weight-normal mt-4 mb-10" data-animate="fadeInRight">We
            We are a home of innovative solutions.</h1>
        </div>
      </div>
    </section>


    <section class="bg-patten-03 bg-gray-01 pb-13">
      <div class="container">
        <div class="card border-0 mt-n13 z-index-3 mb-12">
          <div class="card-body p-6 px-lg-14 py-lg-13">
            <p class="letter-spacing-263 text-uppercase text-primary mb-6 font-weight-500 text-center">welcome to
              Geohome</p>
            <h2 class="text-heading mb-4 fs-22 fs-md-32 text-center lh-16 px-6">
              {{-- We see change as opportunity, not a threat and start with the belief that there is a better way. --}}
              Geohomes Services Limited is a private limited liability company duly registered under the Companies and Allied Matters Act of 1990 on 12th August, 2020 with RC. No. 1696212.
            </h2>
              
              
        
          {{-- Geohomes Services Limited is a leading real estate development and consulting firm. We take the position of a customer-focused, and solution-driven company eager to provide what our clients need to achieve their dreams. --}}
          <p class="text-center px-lg-11 fs-15">We are a leading real estate development and consulting firm with qualified, experienced Estate Developer, Managers and Civil Engineers etc. We take the position of a customer-focused and solution driven company eager to provide what is needed by our clientele to achieving their dream.
          </p class="text-center px-lg-11 fs-15">
          <p class="text-center px-lg-11 fs-15">We major on constructions, supply of Raw Materials, General Merchandise and General Contracts.
          </p class="text-center px-lg-11 fs-15">
          <p class="text-center px-lg-11 fs-15">Geohomes has national Affiliation with production Companies in Nigeria and International which is a distinct advantage over Competitors. We have grown successfully executing and completing high profile jobs for Public Agencies which is attributed to our team of professionals.
          </p>
          <p class="text-center px-lg-11 fs-15">Our quality control policies are superior and we are committed to swift delivery of any kind of construction, real estate, trading excellence, clients and funding as major drivers.</p>
            <p class="letter-spacing-263 text-uppercase mb-4 mt-10 font-weight-500 text-center">Jump to</p>
            <div class="d-flex flex-wrap justify-content-center">
              <a href="#service" class="btn btn-lg bg-gray-01 text-body mr-4 mb-4 hover-primary">Services</a>
              <a href="#leadership" class="btn btn-lg bg-gray-01 text-body mr-4 mb-4 hover-primary">Leadership</a>
              <a href="#office" class="btn btn-lg bg-gray-01 text-body mr-4 mb-4 hover-primary">Offices Location</a>
              <a href="#work" class="btn btn-lg bg-gray-01 text-body mr-4 mb-4 hover-primary">Work with us</a>
            </div>
            <div id="service"></div>
          </div>
        </div>
        <h2 class="text-dark lh-1625 text-center mb-2 fs-22 fs-md-32">Our services</h2>
        <p class="mxw-751 text-center mb-1 px-8">
          Our work and services pass every global standard and we are championed...
          </p>
        <div class="row mt-8">
          <div class="col-md-4 mb-6 mb-lg-0">
            <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <span class="text-primary fs-90 lh-1">
                    <img width="70" height="70" src="{{ asset('assets/images/gh1.png') }}" alt="">
                </span>
              </div>
              <div class="card-body px-0 pt-6 pb-0 text-left">
                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Property Management</h4>
                <p class="card-text px-2">
                  From the planning and design phase through closeout and occupancy, a Geohomes project manager is in charge of all phases of a building's development. 
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-6 mb-lg-0">
            <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <span class="text-primary fs-90 lh-1">
                    <img width="70" height="70" src="{{ asset('assets/images/gh2.png') }}" alt="">
                </span>
              </div>
              <div class="card-body px-0 pt-6 pb-0 text-left">
                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Mortgage Service</h4>
                <p class="card-text px-2">
                  Our Mortgage Services providers give you the right mortgage terms, rates and payment options that suits the needs of our clientele. Here, we assist and encourage our client to own homes through mortgage payment. 
We have a tailor-made plans that are prerequisite to mortgage properties because we understand the benefit that comes with home ownership.

                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-6 mb-lg-0">
            <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <span class="text-primary fs-90 lh-1">
                    <img width="70" height="70" src="{{ asset('assets/images/gh3.png') }}" alt="">
                </span>
              </div>
              <div class="card-body px-0 pt-6 text-left pb-0">
                <h4 class="card-title fs-18 lh-17 text-dark mb-2">Consulting Service</h4>
                <p class="card-text px-2">
                  At Geohomes, we provide clarity, direction and simplicity to client on their most critical issues and opportunities to actualize their dream. We implement the best kept strategies to solving all real estate challenges. 
Geohomesgroup.com/about-us#services (After the map/office location)
Geohomes is an estate agency with cutting edge innovative solutions in property development, property listing and consultancy. Our services passes every global standard and are championed by experts and experienced professionals who are trained to give you the best.

                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="py-6" id="leadership">
      <div class="container">
        <h2 class="text-dark lh-1625 text-center mb-2 fs-22 fs-md-32">Leadership</h2>
        <p class="mxw-751 text-center mb-1 px-8">Meet the great minds making GeoHomes a place of great possibilities and service delivery.</p>
        <div class="row justify-content-center mx-lg-n6 mt-8">

          <div class="col-md-4 col-sm-12 mb-md-7 mb-4 px-lg-6">
            <div class="card border-0 our-team text-center">
              <div class="rounded overflow-hidden bg-hover-overlay d-inline-block">
                <img class="card-img" src="{{ asset('assets/images/profile/ceo.jpg') }}" alt="Uchechukwu Godwin Nnam. CEO">
                <ul class="list-inline text-gray-lighter position-absolute w-100 m-0 p-0 z-index-2">
                  <li class="list-inline-item m-0">
                    <a href="#" class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li class="list-inline-item mr-0 ml-2">
                    <a href="#" class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li class="list-inline-item mr-0 ml-2">
                    <a href="#" class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li class="list-inline-item mr-0 ml-2">
                    <a href="#" class="w-32px h-32 rounded shadow-xxs-3 bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center"><i class="fab fa-linkedin-in"></i></a>
                  </li>
                </ul>
              </div>
              <div class="card-body pt-5">
                <h3 class="fs-22 text-heading lh-164 mb-0">
                  <a href="#" class="text-heading hover-primary">Uchechukwu Godwin Nnam.</a>
                </h3>
                <p class="m-0">CEO. Geohomes Group</p>
              </div>
            </div>
          </div>
          
        </div>
       
      </div>
    </section> 


    <section id="office">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="card border-0 shadow-xs-4">
              <div class="card-body pl-7 pr-6 pt-7 pb-10">
                <h4 class="fs-22 lh-238 mb-0">Offices Location</h4>
                <p class="mb-8">We are devoted to offering you properties that stand the test of time and market changes. As technology grows, we grow with it too. So whatever you need, we are ready to provide.
                  Our passion at Geohomes is to give you everything you need to achieve your real estate dreams.
                  </p>
                <h5 class="fs-16 lh-2 mb-0">Visit our office at</h5>
                <p class="mb-0">26 Moorehouse street Ogui Enugu</p>
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.6468249970967!2d7.492525573327757!3d6.439381724138578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1044a3d8f51f6071%3A0x6b07f5ee68d7e660!2s26%20Moorehouse%20St%2C%20Ogui%20400001%2C%20Enugu!5e0!3m2!1sen!2sng!4v1685829579897!5m2!1sen!2sng" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </section>


    <section class="pt-12" id="work">
      <div class="container">
        <h2 class="text-heading mb-4 fs-22 fs-md-32 text-center lh-16 px-md-13">
          GeoHomes is an estate agency that helps people live in more thoughtful and beautiful ways.
        </h2>
        <p class="text-center px-md-17 fs-15 lh-17 mb-8">
          Our home is at the heart of the design, allowing us to engage with our community through talks and events,
          and uphold our company culture with film screenings, yoga classes and team lunches.
        </p>
        @auth
        @if (Auth::user()->is_agent == 0 && Auth::user()->is_admin == 0)
          <div class="text-center mb-11">
            <a href="{{ route('agent.profile.join') }}" class="btn btn-lg btn-primary">Join our team</a>
          </div> 
        @endif
        @else
        <div class="text-center mb-11">
          <a href="{{ route('login') }}" class="btn btn-lg btn-primary">Join our team</a>
        </div> 
        @endauth
        
        <div class="row galleries mb-lg-n16">
          <div class="col-sm-8 mb-6">
            <div class="item item-size-2-1">
              <a href="{{ asset('assets/images/gallery-lg-08.jpg') }}" class="card p-0 hover-zoom-in"
                     data-gtf-mfp="true" data-gallery-id="02">
                <div class="card-img img"
                           style="background-image:url('assets/images/gallery-08.jpg')">
                </div>
              </a>
            </div>
          </div>
          <div class="col-sm-4 mb-6">
            <div class="item item-size-2-1">
              <a href="{{ asset('assets/images/gallery-lg-09.jpg') }}" class="card p-0 hover-zoom-in"
                     data-gtf-mfp="true" data-gallery-id="02">
                <div class="card-img img"
                           style="background-image:url('assets/images/gallery-09.jpg')">
                </div>
              </a>
            </div>
          </div>
          <div class="col-sm-6 mb-6">
            <div class="item item-size-2-1">
              <a href="{{ asset('assets/images/gallery-lg-10.jpg') }}" class="card p-0 hover-zoom-in"
                     data-gtf-mfp="true" data-gallery-id="02">
                <div class="card-img img"
                           style="background-image:url('assets/images/gallery-10.jpg')">
                </div>
              </a>
            </div>
          </div>
          <div class="col-sm-6 mb-6">
            <div class="item item-size-2-1">
              <a href="{{ asset('assets/images/gallery-lg-11.jpg') }}" class="card p-0 hover-zoom-in"
                     data-gtf-mfp="true" data-gallery-id="02">
                <div class="card-img img"
                           style="background-image:url('assets/images/gallery-11.jpg')">
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="bg-gray-01 pt-10 pt-lg-17 pb-10">
      <div class="container">
        <h2 class="text-dark lh-1625 text-center mb-8 fs-22 fs-md-32 pt-lg-10">Keep exploring</h2>
        <div class="row">
          {{-- <div class="col-sm-6 col-lg-4 mb-6 mb-lg-0">
            <a href="{{ route('page.agents') }}"
                 class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <img src="{{ asset('assets/images/icon-box-4.png') }}"
                           alt="Meet our agents">
              </div>
              <div class="card-body px-0 pt-2 pb-0 text-center">
                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Meet our agents</h4>
              </div>
            </a>
          </div> --}}
          <div class="col-sm-6 mb-6 mb-lg-0">
            <a href="{{ route('page.buy.rent') }}"
                 class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <img src="{{ asset('assets/images/icon-box-5.png') }}"
                           alt="Sell your home">
              </div>
              <div class="card-body px-0 pt-2 pb-0 text-center">
                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Sell your home</h4>
              </div>
            </a>
          </div>
          {{-- <div class="col-sm-6 col-lg-3 mb-6 mb-lg-0">
            <a href="blog-grid-with-sidebar.html"
                 class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <img src="images/icon-box-6.png"
                           alt="Latest news">
              </div>
              <div class="card-body px-0 pt-2 text-center pb-0">
                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Latest news</h4>
              </div>
            </a>
          </div> --}}
          <div class="col-sm-6 mb-6 mb-lg-0">
            <a href="{{ route('page.contact') }}"
                 class="card border-0 shadow-2 px-7 py-5 h-100 shadow-hover-lg-1">
              <div class="card-img-top d-flex align-items-end justify-content-center">
                <img src="{{ asset('assets/images/icon-box-7.png') }}"
                           alt="Contact us">
              </div>
              <div class="card-body px-0 pt-2 text-center pb-0">
                <h4 class="card-title fs-16 lh-186 text-dark hover-primary">Contact us</h4>
              </div>
            </a>
          </div>
        </div>
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