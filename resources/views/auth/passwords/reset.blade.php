@extends('layouts.guest')

@section('content')
<section class="py-2">
    <div class="container">
      <div class="mt-12 hide-from-1024"></div>
      <div class="row justify-content-center login-register">
        <div class="col-md-5">
          <div class="card border-1 shadow mb-10">
            <div class="card-body">
              <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2">Reset Password</h2>
              <p class="mb-4">Remember your credentials? <a href="{{ route('login') }}" class="text-heading hover-primary"><u>Sign In</u></a></p>

              <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row mb-3">
                    {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-lg border-0" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                    <div class="col-md-12">
                        
                        <div class="input-group input-group-lg">
                            <input id="password" type="password" placeholder="New Password" class="form-control @error('password') is-invalid @enderror form-control-lg border-0 password-input" name="password" required autocomplete="new-password">

                            <div class="input-group-append show-password" style="cursor: pointer; position:absolute; right: 0; z-index: 999; background: transparent; margin-top: 8px">
                                <span class="input-group-text border-0 text-body fs-18"  style="background-color: transparent"><i class="far fa-eye"></i></span>
                            </div>
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label> --}}

                    <div class="col-md-12">
                        <div class="input-group input-group-lg">
                            <input id="password-confirm" type="password" class="form-control form-control-lg border-0 password-input2" placeholder="Re-type password" name="password_confirmation" required autocomplete="new-password">

                            <div class="input-group-append show-password2" style="cursor: pointer; position:absolute; right: 0; z-index: 999; background: transparent; margin-top: 8px">
                                <span class="input-group-text border-0 text-body fs-18"  style="background-color: transparent"><i class="far fa-eye"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-lg btn-block rounded geo-btn-bg w-100">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
                </div>
            </div>
  
          </div>
  
  
        </div>
      </div>
    </section>

    <script>
        const passwordInput = document.querySelector(".password-input");
        const showPasswordButton = document.querySelector(".show-password");
        const passwordInput2 = document.querySelector(".password-input2");
        const showPasswordButton2 = document.querySelector(".show-password2");
    
        showPasswordButton.addEventListener("click", function() {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showPasswordButton.innerHTML = '<span class="input-group-text border-0 text-body fs-18" style="background-color: transparent"><i class="far fa-eye-slash"></i></span>';
        } else {
            passwordInput.type = "password";
            showPasswordButton.innerHTML = '<span class="input-group-text border-0 text-body fs-18" style="background-color: transparent"><i class="far fa-eye"></i></span>';
        }
        });
    
        showPasswordButton2.addEventListener("click", function() {
        if (passwordInput2.type === "password") {
            passwordInput2.type = "text";
            showPasswordButton2.innerHTML = '<span class="input-group-text border-0 text-body fs-18" style="background-color: transparent"><i class="far fa-eye-slash"></i></span>';
        } else {
            passwordInput2.type = "password";
            showPasswordButton2.innerHTML = '<span class="input-group-text border-0 text-body fs-18" style="background-color: transparent"><i class="far fa-eye"></i></span>';
        }
        });
    </script>

  @endsection
  