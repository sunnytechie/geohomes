<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo/logo.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Geohomes Group">
    <meta name="twitter:description" content="We Are A Leading Real Estate Company In Nigeria That Has Been Building Prosperity For Our Clients By Executing Innovative Real Estate Solutions.">
    <meta name="twitter:image" content="{{ asset("assets/images/logo/geohomeslogo.png") }}">

    <!-- Facebook -->
    <meta property="og:url" content="geohomes">
    <meta property="og:title" content="Geohomes Group">
    <meta property="og:description" content="With over 25 years of experience, we have consciously established trust in our dealings and consistently provided real estate and housing solutions for over 2,000 satisfied clients both in Nigeria and abroad.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset("assets/images/logo/geohomeslogo.png") }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/guest/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/guest/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/guest/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/guest/css/style.css') }}">

    <title>Geohomes Signin/Signup</title>
    <style>
        @media (max-width: 768px) {
            .hide-from-tablet {
                display: none;
            }
        }
    </style>
  </head>
  <body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 order-md-2 hide-from-tablet">
          <img src="{{ asset('assets/guest/images/undraw_under_construction_-46-pa.svg') }}" alt="Image" class="img-fluid">
        </div>

        <div class="col-lg-6 contents">

            <main id="content">
                @yield('content')
            </main>

        </div>

      </div>
    </div>
  </div>


    <script src="{{ asset('assets/guest/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/guest/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/guest/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/guest/js/main.js') }}"></script>
  </body>
</html>
