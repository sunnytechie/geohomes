<title>{{ Auth::user()->name }} - Profile setup</title>
@extends('layouts.admin')
@section('content')

<div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">

  {{-- session --}}
  @if (session('message'))
    <div class="px-3">
      <div class="row">
        <div class="col-md-12">
            <div class="hide-from-mobile mt-2"></div>
            
                {{-- alert --}}
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 6px">
                      <span aria-hidden="true"><i class="fa fa-window-close"></i></span>
                    </button>
                </div>
            
        </div>
    </div>
    </div>
  @endif

    <div class="mb-6">
      <h2 class="mb-0 text-heading fs-22 lh-15">My Profile
      </h2>
      <p class="mb-1">GeoHomes will never share your personal details with anyone.</p>
    </div>
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

      <div class="row mb-6">
        <div class="col-lg-6">

          <div class="card mb-6">
            <div class="card-body px-6 pt-6 pb-5">
              <div class="row">
                <div class="col-sm-4 col-xl-12 col-xxl-7 mb-6">
                  <h3 class="card-title mb-0 text-heading fs-22 lh-15">Photo</h3>
                  <p class="card-text">Upload your profile photo.</p>
                </div>
                <div class="col-sm-8 col-xl-12 col-xxl-5">
                  @if (Auth::user()->image == null)
                  <img id="profile-image" src="assets/images/my-profile.png" alt="My Profile" class="w-100">
                  @else
                  <img id="profile-image" src="/storage/{{ Auth::user()->image }}" alt="My Profile" class="w-100">
                  @endif
                  

                  <div class="custom-file mt-4 h-auto">
                    <input type="file" class="custom-file-input" hidden id="customFile" name="image">
                    <label class="btn btn-lg btn-block" for="customFile" style="background: #00A75A; color: #fff">
                      <span class="d-inline-block mr-1"><i class="fal fa-cloud-upload"></i></span>Upload profile image</label>
                  </div>

                  @error('image')
                        <p>
                            <strong style="color:red">{{ $message }}, file max size is 2mb.</strong>
                        </p>
                        @else
                        <p class="mb-0 mt-2">
                        *Max: 500px x 500px
                        </p>
                    @enderror
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">

            {{-- User details --}}
            <div class="card mb-6">
                <div class="card-body px-6 pt-6 pb-5">
                <h3 class="card-title mb-0 text-heading fs-22 lh-15">Contact information</h3>
                <p class="card-text">Your contact information in our application.</p>
                
                <div class="form-row mx-n4">
                    <div class="form-group col-md-12 px-4">
                    <label for="name" class="text-heading">Full Name</label>
                    <input type="text" class="form-control form-control-lg border-0" id="name" name="name" value="{{ Auth::user()->name ?? old('name') }}">
                                @error('name')
                                  <p style="color: red">
                                      <strong>{{ $message }}</strong>
                                  </p>
                                @enderror
                  </div>
                </div>

                <div class="form-row mx-n4">
                    <div class="form-group col-md-12 px-4">
                    <label for="phone" class="text-heading">Phone</label>
                    <input type="tel" class="form-control form-control-lg border-0" id="phone" placeholder="You phone number" name="phone" value="{{ Auth::user()->phone ?? old('phone') }}">
                    </div>
                </div>

                <div class="form-row mx-n4">
                    <div class="form-group col-md-12 px-4 mb-md-0">
                    <label for="email" class="text-heading">Email</label>
                    <input type="email" disabled class="form-control form-control-lg border-0" placeholder="{{ Auth::user()->email }}" id="email" name="email">
                                @error('email')
                                  <p style="color: red">
                                      <strong>{{ $message }}</strong>
                                  </p>
                                @enderror
                  </div>
                </div>

                </div>
            </div>

            {{-- Password change section --}}
            {{-- <div class="card">
                <div class="card-body px-6 pt-6 pb-5">
                <h3 class="card-title mb-0 text-heading fs-22 lh-15">Change password</h3>
                <p class="card-text">You can change you password to keep your account secure.</p>
                <div class="form-group">
                    <label for="oldPassword" class="text-heading">Old Password</label>
                    <input type="password" placeholder="Previous Password" class="form-control form-control-lg border-0" id="oldPassword"
                            name="oldPassword">
                </div>
                <div class="form-row mx-n4">
                    <div class="form-group col-md-6 col-lg-12 col-xxl-6 px-4">
                    <label for="newPassword" class="text-heading">New Password</label>
                    <input type="password" placeholder="Password" class="form-control form-control-lg border-0" id="password"
                                name="password">

                                @error('password')
                                  <p style="color: red">
                                      <strong>{{ $message }}</strong>
                                  </p>
                                @enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-12 col-xxl-6 px-4">
                    <label for="confirmNewPassword" class="text-heading">Confirm New Password</label>
                    <input type="password" placeholder="Re-type Password" class="form-control form-control-lg border-0"
                    id="password-confirmation" name="password_confirmation">
                    </div>
                </div>
                </div>
            </div> --}}

              <div class="d-flex justify-content-start flex-wrap">
                  <button class="btn btn-lg mb-3 w-100 w-md-auto" style="background: #00A75A; color: #fff">Update Profile</button>
              </div>

        </div>

        
        
      </div>
      
    </form>
  </div>

  <script>
    // JavaScript code
    const input = document.getElementById('customFile');
    const image = document.getElementById('profile-image');
  
    input.addEventListener('change', function (e) {
      const file = e.target.files[0];
      const reader = new FileReader();
  
      reader.onload = function (e) {
        image.src = e.target.result;
      };
  
      reader.readAsDataURL(file);
    });
  </script>
@endsection
