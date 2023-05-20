@extends('layouts.admin')

@section('content')

<div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
    <div class="d-flex flex-wrap flex-md-nowrap mb-6">
      <div class="mr-0 mr-md-auto">
        <h2 class="mb-0 text-heading fs-22 lh-15">Hi, {{ Auth::user()->name }}</h2>
        <p>Your Dashboard gives you a heads-up on your analytics.</p>
      </div>
      <div>
        <a href="{{ route('properties.create') }}" class="btn btn-primary btn-lg">
          <span>Add New Property</span>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6 col-xxl-3 mb-6">
        <div class="card">
          <div class="card-body row align-items-center px-6 py-7">
            <div class="col-5">
              <span class="w-83px h-83 d-flex align-items-center justify-content-center fs-36 badge badge-blue badge-circle">
                <i class="fa fa-home"></i>
              </span>
            </div>
            <div class="col-7 text-center">
              <p class="fs-42 lh-12 mb-0 counterup" data-start="0"
                 data-end="{{ $properties->count(); }}" data-decimals="0"
                 data-duration="0" data-separator="">{{ $properties->count(); }}</p>
              <p>Properties</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xxl-3 mb-6">
        <div class="card">
          <div class="card-body row align-items-center px-6 py-7">
            <div class="col-5">
              <span class="w-83px h-83 d-flex align-items-center justify-content-center fs-36 badge badge-green badge-circle">
                <i class="fa fa-briefcase"></i>
              </span>
            </div>
            <div class="col-7 text-center">
              <p class="fs-42 lh-12 mb-0 counterup" data-start="0"
                 data-end="{{ $projects->count(); }}" data-decimals="0"
                 data-duration="0" data-separator="">{{ $projects->count(); }}</p>
              <p>Projects</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xxl-3 mb-6">
        <div class="card">
          <div class="card-body row align-items-center px-6 py-7">
            <div class="col-4">
              <span class="w-83px h-83 d-flex align-items-center justify-content-center fs-36 badge badge-yellow badge-circle">
                <i class="fa fa-users"></i>
              </span>
            </div>
            <div class="col-8 text-center">
              <p class="fs-42 lh-12 mb-0 counterup" data-start="0"
                 data-end="{{ $agents->count(); }}" data-decimals="0"
                 data-duration="0" data-separator="">{{ $agents->count(); }}</p>
              <p>Agents</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xxl-3 mb-6">
        <div class="card">
          <div class="card-body row align-items-center px-6 py-7">
            <div class="col-5">
              <span class="w-83px h-83 d-flex align-items-center justify-content-center fs-36 badge badge-pink badge-circle">
                <i class="fa fa-map"></i>
              </span>
            </div>
            <div class="col-7 text-center">
              <p class="fs-42 lh-12 mb-0 counterup" data-start="0"
                 data-end="{{ $destinations->count(); }}" data-decimals="0"
                 data-duration="0" data-separator="">{{ $destinations->count(); }}</p>
              <p>Destinations</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    {{-- Statistics --}}
    

  </div>

@endsection