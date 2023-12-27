@extends('layouts.auth')

@section('content')
{{-- <section class="py-2">
    <div class="container">
      <div class="mt-12 hide-from-1024"></div>
      <div class="row justify-content-center login-register">
        <div class="col-md-5">
          <div class="card border-1 shadow mb-10">
            <div class="card-body">
              <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2">Reset Password</h2>
              <p class="mb-4">Remember your credentials? <a href="{{ route('login') }}" class="text-heading hover-primary"><u>Sign In</u></a></p>

              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif

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
                              <button type="submit" class="btn btn-primary geo-btn-bg btn-lg btn-block rounded">Send Reset link</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

          </div>


        </div>
      </div>
</section> --}}


<div class="row justify-content-center">
    <div class="col-md-8">
      <div class="mb-4">
      <h3>Reset Password</h3>
      @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @else
            <p class="mb-4">Don't have account with us? <a href="{{ route('register') }}">Join today!</a></p>
        @endif

    </div>
    <form action="{{ route('password.email') }}" method="post">
        @csrf

      <div class="form-group first mb-4">
        <label for="email">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" required>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>


      <input type="submit" value="Send Reset link" class="btn text-white btn-block btn-primary">

      <a href="/" class="text-right my-4"> Not ready?</a>


    </form>
    </div>
  </div>

@endsection


