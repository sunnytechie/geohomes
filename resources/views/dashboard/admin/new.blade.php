<title>GeoHomes - Admin management</title>
@extends('layouts.admin')
@section('content')
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
      {{-- <div class="mb-6">
        <h2 class="mb-0 text-heading fs-22 lh-15">Add new property
        </h2>
        <p class="mb-1">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
      </div> --}}

      <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{ route('admins.store') }}" method="POST">
            @csrf

            <div class="card mb-6">
              <div class="card-body p-6">
                  <h3 class="card-title mb-0 text-heading fs-22 lh-15">Manage Admin Auth</h3>
                  <p class="card-text mb-5">Manage New admin</p>

                  <div class="form-group">
                      <label for="name" class="text-heading">User Name <span class="text-muted">(mandatory)</span></label>
                      <input type="text" class="form-control form-control-lg border-0 @error('name') is-invalid @enderror" placeholder="Full Legal Name" id="name" value="{{ old('name') }}" name="name">
                      
                      @if ($errors->has('name'))
                          <div id="nameHelp" class="form-text text-danger">
                              <div>{{ $errors->first('name') }}</div>
                          </div>
                      @endif
                  </div>

                  <div class="form-group">
                      <label for="email" class="text-heading">email <span class="text-muted">(mandatory)</span></label>
                      <input type="email" class="form-control form-control-lg border-0 @error('email') is-invalid @enderror" placeholder="Email Address" id="email" value="{{ old('email') }}" name="email">
                      
                      @if ($errors->has('email'))
                          <div id="emailHelp" class="form-text text-danger">
                              <div>{{ $errors->first('email') }}</div>
                          </div>
                      @endif
                  </div>

                  <div class="form-group">
                    <label for="role" class="text-heading">Role <span class="text-muted">(mandatory)</span></label>
                    <select class="form-control border-0 shadow-none form-control-lg selectpicker" name="role" id="role">
                      {{-- <option value="superadmin">Super Admin</option> --}}
                      @if (Auth::user()->is_admin)
                        <option value="admin">Super Admin</option>
                      @endif
                      
                      <option value="manager">Manager</option>
                      <option value="auditor">Auditor</option>
                      <option value="accountant">Accountant</option>
                      <option value="marketer">Marketer</option>
                      <option value="secretary">Secretary</option>
                      <option value="staff">Staff</option>
                      <option value="agent">Agent</option>
                    </select>
                    
                    @if ($errors->has('role'))
                        <div id="roleHelp" class="form-text text-danger">
                            <div>{{ $errors->first('role') }}</div>
                        </div>
                    @endif
                </div>

                  <div class="form-group mb-4">
                    <label for="password-2">Password</label>
                    <div class="input-group input-group-lg">
                      <input type="password" class="form-control password-input @error('password') is-invalid @enderror border-0 shadow-none fs-13" id="password" name="password" placeholder="Password">
                      
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

                  <div class="form-group">
                    <button class="btn btn-lg btn-primary my-3 w-100">Authorize Admin</button>
                  </div>


              </div>
          </div>
          </form>
        </div>
      </div>
      </div>
    </div>
  </main>

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