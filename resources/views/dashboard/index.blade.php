@extends('layouts.admin')

@section('content')

<div class="container">
  <div class="row">
    @foreach ($pendingPayments as $alert)
      <div class="col-md-12">
          <div class="hide-from-mobile mt-2"></div>
              {{-- alert --}}
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <p>Hi {{ Auth::user()->name }},</p>
                  <p>Sequel to your subscription to purchase land(s) in {{ $alert->project->title }} at {{ $alert->project->address }}</p>
                  <p>We are deligted to inform you that we have allocated your plots and requesting that you pay for the land with an addition fee of ₦ 100,000 (one hundred naira) for legal fee.</p>
                  @php
                      $totalFee = $alert->project->price * $alert->plots;
                      $totalFee = $totalFee + 100000;
                  @endphp
                  <p>Total fee: ₦ {{ $totalFee }}</p>
                  <p style="color: red">Please note that this transaction will <b>expire on {{ \Carbon\Carbon::parse($alert->expiry_date)->format('d M Y') }}</b> and will be available to another customer if you don't pay.</p>

                  <form action="{{ route('finalLandPayment', $alert->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="amount" value="{{ $totalFee }}">
                    <button type="submit" class="btn btn-default" style="background: #00A75A; color: #fff"">
                      Pay now ₦ {{ $totalFee }}
                    </button>
                  </form>
              </div>
      </div>
    @endforeach
  </div>
</div>

<div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
  {{-- session --}}
  @if (session('message'))
  <div class="row">
      <div class="col-md-12">
          <div class="hide-from-mobile mt-2"></div>
          
              {{-- alert --}}
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                  {{ session('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 6px">
                  <span aria-hidden="true" style="font-size: 12px">Close</span>
                  </button>
              </div>
          
      </div>
  </div>
  @endif

  

    <div class="d-flex flex-wrap flex-md-nowrap mb-6">
      <div class="mr-0 mr-md-auto">
        <h2 class="mb-0 text-heading fs-22 lh-15">Hi, {{ Auth::user()->name }}</h2>
        @if (Auth::user()->is_agent)
          @if (Auth::user()->agent->subscribed != 1)
              You can only post 3 properties on GeoHomes, <a href="{{ route('agent') }}">You can Upgrade to 10 at #10,000</a>.
          @else
          <p>You're on a Pro Agent with GeoHomes. Your subscription is active.</p>
          @endif
           @else 
           <p>Your Dashboard gives you a heads-up on your analytics.</p>
        @endif
      </div>

    
      @if (Auth::user()->is_admin || Auth::user()->is_agent)
      <div>
        <a href="{{ route('properties.create') }}" class="btn btn-primary btn-lg">
          <span>Add New Property</span>
        </a>
      </div>
      @endif
      

    </div>

    <div class="row">
      <div class="col-sm-6 col-xxl-3 mb-6">
        <div class="card">
          <div class="card-body row align-items-center px-6 py-7">
            <div class="col-5">
              <span class="w-83px h-83 d-flex align-items-center justify-content-center fs-36 badge badge-yellow badge-circle">
                <i class="fal fa-file-invoice"></i>
              </span>
            </div>
            <div class="col-7 text-center">
              <p class="fs-42 lh-12 mb-0 counterup" data-start="0"
                 data-end="{{ $transactions->count(); }}" data-decimals="0"
                 data-duration="0" data-separator="">{{ $transactions->count(); }}</p>
              <p>Transactions</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-xxl-3 mb-6">
        <div class="card">
          <div class="card-body row align-items-center px-6 py-7">
            <div class="col-5">
              <span class="w-83px h-83 d-flex align-items-center justify-content-center fs-36 badge badge-yellow badge-circle">
                <i class="fal fa-file-invoice"></i>
              </span>
            </div>
            <div class="col-7 text-center">
              <p class="fs-42 lh-12 mb-0 counterup" data-start="0"
                 data-end="{{ $inspections->count(); }}" data-decimals="0"
                 data-duration="0" data-separator="">{{ $inspections->count(); }}</p>
              <p>Inspections</p>
            </div>
          </div>
        </div>
      </div>


      @if (Auth::user()->is_agent)
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
      @endif
      

      @if (Auth::user()->is_admin)
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
                <p>Estate</p>
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
      @endif
    </div>


    {{-- Statistics --}}
    @if (Auth::user()->is_admin || Auth::user()->manager)
      @include('dashboard.statistics')
    @endif
    

  </div>

@endsection