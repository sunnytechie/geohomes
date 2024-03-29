@extends('layouts.auth')

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-4">
                    <h3>Join as <strong>Corperate Partner</strong></h3>
                    <p class="mb-4">Have account with us? <a href="{{ route('login') }}">Login here!</a></p>
                </div>

                @if ($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form" method="POST" action="{{ route('create.new.user') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="user_type" id="user_type" value="agent">
                    <input type="hidden" name="agent_type" value="corperate">

                    <fieldset>
                        {{-- Email and phone --}}
                        <div class="form-row mx-n2">
                            <div class="col-sm-12 px-2">
                                <div class="form-group">
                                    <label for="email" class="text-heading">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror form-control-lg" value="{{ old('email') }}" id="email" name="email" required>

                                    @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        {{-- Password --}}
                        <div class="form-row mx-n2">
                            <div class="col-sm-12 px-2">
                                <div class="form-group">
                                    <label for="password" class="text-heading">Password</label>
                                    <div class="input-group input-group-lg">
                                        <input type="password" class="form-control password-input @error('password') is-invalid @enderror shadow-none" id="password" name="password" required>

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

                            <div class="col-sm-12 px-2">
                                <div class="form-group">
                                    <label for="re-password">Re-Enter Password</label>
                                    <div class="input-group input-group-lg">
                                    <input type="password" class="form-control password-input2 shadow-none" id="password-confirmation" name="password_confirmation" required>

                                    <div class="input-group-append show-password2" style="cursor: pointer; position:absolute; right: 0; z-index: 999; background: transparent; margin-top: 8px">
                                        <span class="input-group-text border-0 text-body fs-18" style="background-color: transparent"><i class="far fa-eye"></i></span>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </fieldset>

                    <fieldset>
                        {{-- phone and country --}}
                        <div class="form-row mx-n2">
                            <div class="col-sm-12 px-2">
                                <div class="form-group">
                                    <label for="name" class="text-heading">Legal Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror form-control-lg" value="{{ old('name') }}" id="name" required>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 px-2">
                                <div class="form-group">
                                    <label for="phone" class="text-heading">Your Phone</label>
                                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror form-control-lg" value="{{ old('phone') }}" id="phone" required>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 px-2">
                                <div class="form-group">
                                    <label for="nin_no">Your NIN</label>
                                    <input type="text" name="nin_no" class="form-control @error('nin_no') is-invalid @enderror form-control-lg" value="{{ old('nin_no') }}" id="nin_no" required>

                                    @error('nin_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small>NIN must be 10 digits.</small>
                                </div>
                                
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-row mx-n2">

                            <div class="col-sm-12 px-2">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input class="form-control form-control-lg" type="text" id="company_name" value="{{ old('company_name') }}" name="company_name" required>

                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 px-2">
                                <div class="form-group">
                                    <select class="form-control border shadow-none form-control-lg selectpicker" data-style="btn-lg py-2 h-52" id="company_type" name="company_type" required>
                                        <!-- Add options for company types here -->
                                        <option disabled selected>Choose Company type (optional)</option>
                                        <option selected>Private</option>
                                        <option>Public</option>
                                    </select>

                                    @error('company_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-sm-12 px-2">
                                <div class="form-row mx-n2">
                                    <div class="col-sm-12 px-2">
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="text" name="website" class="form-control @error('website') is-invalid @enderror form-control-lg" value="{{ old('website') }}" id="website">

                                            @error('website')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-row mx-n2">
                                <div class="col-sm-12 px-2">
                                    <div class="form-group">
                                        <span for="cac">CAC Certificate</span>
                                        <input type="file" name="cac" id="cac" class="form-control @error('cac') is-invalid @enderror form-control-lg border" required>

                                        @if ($errors->has('cac'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cac') }}</strong>
                                            </span>
                                            @else
                                            <small>Max file upload 1mb</small>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-sm-12 px-2">
                                    <div class="form-group">
                                        <label for="rc_no">CAC RC Number</label>
                                        <input type="text" name="rc_no" class="form-control @error('rc_no') is-invalid @enderror form-control-lg" value="{{ old('rc_no') }}" id="rc_no" required>

                                        @error('rc_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                    </fieldset>


                    <fieldset>
                        <div class="form-row mx-n2">
                            <div class="col-sm-12 px-2">
                                <div class="form-group">
                                    <label for="address" class="text-heading">Address</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror form-control-lg" value="{{ old('address') }}" id="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-sm-12 px-2">
                                <div class="form-group">
                                    <label for="city" class="text-heading">city</label>
                                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror form-control-lg" value="{{ old('city') }}" id="city">

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-sm-12 px-2">
                                <div class="form-group">
                                    <label for="zip" class="text-heading">zip</label>
                                    <input type="text" name="zip" class="form-control @error('zip') is-invalid @enderror form-control-lg" value="{{ old('zip') }}" id="zip">

                                    @error('zip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 px-2">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div>

                        </div>
                    </fieldset>

                    <!-- Form navigation buttons -->
                    <div class="form-navigation d-flex my-3">
                        <button type="button" class="btn px-4 py-2 w-50 rounded-0" id="prev-btn" disabled style="background: #CCC; margin-right: 4px; border-radius: 0; font-family: 'Poppins'">Previous</button>
                        <button type="button" class="btn px-4 py-2 rounded-0 bb-bg-btn w-50 text-dark geo-btn-bg" id="next-btn" style="background: #38D39F">Proceed</button>
                        <button type="submit" class="btn px-4 py-2 rounded-0 bb-bg-btn w-50 text-dark geo-btn-bg" id="submit-btn" style="display: none; background: #38D39F">Submit</button>
                    </div>

                {{-- <button type="submit" class="btn mt-4 btn-primary geo-btn-bg btn-lg btn-block rounded">Register</button> --}}
                </form>
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

<script>
    // Get all fieldsets and buttons
    const fieldsets = document.querySelectorAll('fieldset');
    const prevBtnBB = document.getElementById('prev-btn');
    const nextBtnBB = document.getElementById('next-btn');
    const submitBtnBB = document.getElementById('submit-btn');

    let currentFieldset = 0;

    // Hide all fieldsets except the first one
    for (let i = 1; i < fieldsets.length; i++) {
    fieldsets[i].style.display = 'none';
    }

    // Update button states
    function updateButtons() {
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const submitBtn = document.getElementById('submit-btn');

    if (currentFieldset === 0) {
        prevBtn.disabled = true;
    } else {
        prevBtn.disabled = false;
    }

    if (currentFieldset === fieldsets.length - 1) {
        nextBtn.style.display = 'none'; // hide the "Next" button in the last fieldset
        submitBtn.style.display = 'inline-block';
    } else {
        nextBtn.style.display = 'inline-block';
        submitBtn.style.display = 'none';
    }
    }


    // Move to previous fieldset
    function prevFieldset() {
    fieldsets[currentFieldset].style.display = 'none';
    currentFieldset--;
    fieldsets[currentFieldset].style.display = 'block';
    updateButtons();
    }

    // Move to next fieldset if all required fields are filled
    function nextFieldset() {
    const inputs = fieldsets[currentFieldset].querySelectorAll('input:not(#referral_id):not(#bbforce_type):required, select:required');
    let isValid = true;
    inputs.forEach(input => {
        if (!input.value) {
        isValid = false;
        input.classList.add('error');
        } else {
        input.classList.remove('error');
        }
    });
    if (isValid) {
        if (currentFieldset === fieldsets.length - 1) {
        const form = document.getElementById('multi-step-form');
        form.submit(); // trigger form submission
        } else {
        fieldsets[currentFieldset].style.display = 'none';
        currentFieldset++;
        fieldsets[currentFieldset].style.display = 'block';
        updateButtons();
        }
    }
    }

    // Add event listeners to buttons
    prevBtnBB.addEventListener('click', prevFieldset);
    nextBtnBB.addEventListener('click', nextFieldset);

    // Update button states when the page loads
    updateButtons();
</script>

<script>
    function toggleAgentFields() {
      var userTypeSelect = document.getElementById("agent_type");
      var agentFields = document.getElementById("coperate_fields");

      if (userTypeSelect.value === "corperate") {
        agentFields.style.display = "block";
      } else {
        agentFields.style.display = "none";
      }
    }
</script>
@endsection
