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


    <section class="py-14 py-lg-17 page-title bg-overlay-opacity-02"
       style="background-image: url('assets/images/BG4.jpg');background-size: cover;background-position: center">
      <div class="container">
        <h1 class="fs-22 fs-md-42 lh-15 mb-8 mb-lg-13 font-weight-normal text-center mxw-774 pt-2 text-white position-relative z-index-3" data-animate="fadeInDown">
          For more information about our services, get in touch with our expert consultants</h1>

          @if ($errors->has('g-recaptcha-response'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
            @endif
      </div>
    </section>


    <section>
      <div class="container">
        <div class="card border-0 mt-n13 z-index-3 pb-8 pt-10">
          <div class="card-body p-0">
            <h2 class="text-heading mb-2 fs-22 fs-md-32 text-center lh-16">We're always eager to hear from
              you!</h2>
            <p class="text-center mxw-670 mb-8">
              At Geohomes, we create values by building outstanding artistry edifice with modern technology and seamless services to our customers.
            </p>
            {{-- session --}}
            @if (session('message'))
            <div class="row">
                <div class="col-md-12">
                    <div class="hide-from-mobile mt-2"></div>
                    
                        {{-- alert --}}
                        <div class="alert text-center alert-info alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 6px">
                            <span aria-hidden="true"><ion-icon name="close-circle-outline"></ion-icon></span>
                            </button>
                        </div>
                    
                </div>
            </div>
            @endif
            <form class="mxw-751 px-md-5" method="POST" action="{{ route('contact.form') }}">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" placeholder="First Name" class="form-control form-control-lg border-0" name="first_name" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" placeholder="Last Name" name="last_name" class="form-control form-control-lg border-0" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input placeholder="Your Email" class="form-control form-control-lg border-0" type="email" name="email" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" placeholder="Your Phone" name="phone" class="form-control form-control-lg border-0" required>
                  </div>
                </div>
              </div>
              <div class="form-group mb-6">
                <textarea class="form-control border-0" placeholder="Message" name="message" rows="5" required></textarea>
              </div>

              <div class="form-group mb-6">
                {!! app('captcha')->display() !!}
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary px-9">Submit</button>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </section>

    
    <section>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.6468249970967!2d7.492525573327757!3d6.439381724138578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1044a3d8f51f6071%3A0x6b07f5ee68d7e660!2s26%20Moorehouse%20St%2C%20Ogui%20400001%2C%20Enugu!5e0!3m2!1sen!2sng!4v1685829579897!5m2!1sen!2sng" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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