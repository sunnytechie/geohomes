<title>{{ $building->title }}</title>
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

    /* override GoogleMap settings */
    .map-container {
    position: relative;
    width: 100%;
    padding-bottom: 75%; /* Adjust this value to control the aspect ratio of the map */
    height: 0;
    overflow: hidden;
  }

  .map-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  @media only screen and (max-width: 600px) {
  /* Adjust the breakpoint value as needed */
  .map-container {
    padding-bottom: 100%; /* Increase the aspect ratio for mobile */
  }
  }

  @media only screen and (min-width: 601px) {
    /* Adjust the breakpoint value as needed */
    .map-container {
      padding-bottom: 75%; /* Restore the aspect ratio for desktop */
    }
  }


  @media only screen and (max-width: 1024px) {
    .hide-from-mobile {
    margin-top: 10px !important;
  }
  }

  @media (min-width: 576px) {
      .modal-dialog {
          max-width: 300px;
          margin: 1.75rem auto;
      }
  }
  
</style>
    
<main id="content">
    <section class="container py-11 mt-5">
          <div class="row justify-content-center">
            
            @if (session('message'))
                    <div class="col-md-5 mt-5">
                        <div class="hide-from-mobile mt-5"></div>
                            {{-- alert --}}
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                            </div>
                    </div>
            
            @else
              <div class="col-md-5 shadow border">
                <form method="POST" action="{{ route('booking.building.material', $building->id) }}">
                    @csrf
                    <h3 class="mt-3">{{ $building->title }}</h3>
                    <div class="form-group">
                        <label for="qtty">Quantity of material you want</label>
                        <input type="number" class="shadow-none fs-13 form-control" placeholder="300" name="qtty" id="qtty">
                        @error('qtty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="location">Location(state)</label>
                        <input type="text" class="shadow-none fs-13 form-control" name="location" placeholder="Anambra" id="location">
                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Office Address</label>
                        <input type="text" class="shadow-none fs-13 form-control" name="address" id="address" placeholder="Your work address">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="shadow-none fs-13 form-control" name="phone" placeholder="(+234) 800 0000 000" id="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <textarea class="shadow-none fs-13 form-control" name="msg" id="msg" cols="4" rows="4" placeholder="Write a message(Optional)"></textarea>
                        @error('msg')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-default" style="background: #00A75A; color: #fff">Submit booking</button>
                </form>
              </div>
              @endif
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