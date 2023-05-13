<div class="modal fade login-register login-register-modal" id="login-register-modal" tabindex="-1" role="dialog"
     aria-labelledby="login-register-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered mxw-571" role="document">
        <div class="modal-content">
          <div class="modal-header border-0 p-0">
            <div class="nav nav-tabs row w-100 no-gutters" id="myTab" role="tablist">
              <a class="nav-item col-5 col-sm-3 ml-0 nav-link pr-6 py-4 pl-9 active fs-18" id="login-tab"
                       data-toggle="tab"
                       href="#login"
                       role="tab"
                       aria-controls="login" aria-selected="true">Login</a>
              <a class="nav-item col-5 col-sm-3 ml-0 nav-link py-4 px-6 fs-18" id="register-tab" data-toggle="tab"
                       href="#register"
                       role="tab"
                       aria-controls="register" aria-selected="false">Register</a>
              <div class="nav-item col-2 col-sm-6 ml-0 d-flex align-items-center justify-content-end">
                <button type="button" class="close m-0 fs-23" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          </div>

          <div class="modal-body p-4 py-sm-7 px-sm-8">
            <div class="tab-content shadow-none p-0" id="myTabContent">
              <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                
                <form class="form" method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="form-group mb-4">
                    <label for="email" class="sr-only">Username</label>
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend ">
                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18"
                                                      id="inputGroup-sizing-lg">
                          <i class="far fa-user"></i></span>
                      </div>
                      <input type="text" class="form-control border-0 shadow-none fs-13"
                                           id="email" name="email" required
                                           placeholder="Your email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend ">
                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                          <i class="far fa-lock"></i>
                        </span>
                      </div>
                      <input type="password" 
                        class="form-control border-0 shadow-none fs-13 password-input"
                        id="password" 
                        name="password" 
                        required
                        placeholder="Password">
                      <div class="input-group-append show-password">
                        <span class="input-group-text bg-gray-01 border-0 text-body fs-18"><i class="far fa-eye"></i></span>
                      </div>

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                    </div>
                  </div>
                  <div class="d-flex mb-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="remember-me" name="remember-me">
                      <label class="form-check-label" for="remember-me">
                        Remember me
                      </label>
                    </div>
                    <a href="#" class="d-inline-block ml-auto text-orange fs-15">
                      Lost password?
                    </a>
                  </div>

                  {{-- <div class="d-flex p-2 border re-capchar align-items-center mb-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="verify" name="verify" required>
                      <label class="form-check-label" for="verify">
                        I'm not a robot
                      </label>
                    </div>
                    <a href="#" class="d-inline-block ml-auto">
                      <img src="{{ asset('assets/images/re-captcha.png') }}" alt="Re-capcha">
                    </a>
                  </div> --}}

                  <button type="submit" class="btn btn-primary btn-lg btn-block">Log in</button>
                </form>

                {{-- <div class="divider text-center my-2">
                  <span class="px-4 bg-white lh-17 text">
                    or continue with
                  </span>
                </div> --}}

                {{-- Login with google --}}
                {{-- <a href="#" class="btn btn-lg btn-block google px-0">
                    <div class="d-flex justify-content-center align-items-center">
                    <div><img src="{{ asset('assets/images/google.png') }}" alt="Google"></div>
                    <div class="mx-2">Google</div>
                    </div>
                </a> --}}

              </div>

              <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                
                <form class="form" method="POST" action="{{ route('register') }}">
                  @csrf

                  <div class="form-group mb-4">
                    <label for="name" class="sr-only">Full name</label>
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend ">
                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                          <i class="far fa-address-card"></i></span>
                      </div>
                      <input type="text" 
                        class="form-control border-0 shadow-none fs-13"
                        id="name" 
                        name="name" 
                        required
                        placeholder="Full name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend ">
                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                          <i class="far fa-user"></i></span>
                      </div>
                      <input 
                        type="email" 
                        class="form-control border-0 shadow-none fs-13"
                        required
                        id="email" 
                        name="email" 
                        placeholder="Your email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                <div class="form-row">
                    <div class="form-group col-md-12 mb-4">
                        <label for="password" class="sr-only">Password</label>
                        <div class="input-group input-group-lg">
                        <div class="input-group-prepend ">
                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                            <i class="far fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" 
                                class="form-control border-0 shadow-none fs-13 password-input2"
                                id="password" 
                                name="password" 
                                required
                                placeholder="Password">
                        <div class="input-group-append show-password2">
                            <span class="input-group-text bg-gray-01 border-0 text-body fs-18"><i class="far fa-eye"></i></span>
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        
                    </div>

                    <div class="form-group col-md-12 mb-4">
                        <label for="password" class="sr-only">Password</label>
                        <div class="input-group input-group-lg">
                        <div class="input-group-prepend ">
                            <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                            <i class="far fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" 
                                class="form-control border-0 shadow-none fs-13 password-input3"
                                id="password_confirmation" 
                                name="password_confirmation" 
                                required
                                placeholder="Confirm Password">
                        <div class="input-group-append show-password3">
                            <span class="input-group-text bg-gray-01 border-0 text-body fs-18"><i class="far fa-eye"></i></span>
                        </div>
                        </div>
            
                    </div>

                    <p class="form-text">Minimum 8 characters with 1 number and 1 letter</p>
                </div>

                  <button type="submit" class="btn btn-primary btn-lg btn-block">Sign up</button>
                </form>

                {{-- <div class="divider text-center my-2">
                  <span class="px-4 bg-white lh-17 text">
                    or continue with
                  </span>
                </div> --}}

                {{-- Login with google --}}
                {{-- <a href="#" class="btn btn-lg btn-block google px-0">
                    <div class="d-flex justify-content-center align-items-center">
                    <div><img src="{{ asset('assets/images/google.png') }}" alt="Google"></div>
                    <div class="mx-2">Google</div>
                    </div>
                </a> --}}

                <div class="mt-2">By creating an account, you agree to Geohomes Group
                  <a class="text-heading" href="#"><u>Terms of Use</u> </a> and
                  <a class="text-heading" href="#"><u>Privacy Policy</u></a>.
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
        const passwordInput = document.querySelector(".password-input");
        const showPasswordButton = document.querySelector(".show-password");
        const passwordInput2 = document.querySelector(".password-input2");
        const showPasswordButton2 = document.querySelector(".show-password2");

        showPasswordButton.addEventListener("click", function() {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showPasswordButton.innerHTML = '<span class="input-group-text bg-gray-01 border-0 text-body fs-18"><i class="far fa-eye-slash"></i></span>';
        } else {
            passwordInput.type = "password";
            showPasswordButton.innerHTML = '<span class="input-group-text bg-gray-01 border-0 text-body fs-18"><i class="far fa-eye"></i></span>';
        }
        });

        showPasswordButton2.addEventListener("click", function() {
        if (passwordInput2.type === "password") {
            passwordInput2.type = "text";
            showPasswordButton2.innerHTML = '<span class="input-group-text bg-gray-01 border-0 text-body fs-18"><i class="far fa-eye-slash"></i></span>';
        } else {
            passwordInput2.type = "password";
            showPasswordButton2.innerHTML = '<span class="input-group-text bg-gray-01 border-0 text-body fs-18"><i class="far fa-eye"></i></span>';
        }
        });
    </script>
