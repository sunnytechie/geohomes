@extends('layouts.app')

@section('content')
<style>
    .remove-this-item {
      display: none !important;
    }

    @media only screen and (max-width: 1024px) {
        .mt-12 {
        margin-top: 0 !important;
        }
    }
</style>

<main id="content" class="mt-12">
  <div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card text-start mt-5 mb-9 shadow-sm">
              <div class="card-body">
                <h4 class="card-title">Estate Subscription form</h4>
                <p class="card-text">After selecting the number of plots you want, you will first be prompted to subscribe for an allocation with a fee of ₦ 20,000 (twenty thousand naira). <br> After the allocation is made you have 14days to pay for the land else the plot(s) you subscribed for will be available for purchase to other customers.</p>

                <form action="{{ route('subscription') }}" method="POST" style="padding: 0; margin-bottom: 0; margin-right: 10px">
                        @csrf

                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        {{-- When agent is buying land for a client --}}
                        @if (Auth::user()->is_agent == 1)

                            <div class="form-group">
                                <label for="plots">Number of plot you want?</label>
                                <input class="shadow-none fs-13 form-control" value="1" name="plots" id="plots" type="number">

                                @error('plots')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <h5 class="mt-6">Client details</h5>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Client full name">

                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Client email address">

                                @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone number</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Client phone number">

                                @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Client address">

                                @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" name="state" id="state" class="form-control" placeholder="Client state">

                                @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="zip">Zip</label>
                                <input type="text" name="zip" id="zip" class="form-control" placeholder="Client zip">

                                @error('zip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                {{-- select --}}
                                <select name="country" id="country" class="form-control">
                                    <option selected value="Nigeria">Nigeria</option>
                                </select>

                                @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                        @else
                        {{-- When client is buying land for himself --}}
                        <div class="form-group">
                            <label for="plots">Number of plot you want?</label>
                            <input class="shadow-none fs-13 form-control" value="2" name="plots" id="plots" type="number">

                              @error('plots')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    @endif

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="background: #00A75A">Proceed</button>
                    </div>
                </form>

            </div>
            </div>
        </div>
    </div>
  </div>
</main>

<script>
    // Get the header element
    const header = document.querySelector('header');

    // Remove the navbar-dark class
    header.classList.remove('navbar-dark');

    // Add the navbar-light class
    header.classList.add('navbar-light');
</script>
@endsection
