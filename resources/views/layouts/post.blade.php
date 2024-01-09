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

    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $ogTitle }}">
    {{-- <meta property="og:description" content="{!! $ogDescription !!}"> --}}
    <meta property="og:description" content="{!! strip_tags($ogDescription) !!}">
    {{-- <meta property="og:description" content="{{ htmlspecialchars($ogDescription, ENT_QUOTES, 'UTF-8') }}"> --}}
    <meta property="og:type" content="website">
    <meta property="og:image" content="/storage/{{ $ogImage }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <title>{{ $ogTitle }}</title>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NLWH4L56');</script>
    <!-- End Google Tag Manager -->

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
        @include('snippets.header')

        <main>
            @yield('post')
        </main>

        @include('snippets.footer')

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

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
      $(document).ready(function () {
          $('#newsletter-form').submit(function (e) {
              e.preventDefault(); // Prevent the default form submission

              var form = $(this);
              var url = form.attr('action');
              var data = form.serialize();

              $.ajax({
                  type: 'POST',
                  url: url,
                  data: data,
                  dataType: 'json',
                  success: function (response) {
                      // Handle success response
                      $('#response-message').text('Subscription successful, thank you.');
                      $('#response-message').removeClass('error');
                      $('#response-message').addClass('success');
                      form[0].reset();
                  },
                  error: function (xhr, status, error) {
                      // Handle error response
                      var errorMessage = xhr.responseText;
                      $('#response-message').text(errorMessage);
                      $('#response-message').removeClass('success');
                      $('#response-message').addClass('error');
                  }
              });
          });
      });
  </script>

    <!-- Theme scripts -->
    <script src="{{ asset("assets/js/theme.js") }}"></script>

    {{-- Sign up and Sign in modal --}}
    @include('snippets.signupin')

    <div class="position-fixed pos-fixed-bottom-right p-6 z-index-10">
        <a href="#" class="gtf-back-to-top bg-white text-primary hover-white bg-hover-primary shadow p-0 w-52px h-52 rounded-circle fs-20 d-flex align-items-center justify-content-center"
           title="Back To Top"><i class="fal fa-arrow-up"></i>
         </a>
    </div>

</body>
</html>
