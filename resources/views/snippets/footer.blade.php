<footer class="bg-dark pt-8 pb-6 footer text-muted">
    <div class="container container-xxl">
      <div class="row">
        <div class="col-md-6 col-lg-4 mb-6 mb-md-0">
          <a class="d-block mb-2" href="#">
            <img width="80" height="80" src="{{ asset('assets/images/fbi/fbilogo-removebg-preview.png') }}" alt="FBILTD">
          </a>
          <div class="lh-26 font-weight-500">
            <p class="mb-0">{{ $aboutInfo['office_location'] }}</p>
            <a class="d-block text-muted hover-white" href="mailto:{{ $aboutInfo['email'] }}">{{ $aboutInfo['email'] }}</a>
            <a class="d-block text-lighter font-weight-bold fs-15 hover-white"
                     href="tel:{{ $aboutInfo['phone'] }}">{{ $aboutInfo['phone'] }}</a>
            <a class="d-block text-muted hover-white" href="{{ route('index.welcome') }}">www.fbiltd.org</a>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mb-6 mb-md-0">
          <h4 class="text-white fs-16 my-4 font-weight-500">Popular Searches</h4>
          <ul class="list-group list-group-flush list-group-no-border">
            <li class="list-group-item bg-transparent p-0">
              <a href="{{ route('page.buy.rent') }}" class="text-muted lh-26 font-weight-500 hover-white">Apartment for Rent</a>
            </li>
            <li class="list-group-item bg-transparent p-0">
              <a href="{{ route('page.buy.rent') }}" class="text-muted lh-26 font-weight-500 hover-white">Offices for Buy</a>
            </li>
            <li class="list-group-item bg-transparent p-0">
              <a href="{{ route('page.buy.rent') }}" class="text-muted lh-26 font-weight-500 hover-white">Offices for Rent</a>
            </li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-2 mb-6 mb-md-0">
          <h4 class="text-white fs-16 my-4 font-weight-500">Quick links</h4>
          <ul class="list-group list-group-flush list-group-no-border">
            <li class="list-group-item bg-transparent p-0">
              <a href="{{ route('page.about') }}" class="text-muted lh-26 font-weight-500 hover-white">Terms of Use</a>
            </li>
            <li class="list-group-item bg-transparent p-0">
              <a href="{{ route('page.about') }}" class="text-muted lh-26 font-weight-500 hover-white">Privacy Policy</a>
            </li>
            <li class="list-group-item bg-transparent p-0">
              <a href="{{ route('page.contact') }}" class="text-muted lh-26 font-weight-500 hover-white">Contact Support</a>
            </li>
            {{-- <li class="list-group-item bg-transparent p-0">
              <a href="#" class="text-muted lh-26 hover-white font-weight-500">Careers</a>
            </li> --}}
          </ul>
        </div>
        <div class="col-md-6 col-lg-4 mb-6 mb-md-0">
          <h4 class="text-white fs-16 my-4 font-weight-500">Sign Up for Our Newsletter</h4>
          <p class="font-weight-500 text-muted lh-184">Be the first to hear about a new property and projects </p>
          <div class="mb-2" id="response-message" style="color: #654321"></div>
          <form id="newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST">
            @csrf
            <div class="input-group input-group-lg mb-6">
              <input type="email" name="email" id="email" class="form-control bg-white shadow-none border-0 z-index-1" placeholder="Your email">
              <div class="input-group-append">
                <button class="btn btn-primary border-0" type="submit" style="background: #654321">Subscribe</button>
              </div>
            </div>
          </form>
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-0">
              <a href="#" class="text-white opacity-3 fs-25 px-4 opacity-hover-10"><i
                              class="fab fa-twitter"></i></a>
            </li>
            <li class="list-inline-item mr-0">
              <a href="#" class="text-white opacity-3 fs-25 px-4 opacity-hover-10"><i
                              class="fab fa-facebook-f"></i></a>
            </li>
            <li class="list-inline-item mr-0">
              <a href="#" class="text-white opacity-3 fs-25 px-4 opacity-hover-10"><i
                              class="fab fa-skype"></i></a>
            </li>
            <li class="list-inline-item mr-0">
              <a href="#" class="text-white opacity-3 fs-25 px-4 opacity-hover-10"><i
                              class="fab fa-linkedin-in"></i></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="mt-0 mt-md-10 row">
        {{-- <ul class="list-inline mb-0 col-md-6 mr-auto">
          <li class="list-inline-item mr-6">
            <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Terms of Use</a>
          </li>
          <li class="list-inline-item">
            <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Privacy Policy</a>
          </li>
        </ul> --}}
        <p class="col-md-12 mb-0 text-muted text-center">
          &copy; {{ now()->year }} FBI limited. All Rights Reserved
        </p>
      </div>
    </div>
  </footer>
