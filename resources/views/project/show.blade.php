<title>{{ $project->title }}</title>
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
.MapPlaceHolder {
    max-height: 200px;
}

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

</style>

<main id="content">
  <section>
    <div class="spacer mt-13 hide-from-mobile"></div>
    <div class="container">
      {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb pt-lg-0 pb-3">
          <li class="breadcrumb-item fs-12 letter-spacing-087">
            <a href=".">Home</a>
          </li>
          <li class="breadcrumb-item fs-12 letter-spacing-087">
            <a href="listing-grid-with-left-filter.html">Listing</a>
          </li>
          <li class="breadcrumb-item fs-12 letter-spacing-087 active">Villa on Hollywood Boulevard</li>
        </ol>
      </nav>
    </div> --}}
    <div class="container-fluid">
      <div class="position-relative" data-animate="zoomIn">

      <div class="row galleries m-n1">
        <div class="col-lg-6 p-1">
          <div class="item item-size-4-3">
            <div class="card p-0 hover-zoom-in">
              <a href="/storage/{{ $project->image }}" class="card-img"
                    data-gtf-mfp="true"
                    data-gallery-id="01"
                    style="background-image:url('/storage/{{ $project->image }}')">
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 p-1">
          <div class="row m-n1">
            @php
                $images = ["$project->file1", "$project->file2", "$project->file3", "$project->file4"];
            @endphp
            @foreach ($images as $image)
            @if ($image)
                <div class="col-md-6 p-1">
                    <div class="item item-size-4-3">
                        <div class="card p-0 hover-zoom-in">
                            <a href="/storage/{{ $image }}" class="card-img"
                              data-gtf-mfp="true"
                              data-gallery-id="01"
                              style="background-image:url('/storage/{{ $image }}')">
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="primary-content pt-8">
  <div class="container">
    <div class="row">
      <article class="col-lg-8 pr-xl-7">
        <section class="pb-7 border-bottom">
          <ul class="list-inline d-sm-flex align-items-sm-center mb-2">
            <li class="list-inline-item mr-2 mt-2 mt-sm-0"><i class="fal fa-clock mr-1"></i>{{ \Carbon\Carbon::parse($project->created_at)->diffForHumans() }}
            </li>
            <li class="list-inline-item mt-2 mt-sm-0"><i class="fal fa-eye mr-1"></i>{{ $project->views }} views</li>
          </ul>
          <div class="d-sm-flex justify-content-sm-between">
            <div>
              <h2 class="fs-35 font-weight-600 lh-15 text-heading">{{ $project->title }}</h2>
              <p class="mb-0"><i class="fal fa-map-marker-alt mr-2"></i>{{ $project->address }}, {{ $project->state }}, {{ $project->country }}</p>
            </div>
            <div class="mt-2 text-lg-right">
              <p class="fs-22 text-heading font-weight-bold mb-0">₦ {{ $project->price }}</p>
              {{-- <p class="mb-0">$9350/SqFt</p> --}}
            </div>
          </div>
          <h4 class="fs-22 text-heading mt-6 mb-2">Description</h4>
          <p class="mb-0 lh-214">{{ $project->description }}</p>
        </section>
      </article>

      <aside class="col-lg-4 pl-xl-4 primary-sidebar sidebar-sticky" id="sidebar">
        <div class="primary-sidebar-inner">
          <div class="card border-0 widget-request-tour">
            <div class="d-flex">
                <a href="{{ route('initiateLandPayment', $project->id) }}" class="btn btn-primary rounded-0 border-0" style="background: #654321;">Subscribe</a>

              <form class="w-50" action="{{ route('inspection') }}" method="POST" style="padding: 0; margin: 0">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <button type="submit" class="btn btn-primary p-2 w-100 rounded-0 border-0" style="background: #654321">Inspection</button>
              </form>
            </div>
          </div>
        </div>
      </aside>
    </div>
  </div>
</div>

<div class="mt-10"></div>
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
