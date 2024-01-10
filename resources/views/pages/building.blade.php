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

  /* Custom style for reduced width on desktop */
  @media (min-width: 768px) {
    .custom-modal-dialog {
    width: 70%;
    }
  }

  /* Maintain full width on mobile */
  @media (max-width: 767px) {
    .custom-modal-dialog {
      width: 100%;
    }
  }

  @media (min-width: 576px) {
      .modal-dialog {
          max-width: 300px;
          margin: 1.75rem auto;
      }

      .my-md-xl {
    margin: 20px;
  }
  }

  .my-md-xl {
    margin: 130px;
  }

  @media (max-width: 768px) {
    .my-md-xl {
        margin: 20px;
    }
  }



</style>

<main id="content">

    <div class="my-md-xl"></div>

    <section class="pb-9">
        <div class="container">

            @foreach ($buildings as $building)
                <div class="mb-5">
                <div class="row">
                    <div class="col-md-5">
                        <img src="/storage/{{ $building->file }}" class="card-img" alt="{{ $building->title }}">
                    </div>

                    <div class="col-md-5">
                    <div>
                        <h2 class="my-0">
                        <a href="{{ route('booking.building.material.show', $building->id) }}" class="fs-16 lh-2 text-dark hover-primary d-block">{{ $building->title }}</a>
                        </h2>
                        <p class="mb-2 mxw-571 ml-0"><p>{{ Str::limit($building->description, 150) }}</p>
                        <p class="mb-6">₦ {{ $building->price }}</p>
                    </div>

                    <div class="d-flex mb-3">
                        <a href="{{ route('booking.building.material.show', $building->id) }}" class="btn btn-primary rounded-0 border-0" style="background: #654321;">Book Material</a>
                    </div>
                    </div>


                </div>
                </div>
            @endforeach


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
