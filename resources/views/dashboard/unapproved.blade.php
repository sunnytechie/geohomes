@extends('layouts.admin')
<title>Account in review</title>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow my-8 text-start">
                <div class="text-center my-5">
                    <img class="card-img-top" style="height: 100px; width: 100px;" src="{{ asset('assets/images/svg/alert.svg') }}" alt="Title">
                </div>

                <div class="card-body">
                    <h5 class="card-title text-center" style="color: #00A75A">Account in Review</h5>
                    <p class="card-text text-center">Your Account has been set up successfully, <br> Geohomes will review your account and approve you to use our platform.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
