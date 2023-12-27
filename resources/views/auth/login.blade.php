@extends('layouts.auth')


@section('content')
{{-- <section class="py-2">
    <div class="container">
      <div class="mt-7 hide-from-1024"></div>
      <div class="row justify-content-center login-register mt-10">
        <div class="col-md-4">
          <div class="card border-1 shadow">
            <div class="card-body">
                <a href="/">
                    <img height="100px" width="180px" src="{{ asset('assets/images/logo/geohomeslogo.png') }}" alt="">
                </a>

              <p class="mb-4">Don't have an account? <a href="{{ route('register') }}" class="text-heading hover-primary"><u>Sign Up</u></a></p>

              <form class="form" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-4">

                  <input type="email" class="form-control @error('email') is-invalid @enderror form-control-lg" id="email" name="email" value="{{ old('email') }}" placeholder="Your email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-4">

                  <div class="input-group input-group-lg">
                    <input type="password" class="form-control password-input @error('password') is-invalid @enderror shadow-none fs-13" id="password" name="password" placeholder="Password">

                    <div class="input-group-append show-password" style="cursor: pointer; position:absolute; right: 0; z-index: 999; background: transparent; margin-top: 8px">
                        <span class="input-group-text border-0 text-body fs-18" style="background-color: transparent"><i class="far fa-eye"></i></span>
                      </div>
                  </div>

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="d-flex mb-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="remember-me-1" name="remember">
                    <label class="form-check-label" for="remember-me-1">Stay signed in </label>
                  </div>
                  <a href="{{ route('password.request') }}" class="d-inline-block ml-auto fs-13 lh-2 text-body">
                    <u>Forgot your password?</u>
                  </a>
                </div>

                <button type="submit" class="btn geo-btn-bg btn-primary btn-lg btn-block rounded">Log in</button>
              </form>

            </div>
          </div>

        </div>


      </div>
      <div class="mt-mobile" style="margin-top: 40px;"></div>
    </div>
</section> --}}

<div class="row justify-content-center">
    <div class="col-md-8">
      <div class="mb-4">
      <h3>Sign In to <strong>GeoHomes</strong></h3>
      <p class="mb-4">Don't have account with us? <a href="{{ route('register') }}">Join today!</a></p>
    </div>
    <form action="{{ route('login') }}" method="post">
        @csrf

      <div class="form-group first">
        <label for="email">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" required>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group last mb-4">
        <label for="password">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="d-flex mb-5 align-items-center">
        <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
          <input type="checkbox" name="remember" checked="checked"/>
          <div class="control__indicator"></div>
        </label>
        <span class="ml-auto"><a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password</a></span>
      </div>

      <input type="submit" value="Log In" class="btn text-white btn-block btn-primary">

      <a href="/" class="text-right my-4"> Not ready?</a>

      {{-- <div class="social-login">
        <a href="#" class="facebook">
          <span class="icon-facebook mr-3"></span>
        </a>
        <a href="#" class="twitter">
          <span class="icon-twitter mr-3"></span>
        </a>
        <a href="#" class="google">
          <span class="icon-google mr-3"></span>
        </a>
      </div> --}}
    </form>
    </div>
  </div>

{{-- <script>
    const passwordInput = document.querySelector(".password-input");
    const showPasswordButton = document.querySelector(".show-password");

    showPasswordButton.addEventListener("click", function() {
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showPasswordButton.innerHTML = '<span class="input-group-text border-0 text-body fs-18" style="background-color: transparent"><i class="far fa-eye-slash"></i></span>';
    } else {
        passwordInput.type = "password";
        showPasswordButton.innerHTML = '<span class="input-group-text border-0 text-body fs-18" style="background-color: transparent"><i class="far fa-eye"></i></span>';
    }
    });
</script> --}}
@endsection
