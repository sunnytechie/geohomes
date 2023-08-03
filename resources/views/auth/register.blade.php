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

body {
    background: #fff !important;
}

</style>
<section class="py-2">
    <div class="container">
        <div class="row justify-content-center login-register">
            <div class="col-md-6">
                <a href="/">
                    <img height="100px" width="180px" src="{{ asset('assets/images/logo/geohomeslogo.png') }}" alt="">
                </a>
                <p class="mb-4" style="color: #00A75A; font-weight:600">Choose a signup option.</p>
            </div>
        </div>
        {{-- <div class="mt-9 hide-from-1024"></div> --}}
        <div class="row justify-content-center mb-7">
        <div class="col-md-3 col-6">
            <a href="{{ route('auth.customer') }}">
            <div class="card border-1 shadow">
                <img class="regImg" src="{{ asset('assets/images/svg/customer.png') }}" alt="">
                <div class="py-2 text-center" style="border-top: 1px solid #ccc; font-weight:600; color: #00A75A">Customer</div>
            </div>
            </a>
        </div>

        <div class="col-md-3 col-6">
            <a href="{{ route('auth.agent') }}">
            <div class="card border-1 shadow">
                <img class="regImg" src="{{ asset('assets/images/svg/provider.png') }}" alt="">
                <div class="py-2 text-center" style="border-top: 1px solid #ccc; font-weight:600; color: #00A75A">Agent</div>
            </div>
            </a>
        </div>

        </div>
    </div>
</section>


@endsection
