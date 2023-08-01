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
  }

</style>

<main id="content">

  <section class="mt-12 pb-5 pb-lg-10 page-title bg-overlay bg-img-cover-center" style="background-image: url('assets/images/bg-home-6.jpg');">
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
    <section class="pb-9 pb-md-11 mt-10">
        <div class="container">


            @foreach ($projects as $project)
            <div class="mb-5">
              <div class="row">
                <div class="col-md-4">
                  <a href="{{ route('estate.show', $project->id) }}">
                    <img src="/storage/{{ $project->image }}" class="card-img" alt="{{ $project->title }}">
                  </a>
                </div>

                <div class="col-md-4">
                  <div>
                    <h2 class="my-0">
                      <a href="{{ route('estate.show', $project->id) }}" class="fs-16 lh-2 text-dark hover-primary d-block">{{ $project->title }}</a>
                    </h2>
                    <p class="mb-2 font-weight-500 text-gray-light">{{ $project->address }}</p>
                    <p class="mb-2 mxw-571 ml-0"><p>{{ Str::limit($project->description, 150) }}</p>
                    <p class="mb-6">₦ {{ $project->price }}</p>
                  </div>

                  <div class="d-flex mb-3">
                    <button class="btn btn-primary rounded-0 border-0" data-toggle="modal" data-target="#exampleModal{{ $project->id }}" style="background: #00A75A;">Subscribe</button>

                    <form action="{{ route('inspection') }}" method="POST" style="padding: 0; margin-bottom: 0;">
                      @csrf
                      <input type="hidden" name="project_id" value="{{ $project->id }}">
                      <button type="submit" class="btn btn-primary rounded-0 border-0" style="background: #00A75A">Book Inspection</button>
                    </form>
                  </div>
                </div>

                <div class="col-md-4">
                  {{-- map height 200, width 100% --}}
                  @if ($project->map_embed_code)
                    <div class="map-container">
                      {!! $project->map_embed_code !!}
                    </div>
                    {{-- End map --}}
                  @endif

                </div>
              </div>
            </div>

            <!-- Modal -->
              <div class="modal fade" id="exampleModal{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered custom-modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Subscribe</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('subscription') }}" method="POST" style="padding: 0; margin-bottom: 0; margin-right: 10px">
                      @csrf
                      <input type="hidden" name="project_id" value="{{ $project->id }}">
                      <div class="modal-body">
                        
                        <div class="my-2" style="color: #00A75A">After selecting the number of plots you want, you will first be prompted to subscribe for an allocation with a fee of ₦ 20,000 (twenty thousand naira). <br> After the allocation is made you have 14days to pay for the land else the plot(s) you subscribed for will be available for purchase to other customers.</div>

                        <div class="input-group input-group-lg">
                          <label for="plots">Select the Number of plots you want.</label>
                          <input class="shadow-none fs-13 form-control" value="2" name="plots" id="plots" type="number">

                          @error('plots')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="background: #00A75A">Proceed</button>
                      </div>
                    </form>
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
