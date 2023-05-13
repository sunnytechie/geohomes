@extends('layouts.guest')

@section('content')
<section class="py-2">
    <div class="container">
      <div class="row login-register">
        <div class="col-md-6 offset-md-3">
          <div class="card border-0 shadow-xxs-2 mb-6">
            <div class="card-body px-8 py-6">
              <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2">Log In</h2>
              <p class="mb-4">Don't have an account? <a href="{{ route('register') }}" class="text-heading hover-primary"><u>Sign Up</u></a></p>
              
              <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group mb-4">
                  <label for="email">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror form-control-lg border-0" id="email" name="email" value="{{ old('email') }}" placeholder="Your email">
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                  <label for="password-2">Password</label>
                  <div class="input-group input-group-lg">
                    <input type="text" class="form-control @error('password') is-invalid @enderror border-0 shadow-none fs-13" id="password-2" name="password" placeholder="Password">
                    
                    <div class="input-group-append">
                      <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                        <i class="far fa-eye-slash"></i>
                      </span>
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
                  <a href="password-recovery.html" class="d-inline-block ml-auto fs-13 lh-2 text-body">
                    <u>Forgot your password?</u>
                  </a>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Log in</button>
              </form>
              
            </div>
          </div>

        </div>


      </div>
    </div>
  </section>
@endsection
