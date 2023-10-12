@extends('layouts.guest')

@section('content')
<style>
    /* Style the options */
.custom-select option {
  background-color: #f8f9fa;
  color: #343a40;
}

/* Style the selected option */
.custom-select option:checked {
  background-color: #007bff;
  color: #fff;
}

.login-register {
    margin-top: 45px;
}

/* @media 425px */
@media (max-width: 426px) {
    .card {
        width: 85%;
        margin: 0 auto;
    }
    .regImg {
    width: 100%;
    height: 200px;
    object-fit: cover;
    margin: 0 auto;
}

.sm-mb-4 {
    margin-bottom: 1.5rem!important;
}
}


</style>
<section class="py-2">
    <div class="container">
        <div class="row justify-content-center login-register">
            <div class="col-md-12">
                <a href="/">
                    <img height="100px" width="180px" src="{{ asset('assets/images/logo/geohomeslogo.png') }}" alt="">
                </a>
                <p class="mb-4" style="color: #fff; font-weight:600">Choose a signup option.</p>
            </div>
        </div>

        {{-- <div class="mt-9 hide-from-1024"></div> --}}
        <div class="row justify-content-center mb-7">

        <div class="col-sm-3 col-12 sm-mb-4">
            <a href="{{ route('auth.customer') }}">
            <div class="card border-1 shadow">
                <img class="regImg" src="{{ asset('assets/images/svg/customer.png') }}" alt="">
                <div class="py-2 text-center" style="border-top: 1px solid #ccc; font-weight:600; color: #00A75A">Register as a Customer</div>
            </div>
            </a>
        </div>

        <div class="col-sm-3 col-12">
            <a href="{{ route('auth.agent') }}">
            <div class="card border-1 shadow">
                <img class="regImg" src="{{ asset('assets/images/svg/provider.png') }}" alt="">
                <div class="py-2 text-center" style="border-top: 1px solid #ccc; font-weight:600; color: #00A75A">Join as an Agent</div>
            </div>
            </a>
        </div>

        </div>
    </div>
</section>


@endsection
