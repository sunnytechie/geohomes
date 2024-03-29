<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet">
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset("assets/vendors/fontawesome-pro-5/css/all.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/bootstrap-select/css/bootstrap-select.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/slick/slick.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/magnific-popup/magnific-popup.min.cs") }}s">
    <link rel="stylesheet" href="{{ asset("assets/vendors/jquery-ui/jquery-ui.min.cs") }}s">
    <link rel="stylesheet" href="{{ asset("assets/vendors/chartjs/Chart.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/dropzone/css/dropzone.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/animate.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/timepicker/bootstrap-timepicker.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/mapbox-gl/mapbox-gl.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/dataTables/jquery.dataTables.min.css") }}">
    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{ asset("assets/css/themes.css") }}">

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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <title>Geohomes Services Limited - Real Estate Development Company</title>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NLWH4L56');</script>
    <!-- End Google Tag Manager -->

    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("https://cdn.pixabay.com/photo/2016/11/13/18/22/room-1821636_1280.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh; /* Set the height of the body to full viewport height */
        }
        @media screen and (max-width: 1024px) {
            .hide-from-1024 {
                display: none;
            }
        }

        .geo-btn-bg {
            background: #00A75A;
        }

        .geo-btn-bg:hover {
            background: #14ba6d;
        }

        .form-navigation {
          display: flex;
          justify-content: space-between;
        }
    </style>

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>

        {{-- @include('snippets.header') --}}

        <main id="content">
            @yield('content')
        </main>

        {{-- @include('snippets.footer') --}}

        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NLWH4L56" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

    <script src="{{ asset("assets/vendors/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/jquery-ui/jquery-ui.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/bootstrap/bootstrap.bundle.js") }}"></script>
    <script src="{{ asset("assets/vendors/bootstrap-select/js/bootstrap-select.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/slick/slick.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/waypoints/jquery.waypoints.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/counter/countUp.js") }}"></script>
    <script src="{{ asset("assets/vendors/magnific-popup/jquery.magnific-popup.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/chartjs/Chart.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/dropzone/js/dropzone.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/timepicker/bootstrap-timepicker.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/hc-sticky/hc-sticky.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/jparallax/TweenMax.min.j") }}s"></script>
    <script src="{{ asset("assets/vendors/mapbox-gl/mapbox-gl.js") }}"></script>
    <script src="{{ asset("assets/vendors/dataTables/jquery.dataTables.min.js") }}"></script>

    <!-- Theme scripts -->
    <script src="{{ asset("assets/js/theme.js") }}"></script>

    {{-- Sign up and Sign in modal --}}
    @include('snippets.signupin')


    <div class="position-fixed pos-fixed-bottom-right p-6 z-index-10">
        <a href="#" class="gtf-back-to-top bg-white text-primary hover-white bg-hover-primary shadow p-0 w-52px h-52 rounded-circle fs-20 d-flex align-items-center justify-content-center"
           title="Back To Top"><i class="fal fa-arrow-up"></i>
         </a>
    </div>

    <script>
        // Get the header element
        const header = document.querySelector('header');

        // Remove the navbar-dark class
        header.classList.remove('navbar-dark');

        // Add the navbar-light class
        header.classList.add('navbar-light');
    </script>

</body>
</html>
