@extends('layouts.admin')
<title>Account in review</title>
@section('content')

<div class="container">
    
    {{-- session --}}
  @if (session('message'))
  <div class="px-3">
    <div class="row">
      <div class="col-md-12">
          <div class="hide-from-mobile mt-2"></div>

              {{-- alert --}}
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                  {{ session('message') }}
                  kkkkkkkkkkkk
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 6px">
                    <span aria-hidden="true"><i class="fa fa-window-close"></i></span>
                  </button>
              </div>

      </div>
  </div>
  </div>
@endif

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow my-8 text-start">
                <div class="text-center my-5">
                    <img class="card-img-top" style="height: 100px; width: 100px;" src="{{ asset('assets/images/svg/alert.svg') }}" alt="Title">
                </div>

                <div class="card-body">
                    <h5 class="card-title text-center" style="color: #00A75A">Account in Review</h5>
                    <p class="card-text text-center">Your Account has been set up successfully, <br> FBILTD will review your account and approve you to use our platform.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
