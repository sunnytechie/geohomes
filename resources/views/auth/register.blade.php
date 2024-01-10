@extends('layouts.auth')

@section('content')

{{-- <section class="py-2">
    <div class="container">
        <div class="row justify-content-center login-register">
            <div class="col-md-12">
                <a href="/">
                    <img height="100px" width="180px" src="{{ asset('assets/images/logo/FBILTDlogo.png') }}" alt="">
                </a>
                <p class="mb-4" style="color: #fff; font-weight:600">Choose a signup option.</p>
            </div>
        </div>


        <div class="row justify-content-center mb-7">

        <div class="col-sm-3 col-12 sm-mb-4">
            <a href="{{ route('auth.customer') }}">
            <div class="card border-1 shadow">
                <img class="regImg" src="{{ asset('assets/images/svg/customer.png') }}" alt="">
                <div class="py-2 text-center" style="border-top: 1px solid #ccc; font-weight:600; color: #654321">Register as a Customer</div>
            </div>
            </a>
        </div>

        <div class="col-sm-3 col-12">
            <a href="{{ route('auth.agent') }}">
            <div class="card border-1 shadow">
                <img class="regImg" src="{{ asset('assets/images/svg/provider.png') }}" alt="">
                <div class="py-2 text-center" style="border-top: 1px solid #ccc; font-weight:600; color: #654321">Join as an Agent</div>
            </div>
            </a>
        </div>

        </div>
    </div>
</section> --}}

<div class="row justify-content-center">
    <div class="col-md-8">
      <div class="mb-4">
        <h3><strong>FBILTD</strong> SignUp</h3>
        <p class="mb-4">Have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>

    <div class="col-md-8">
        <a style="height: auto; text-decoration: none;" href="{{ route('auth.customer') }}" type="button" class="btn btn-primary btn-lg btn-block rounded-0 geo-btn-bg w-100 mb-4">Client</a>
        <a style="height: auto; text-decoration: none;" href="{{ route('auth.agent') }}" type="button" class="btn btn-primary btn-lg btn-block rounded-0 geo-btn-bg w-100 my-4">Partner</a>
        <a style="height: auto; text-decoration: none;" href="{{ route('auth.agent.coperate') }}" type="button" class="btn btn-primary btn-lg btn-block rounded-0 geo-btn-bg w-100 my-4">Corperate Partner</a>

        <a href="/" class="text-left my-1"> Not ready?</a>
    </div>

</div>


@endsection
