@extends('layouts.guest')
@section('content')
<section class="py-2">
    <div class="container">
        <div class="mt-12 hide-from-1024"></div>
        <div class="row justify-content-center login-register">
        <div class="col-md-5">
            <div class="card border-1 shadow mb-10">
            <div class="card-body">
                <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2">Verify your email account.</h2>
                <p class="mb-4">Not ready? <a href="/" class="text-heading hover-primary"><u>Browse</u></a></p>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </div>
                @endif
                
               
                <p>{{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                
            </div>
            </div>

        </div>


        </div>
    </div>
</section>


@endsection

