@extends('layouts.app')

@section('content')
<main id="content">
        @include('snippets.home.welcomeslide')
        @include('snippets.home.join')
        @include('snippets.home.projects')
        @include('snippets.home.advert')
        @include('snippets.home.sale')
        @include('snippets.home.explore')
        @include('snippets.home.rent')
        {{-- @include('snippets.home.building') --}}
        @include('snippets.home.listings')
        @include('snippets.home.blogs')
        @include('snippets.home.contact')

   {{--  @include('snippets.home.partners')  --}}
    {{-- <div id="compare" class="compare">
      <button class="btn shadow btn-open bg-white bg-hover-accent text-secondary rounded-right-0 d-flex justify-content-center align-items-center w-30px h-140 p-0">
      </button>
      <div class="list-group list-group-no-border bg-dark py-3">
        <a href="#" class="list-group-item bg-transparent text-white fs-22 text-center py-0">
          <i class="far fa-bars"></i>
        </a>
        <div class="list-group-item card bg-transparent">
          <div class="position-relative hover-change-image bg-hover-overlay">
            <img src="images/compare-01.jpg" class="card-img" alt="properties">
            <div class="card-img-overlay">
              <a href="#" class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i class="fal fa-minus-circle"></i></a>
            </div>
          </div>
        </div>
        <div class="list-group-item card bg-transparent">
          <div class="position-relative hover-change-image bg-hover-overlay">
            <img src="images/compare-02.jpg" class="card-img" alt="properties">
            <div class="card-img-overlay">
              <a href="#" class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i class="fal fa-minus-circle"></i></a>
            </div>
          </div>
        </div>
        <div class="list-group-item card card bg-transparent">
          <div class="position-relative hover-change-image bg-hover-overlay ">
            <img src="images/compare-03.jpg" class="card-img" alt="properties">
            <div class="card-img-overlay">
              <a href="#" class="text-white hover-image fs-16 lh-1 pos-fixed-top-right position-absolute m-2"><i class="fal fa-minus-circle"></i></a>
            </div>
          </div>
        </div>
        <div class="list-group-item bg-transparent">
          <a href="compare-details.html" class="btn btn-lg btn-primary w-100 px-0 d-flex justify-content-center">
            Compare
          </a>
        </div>
      </div>
    </div> --}}


  </main>
@endsection
