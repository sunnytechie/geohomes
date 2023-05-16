@extends('layouts.guest')

@section('content')
<section class="py-2">
    <div class="container">
      <div class="mt-12 hide-from-1024"></div>
      <div class="row login-register">
        <div class="col-md-6 offset-md-3">
          <div class="card border-1 shadow mb-10">
            <div class="card-body">
              <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2">Reset Password</h2>
              <p class="mb-4">Remember your credentials? <a href="{{ route('login') }}" class="text-heading hover-primary"><u>Sign In</u></a></p>
              

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-12 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-lg border-0" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Send Reset link</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
  
          </div>
  
  
        </div>
      </div>
    </section>

  @endsection
  