<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="GeoHomes Real Estate.">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Dashboard - GeoHomes.</title>
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet">
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome-pro-5/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropzone/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/timepicker/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mapbox-gl/mapbox-gl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dataTables/jquery.dataTables.min.css') }}">
    <!-- Themes core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
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

    {{-- Dropify css --}}
    <link rel="stylesheet" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
      .alert-dismissible .close {
        padding: 0.5rem 1.25rem !important;
      }
    </style>
  </head>
  <body>
    <div class="wrapper dashboard-wrapper">
      <div class="d-flex flex-wrap flex-xl-nowrap">

        @include('snippets.dashboard.sidebar')

        <div class="page-content">

          @include('snippets.dashboard.header')

          <main id="content" class="bg-gray-01">
                @yield('content')
          </main>

        </div>
      </div>
    </div>
    <!-- Vendors scripts -->
    <script src="{{ asset('assets/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/counter/countUp.js') }}"></script>
    <script src="{{ asset('assets/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/dropzone/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/hc-sticky/hc-sticky.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jparallax/TweenMax.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/mapbox-gl/mapbox-gl.js') }}"></script>
    <script src="{{ asset('assets/vendors/dataTables/jquery.dataTables.min.js') }}"></script>
    <!-- Theme scripts -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    {{-- <div class="modal fade login-register login-register-modal" id="login-register-modal" tabindex="-1" role="dialog"
     aria-labelledby="login-register-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered mxw-571" role="document">
        <div class="modal-content">
          <div class="modal-header border-0 p-0">
            <div class="nav nav-tabs row w-100 no-gutters" id="myTab" role="tablist">
              <a class="nav-item col-sm-3 ml-0 nav-link pr-6 py-4 pl-9 active fs-18" id="login-tab"
                       data-toggle="tab"
                       href="#login"
                       role="tab"
                       aria-controls="login" aria-selected="true">Login</a>
              <a class="nav-item col-sm-3 ml-0 nav-link py-4 px-6 fs-18" id="register-tab" data-toggle="tab"
                       href="#register"
                       role="tab"
                       aria-controls="register" aria-selected="false">Register</a>
              <div class="nav-item col-sm-6 ml-0 d-flex align-items-center justify-content-end">
                <button type="button" class="close m-0 fs-23" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          </div>
          <div class="modal-body p-4 py-sm-7 px-sm-8">
            <div class="tab-content shadow-none p-0" id="myTabContent">
              <div class="tab-pane fade show active" id="login" role="tabpanel"
                         aria-labelledby="login-tab">
                <form class="form">
                  <div class="form-group mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend ">
                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18"
                                                      id="inputGroup-sizing-lg">
                          <i class="far fa-user"></i></span>
                      </div>
                      <input type="text" class="form-control border-0 shadow-none fs-13"
                                           id="username" name="username" required
                                           placeholder="Username / Your email">
                    </div>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend ">
                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                          <i class="far fa-lock"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control border-0 shadow-none fs-13"
                                           id="password" name="password" required
                                           placeholder="Password">
                      <div class="input-group-append">
                        <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                          <i class="far fa-eye-slash"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mb-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="remember-me" name="remember-me">
                      <label class="form-check-label" for="remember-me">
                        Remember me
                      </label>
                    </div>
                    <a href="password-recovery.html" class="d-inline-block ml-auto text-orange fs-15">
                      Lost password?
                    </a>
                  </div>
                  <div class="d-flex p-2 border re-capchar align-items-center mb-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="verify" name="verify">
                      <label class="form-check-label" for="verify">
                        I'm not a robot
                      </label>
                    </div>
                    <a href="#" class="d-inline-block ml-auto">
                      <img src="images/re-captcha.png" alt="Re-capcha">
                    </a>
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Log in</button>
                </form>
                <div class="divider text-center my-2">
                  <span class="px-4 bg-white lh-17 text">
                    or continue with
                  </span>
                </div>
                <div class="row no-gutters mx-n2">
                  <div class="col-4 px-2 mb-4">
                    <a href="#" class="btn btn-lg btn-block facebook text-white px-0">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                  </div>
                  <div class="col-4 px-2 mb-4">
                    <a href="#" class="btn btn-lg btn-block google px-0">
                      <img src="images/google.png" alt="Google">
                    </a>
                  </div>
                  <div class="col-4 px-2 mb-4">
                    <a href="#" class="btn btn-lg btn-block twitter text-white px-0">
                      <i class="fab fa-twitter"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                <form class="form">
                  <div class="form-group mb-4">
                    <label for="full-name" class="sr-only">Full name</label>
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend ">
                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                          <i class="far fa-address-card"></i></span>
                      </div>
                      <input type="text" class="form-control border-0 shadow-none fs-13"
                                           id="full-name" name="full-name" required
                                           placeholder="Full name">
                    </div>
                  </div>
                  <div class="form-group mb-4">
                    <label for="username01" class="sr-only">Username</label>
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend ">
                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                          <i class="far fa-user"></i></span>
                      </div>
                      <input type="text" class="form-control border-0 shadow-none fs-13"
                                           id="username01" name="username01" required
                                           placeholder="Username / Your email">
                    </div>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password01" class="sr-only">Password</label>
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend ">
                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18">
                          <i class="far fa-lock"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control border-0 shadow-none fs-13"
                                           id="password01" name="password01" required
                                           placeholder="Password">
                      <div class="input-group-append">
                        <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                          <i class="far fa-eye-slash"></i>
                        </span>
                      </div>
                    </div>
                    <p class="form-text">Minimum 8 characters with 1 number and 1 letter</p>
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Sign up</button>
                </form>
                <div class="divider text-center my-2">
                  <span class="px-4 bg-white lh-17 text">
                    or continue with
                  </span>
                </div>
                <div class="row no-gutters mx-n2">
                  <div class="col-4 px-2 mb-4">
                    <a href="#" class="btn btn-lg btn-block facebook text-white px-0">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                  </div>
                  <div class="col-4 px-2 mb-4">
                    <a href="#" class="btn btn-lg btn-block google px-0">
                      <img src="images/google.png" alt="Google">
                    </a>
                  </div>
                  <div class="col-4 px-2 mb-4">
                    <a href="#" class="btn btn-lg btn-block twitter text-white px-0">
                      <i class="fab fa-twitter"></i>
                    </a>
                  </div>
                </div>
                <div class="mt-2">By creating an account, you agree to GeoHomes
                  <a class="text-heading" href="#"><u>Terms of Use</u> </a> and
                  <a class="text-heading" href="#"><u>Privacy Policy</u></a>.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

     {{-- Dropify --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

    {{-- Dropify script --}}
    <script>
      $(document).ready(function(){
          // Basic
          $('.dropify').dropify();

          // Translated
          $('.dropify-fr').dropify({
              messages: {
                  default: 'Glissez-déposez un fichier ici ou cliquez',
                  replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                  remove:  'Supprimer',
                  error:   'Désolé, le fichier trop volumineux'
              }
          });

          // Used events
          var drEvent = $('#input-file-events').dropify();

          drEvent.on('dropify.beforeClear', function(event, element){
              return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
          });

          drEvent.on('dropify.afterClear', function(event, element){
              alert('File deleted');
          });

          drEvent.on('dropify.errors', function(event, element){
              console.log('Has Errors');
          });

          var drDestroy = $('#input-file-to-destroy').dropify();
          drDestroy = drDestroy.data('dropify')
          $('#toggleDropify').on('click', function(e){
              e.preventDefault();
              if (drDestroy.isDropified()) {
                  drDestroy.destroy();
              } else {
                  drDestroy.init();
              }
          })
      });
  </script>

  

  </body>
</html>