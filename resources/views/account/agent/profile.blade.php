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
      <p class="mb-1">Setup your personal information.</p>
      @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    </div>
    <form method="POST" action="{{ route('agent.profile.update', Auth::user()->id) }}" enctype="multipart/form-data">
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
                  <img id="profile-image" src="{{ asset('assets/images/my-profile.png') }}" alt="My Profile" class="w-100">
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

        {{-- Other details --}}
          <div class="card mb-6">
            <div class="card-body px-6 pt-6 pb-5">
              <h3 class="card-title mb-0 text-heading fs-22 lh-15">Agent details</h3>
              <p class="card-text">General information</p>
              <div class="form-row mx-n4">

                <div class="form-group col-md-12 px-4">
                  <label for="agent_brand_name" class="text-heading">Brand Name</label>
                  <input type="text" class="form-control form-control-lg border-0" id="agent_brand_name" placeholder="Geo Homes Group" value="{{ Auth::user()->agent->agent_brand_name ?? old('agent_brand_name') }}" name="agent_brand_name">

                  @error('agent_brand_name')
                  <p style="color: red">
                      <strong>{{ $message }}</strong>
                  </p>
                @enderror
                </div>

                <div class="form-group col-md-12 px-4">
                    <label for="address" class="text-heading">Address</label>
                    <input type="text" class="form-control form-control-lg border-0" id="address" placeholder="Address" value="{{ Auth::user()->agent->address ?? old('address') }}" name="address">

                @error('address')
                    <p style="color: red">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
                </div>

                <div class="form-group col-md-6 px-4">
                    <label for="opening_hours" class="text-heading">Opening hours</label>
                    <input type="time" class="form-control form-control-lg border-0" id="opening_hours" value="{{ Auth::user()->agent->opening_hours ?? old('opening_hours') }}" name="opening_hours">

                    @error('opening_hours')
                    <p style="color: red">
                        <strong>Required field.</strong>
                    </p>
                  @enderror
                </div>

                <div class="form-group col-md-6 px-4">
                    <label for="closing_hours" class="text-heading">Closing hours</label>
                    <input type="time" class="form-control form-control-lg border-0" id="closing_hours" value="{{ Auth::user()->agent->closing_hours ?? old('closing_hours') }}" name="closing_hours">

                    @error('closing_hours')
                      <p style="color: red">
                          <strong>Required field</strong>
                      </p>
                    @enderror
                </div>

                <div class="form-group col-md-12 px-4">
                    <label for="tax" class="text-heading">Tax Number</label>
                    <input type="text" class="form-control form-control-lg border-0" placeholder="xxxxxx" value="{{ Auth::user()->agent->tax ?? old('tax') }}" id="tax" name="tax">
                </div>



                <div class="form-group col-md-12 px-4">
                    <label for="about" class="text-heading">About your brand</label>
                    <textarea name="about" id="about" class="form-control" placeholder="Write about your brand">{{ Auth::user()->agent->about ?? old('about') }}</textarea>

                    @error('about')
                    <p style="color: red">
                        <strong>{{ $message }}</strong>
                    </p>
                  @enderror
                </div>


              </div>
            </div>
          </div>

          {{-- Upload Bank details --}}
          <div class="card mb-6">
            <div class="card-body px-6 pt-6 pb-5">
              <h3 class="card-title mb-0 text-heading fs-22 lh-15">Bank details</h3>
              <p class="card-text">Required for payments</p>
              <div class="form-row mx-n4">

                <div class="form-group col-md-12 px-4">
                  <label for="bank_name" class="text-heading">Bank Name</label>
                  <input type="text" class="form-control form-control-lg border-0" id="bank_name" placeholder="First Bank" value="{{ Auth::user()->agent->bank_name ?? old('bank_name') }}" name="bank_name" required>

                    @error('bank_name')
                        <p style="color: red">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>

                <div class="form-group col-md-12 px-4">
                    <label for="bank_account" class="text-heading">Bank Account</label>
                    <input type="text" class="form-control form-control-lg border-0" id="bank_account" placeholder="0000000000" value="{{ Auth::user()->agent->bank_account ?? old('bank_account') }}" name="bank_account" required>

                    @error('bank_account')
                        <p style="color: red">
                            <strong>{{ $message }}</strong>
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
                  <label for="position" class="text-heading">Positon or Title</label>
                  <input type="text" class="form-control form-control-lg border-0" id="position" name="position" placeholder="Sales Manager" value="{{ Auth::user()->position ?? old('position') }}">
                              @error('position')
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

                        @error('phone')
                        <p style="color: red">
                            <strong>{{ $message }}</strong>
                        </p>
                      @enderror
                    </div>
                </div>

                <div class="form-row mx-n4">
                    <div class="form-group col-md-12 px-4 mb-md-0">
                    <label for="email" class="text-heading">Email</label>
                    <input type="email" disabled class="form-control form-control-lg border-0" placeholder="{{ Auth::user()->email }}" id="email" name="email">

                  </div>
                </div>

                </div>
            </div>

            {{-- User social --}}
            <div class="card mb-6">
                <div class="card-body px-6 pt-6 pb-5">
                  <h3 class="card-title mb-0 text-heading fs-22 lh-15">Social handles</h3>
                  <p class="card-text">Let people connect to you.</p>
                  <div class="form-group">
                    <label for="facebook" class="text-heading">Facebook Url</label>
                    <input type="url" class="form-control form-control-lg border-0" id="social_fb" value="{{ Auth::user()->agent->social_fb ?? old('social_fb') }}" name="social_fb">
                  </div>
                  <div class="form-group">
                    <label for="instagram" class="text-heading">Instagram Url</label>
                    <input type="url" class="form-control form-control-lg border-0" id="social_ig" value="{{ Auth::user()->agent->social_ig ?? old('social_ig') }}" name="social_ig">
                  </div>
                  <div class="form-group">
                    <label for="twitter" class="text-heading">Twitter Url</label>
                    <input type="url" class="form-control form-control-lg border-0" id="social_tt" value="{{ Auth::user()->agent->social_tt ?? old('social_tt') }}" name="social_tt">
                  </div>
                  <div class="form-group">
                    <label for="linkedin" class="text-heading">Linkedin Url</label>
                    <input type="url" class="form-control form-control-lg border-0" id="social_ld" value="{{ Auth::user()->agent->social_ld ?? old('social_ld') }}" name="social_ld">
                  </div>
                </div>
            </div>

            {{-- Phone --}}
            <div class="card mb-6">
                <div class="card-body px-6 pt-6 pb-5">
                  <h3 class="card-title mb-0 text-heading fs-22 lh-15">Contact line</h3>
                  <div class="mb-1"></div>
                  <div class="form-group">
                    <label for="office_number" class="text-heading">Office Number</label>
                    <input type="tel" class="form-control form-control-lg border-0" id="office_number" placeholder="+234 804xxxxxxx" value="{{ Auth::user()->agent->office_number ?? old('office_number') }}" name="office_number">
                  </div>
                  <div class="form-group">
                    <label for="mobile_number" class="text-heading">Mobile Number</label>
                    <input type="tel" class="form-control form-control-lg border-0" id="mobile_number" placeholder="+234 804xxxxxxx" value="{{ Auth::user()->agent->mobile_number ?? old('mobile_number') }}" name="mobile_number">
                  </div>
                  <div class="form-group">
                    <label for="fax_number" class="text-heading">Fax number</label>
                    <input type="tel" class="form-control form-control-lg border-0" id="fax_number" placeholder="+234 804xxxxxxx" value="{{ Auth::user()->agent->fax_number ?? old('fax_number') }}" name="fax_number">
                  </div>
                </div>
            </div>


              <div class="d-flex justify-content-start flex-wrap">
                  <button type="submit" class="btn btn-lg mb-3 w-100 w-md-auto" style="background: #00A75A; color: #fff">Update Profile</button>
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
