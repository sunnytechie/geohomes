@extends('layouts.guest')


@section('content')
<section class="py-2">
    <div class="container">
      <div class="mt-7 hide-from-1024"></div>
      <div class="row justify-content-center login-register mt-10">
        <div class="col-md-4">
          <div class="card border-1 shadow">
            <div class="card-body">
                <a href="/">
                    <img height="100px" width="180px" src="{{ asset('assets/images/logo/geohomeslogo.png') }}" alt="">
                </a>
                {{-- <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2">Log In</h2> --}}
              <p class="mb-4">Don't have an account? <a href="{{ route('register') }}" class="text-heading hover-primary"><u>Sign Up</u></a></p>

              <form class="form" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-4">
                  {{-- <label for="email">Email</label> --}}
                  <input type="email" class="form-control @error('email') is-invalid @enderror form-control-lg" id="email" name="email" value="{{ old('email') }}" placeholder="Your email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                  {{-- <label for="password-2">Password</label> --}}
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
  </section>

  <script>
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

</script>
@endsection
