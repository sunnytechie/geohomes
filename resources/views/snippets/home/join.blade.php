{{-- <section>
    <div class="bg-single-image pt-lg-13 pb-lg-12 py-11 bg-secondary">
      <div class="container container-xxl">
        <div class="row align-items-center">
          <div class="col-lg-6 pr-xl-8 pb-lg-0 pb-6" data-animate="fadeInLeft">
            <a href="#" class="hover-shine d-block">
              <img src="{{ asset('assets/images/single-image-01.jpg') }}" class="rounded-lg w-100"
                         alt="Find your neighborhood">
            </a>
          </div>
          <div class="col-lg-6 pl-xl-8" data-animate="fadeInRight">
            <h2 class="text-white lh-1625">Find your<br/>
              neighborhood</h2>
            <span class="heading-divider"></span>
            <p class="mb-6 text-white">It takes much effort and consideration to find a conducive neighborhood that interest one’s taste. So, we resort on bringing to your door step list of properties that will interest you and meet your needs.</p>

          </div>
        </div>
      </div>
    </div>
  </section> --}}

    <section class="pb-lg-10 bg-gray-02">
        <div class="container">
        <div class="p-6 mxw-670 pl-md-9 d-sm-flex align-items-sm-center position-relative mt-10 rounded-lg" style="background-color: #eaeff7" data-animate="fadeInUp">
            <div class="mt-md-0 mt-6">
            <h4 class="fs-20 font-weight-normal" style="color: #00A75A">Become a<span class="font-weight-600"> Real Estate Agent</span></h4>
            <p class="mb-0 pr-1">You can earn up to 15% commission as a Corporate Agent or 10% commision as an Individual Agent whenever you sale our estate.</p>
            </div>

            @auth
            <div class="ml-auto">
                <a style="background-color: #00A75A;" href="{{ route('agent.profile.join', Auth::user()->id) }}" class="btn btn-lg btn-primary rounded-lg mt-sm-0 mt-6">Join</a>
            </div>
            @else
            <div class="ml-auto">
                <a style="background-color: #00A75A;" href="{{ route('auth.agent') }}" class="btn btn-lg btn-primary rounded-lg mt-sm-0 mt-6">Register</a>
                </div>
            @endauth


            <i style="background-color: #00A75A;" class="far fa-users h-64 w-64px d-flex justify-content-center align-items-center text-white rounded-circle fs-24 position-absolute custom-pos-icon"></i>
        </div>
        </div>
    </section>

