<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<body>
        {{-- @include('snippets.header') --}}

        <main>
            @yield('post')
        </main>

        @include('snippets.footer')

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
