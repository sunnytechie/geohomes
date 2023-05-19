@extends('layouts.guest')
@section('content')
<section class="py-2">
    <div class="container">
        <div class="mt-12 hide-from-1024"></div>
        <div class="row justify-content-center login-register">
        <div class="col-md-6">
            <div class="card border-1 shadow mb-10">
            <div class="card-body">
                <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2">Sign Up</h2>
                <p class="mb-4">Have an account? <a href="{{ route('login') }}" class="text-heading hover-primary"><u>Sign In</u></a></p>
                
                <form class="form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-row mx-n2">

                    <div class="col-sm-12 px-2">
                    <div class="form-group">
                        <label for="name" class="text-heading">Legal Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror form-control-lg border-0" value="{{ old('name') }}" id="name" placeholder="Full Name">
                    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    
                </div>

                <div class="form-row mx-n2">
                    <div class="col-sm-12 px-2">
                    <div class="form-group">
                        <label for="email" class="text-heading">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror form-control-lg border-0" value="{{ old('email') }}" id="email" placeholder="Your Email" name="email">

                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    </div>
                </div>

                <div class="form-row mx-n2">
                    <div class="col-sm-6 px-2">
                    <div class="form-group">
                        <label for="password-1" class="text-heading">Password</label>
                        <div class="input-group input-group-lg">
                        <input type="password" class="form-control password-input @error('password') is-invalid @enderror border-0 shadow-none" id="password-1" name="password" placeholder="Password">
                        
                        <div class="input-group-append show-password" style="cursor: pointer">
                            <span class="input-group-text bg-gray-01 border-0 text-body fs-18"><i class="far fa-eye"></i></span>
                        </div>
                    </div>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>

                    <div class="col-sm-6 px-2">
                    <div class="form-group">
                        <label for="re-password">Re-Enter Password</label>
                        <div class="input-group input-group-lg">
                        <input type="password" class="form-control password-input2 border-0 shadow-none" id="password-confirmation" name="password_confirmation" placeholder="Password">
                        
                        <div class="input-group-append show-password2" style="cursor: pointer">
                            <span class="input-group-text bg-gray-01 border-0 text-body fs-18"><i class="far fa-eye"></i></span>
                        </div>
                        </div>
                    </div>
                    </div>

                </div>
                
                <button type="submit" class="btn btn-primary geo-btn-bg btn-lg btn-block rounded">Register</button>
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
@endsection
